<div
    x-data="wireui_datetime_picker({
        model: @entangleable($attributes->wire('model')),
    })"
    x-props="{
        config: {
            interval: @toJs($interval),
            is12H:    @boolean($timeFormat == '12'),
            readonly: @boolean($readonly),
            disabled: @boolean($disabled),
            min: @toJs($min ? $min->format('Y-m-d\TH:i') : null),
            max: @toJs($max ? $max->format('Y-m-d\TH:i') : null),
            minTime: @toJs($minTime),
            maxTime: @toJs($maxTime),
        },
        withoutTimezone: @boolean($withoutTimezone),
        timezone:      @toJs($timezone),
        userTimezone:  @toJs($userTimezone ?? ''),
        parseFormat:   @toJs($parseFormat ?? ''),
        displayFormat: @toJs($displayFormat ?? ''),
        weekDays:      @lang('wireui::messages.datePicker.days'),
        monthNames:    @lang('wireui::messages.datePicker.months'),
        withoutTime:   @boolean($withoutTime),
    }"
    {{ $attributes
        ->only('wire:key')
        ->class('relative w-full')
        ->merge(['wire:key' => "datepicker::{$name}"]) }}
>
    <x-dynamic-component
        :component="WireUi::component('input')"
        {{ $attributes->whereDoesntStartWith(['wire:model', 'x-model', 'wire:key', 'readonly']) }}
        :borderless="$borderless"
        :shadowless="$shadowless"
        :label="$label"
        :hint="$hint"
        :corner-hint="$cornerHint"
        :icon="$icon"
        :prefix="$prefix"
        :prepend="$prepend"
        readonly
        x-on:click="toggle"
        x-bind:value="model ? getDisplayValue() : null">
        @if (!$readonly && !$disabled)
            <x-slot name="append">
                <div class="absolute inset-y-0 left-3 z-5 flex items-center justify-center">
                    <div class="flex items-center gap-x-2 my-auto
                        {{ $errors->has($name) ? 'text-negative-400 dark:text-negative-600' : 'text-slate-400' }}">

                        @if ($clearable)
                            <x-dynamic-component
                                :component="WireUi::component('icon')"
                                class="cursor-pointer w-4 h-4 hover:text-negative-500 transition-colors ease-in-out duration-150"
                                x-cloak
                                name="x"
                                x-show="model"
                                x-on:click="clearDate()"
                            />
                        @endif

                        <x-dynamic-component
                            :component="WireUi::component('icon')"
                            class="cursor-pointer w-5 h-5"
                            :name="$rightIcon"
                            x-on:click="toggle"
                        />
                    </div>
                </div>
            </x-slot>
        @endif
    </x-dynamic-component>

    <x-wireui::parts.popover
        :margin="(bool) $label"
        root-class="sm:!w-72 ml-auto"
        class="max-h-96 overflow-y-auto p-3 sm:w-72"
    >
        <div x-show="tab === 'date'" class="space-y-5">
            @unless ($withoutTips)
                <div class="grid grid-cols-3 gap-x-2 text-center text-slate-600">
                    <x-dynamic-component
                        :component="WireUi::component('button')"
                        class="bg-slate-100 border-none dark:bg-slate-800"
                        x-on:click="selectYesterday"
                        :label="__('wireui::messages.datePicker.yesterday')"
                    />

                    <x-dynamic-component
                        :component="WireUi::component('button')"
                        class="bg-slate-100 border-none dark:bg-slate-800"
                        x-on:click="selectToday"
                        :label="__('wireui::messages.datePicker.today')"
                    />

                    <x-dynamic-component
                        :component="WireUi::component('button')"
                        class="bg-slate-100 border-none dark:bg-slate-800"
                        x-on:click="selectTomorrow"
                        :label="__('wireui::messages.datePicker.tomorrow')"
                    />
                </div>
            @endunless

            <div class="flex items-center justify-between">
                <x-dynamic-component
                    :component="WireUi::component('button')"
                    class="rounded-full !px-2 !py-2 shrink-0"
                    x-show="!monthsPicker"
                    x-on:click="previousMonth"
                    icon="chevron-right"
                    flat
                />

                <div class="w-full flex items-center justify-center gap-x-2 text-slate-600 dark:text-slate-500">
                    <button class="focus:outline-none focus:underline"
                            x-text="monthNames[month]"
                            x-on:click="monthsPicker = !monthsPicker"
                            type="button">
                    </button>
                    <input class="w-14 appearance-none p-0 ring-0 border-none focus:ring-0 focus:outline-none dark:bg-slate-800"
                           x-model="year"
                           x-on:input.debounce.500ms="if (year.length === 4) fillPickerDates()"
                           type="number"
                    />
                </div>

                <x-dynamic-component
                    :component="WireUi::component('button')"
                    class="rounded-full !px-2 !py-2 shrink-0"
                    x-show="!monthsPicker"
                    x-on:click="nextMonth"
                    icon="chevron-left"
                    flat
                />
            </div>

            <div class="relative">
                <div class="absolute inset-0 bg-white dark:bg-slate-800 grid grid-cols-3 gap-3"
                     x-show="monthsPicker"
                     x-transition>
                    <template x-for="(monthName, index) in monthNames" :key="`month.${monthName}`">
                        <x-dynamic-component
                            :component="WireUi::component('button')"
                            class="text-slate-400 border-none rounded-none dark:border-0 dark:hover:bg-slate-700 uppercase"
                            x-on:click="selectMonth(index)"
                            x-text="monthName"
                            xs
                        />
                    </template>
                </div>

                <div class="grid grid-cols-7 gap-2">
                    <template x-for="day in weekDays" :key="`week-day.${day}`">
                        <span class="text-slate-400 text-3xs text-center uppercase pointer-events-none"
                            x-text="day">
                        </span>
                    </template>

                    <template
                        x-for="date in dates"
                        :key="`date.${date.day}.${date.month}`"
                    >
                        <div class="flex justify-center picker-days">
                            <button class="text-sm w-7 h-6 focus:outline-none !border-none focus:ring-2 focus:ring-ofsset-2 focus:ring-primary
                                         hover:bg-primary dark:hover:bg-slate-700 dark:focus:ring-slate-400
                                          disabled:cursor-not-allowed"
                                :class="{
                                    'text-slate-600 dark:text-slate-400': !date.isDisabled && !date.isSelected && date.month === month,
                                    'text-slate-400 dark:text-slate-600': date.isDisabled || date.month !== month,
                                    'text-primary border border-primary dark:border-gray-400': date.isToday && !date.isSelected,
                                    'disabled:text-primary disabled:border-primary': date.isToday && !date.isSelected,
                                    '!text-white bg-primary font-semibold !rounded-full border border-primary': date.isSelected,
                                    'disabled:bg-primary !rounded-full disabled:border-primary': date.isSelected,
                                    'hover:bg-primary !rounded-full dark:bg-slate-700 dark:border-slate-400': date.isSelected,
                                }"
                                :disabled="date.isDisabled"
                                x-on:click="selectDate(date)"
                                x-text="date.day"
                                type="button">
                            </button>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <div x-show="tab === 'time'" x-transition>
            <x-dynamic-component
                :component="WireUi::component('input')"
                id="search.{{ $attributes->wire('model')->value() }}"
                :label="__('wireui::messages.selectTime')"
                x-model="searchTime"
                x-bind:placeholder="getSearchPlaceholder"
                x-ref="searchTime"
                x-on:input.debounce.150ms="onSearchTime($event.target.value)"
            />

            <div x-ref="timesContainer"
                 class="mt-1 w-full max-h-52 pb-1 pt-2 overflow-y-auto flex flex-col picker-times">
                <template x-for="time in filteredTimes" :key="time.value">
                    <button class="group rounded-md focus:outline-none focus:bg-primary dark:focus:bg-slate-700
                                   relative py-2 pl-2 pr-9 text-left transition-colors ease-in-out duration-100 cursor-pointer select-none
                                   hover:text-white hover:bg-primary dark:hover:bg-slate-700 dark:text-slate-400"
                            :class="{
                            'text-primary': modelTime === time.value,
                            'text-slate-700': modelTime !== time.value,
                        }"
                        :name="`times.${time.value}`"
                        type="button"
                        x-on:click="selectTime(time)">
                        <span x-text="time.label"></span>
                        <span class="text-primary dark:text-slate-400 group-hover:text-white
                                     absolute inset-y-0 right-0 flex items-center pr-4"
                              x-show="modelTime === time.value">
                            <x-dynamic-component
                                :component="WireUi::component('icon')"
                                name="check"
                                class="h-5 w-5"
                            />
                        </span>
                    </button>
                </template>
            </div>
        </div>
    </x-wireui::parts.popover>
</div>
