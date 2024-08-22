<div
      class="relative cursor-pointer "
      x-data="datepicker()"
      x-init="
           dateString='{{ $initDateString }}';
           wireModelName='{{ $wireModel }}';
           startDate='{{ $startDate }}';
           endDate='{{ $endDate }}';
           saturdaySelectable={{ $saturdaySelectable }};
           sundaySelectable={{ $sundaySelectable }};
           excludedDates={{ $excludedDates }};
           initApp();"
>
     <div
           @click="showDatepicker = !showDatepicker"
           @keydown.escape="showDatepicker = false"
      >
          {{ $slot }}
     </div>

     <div
          class="ml-4 mt-16 bg-purple-900 border-white border rounded-lg shadow p-4 absolute top-0 left-0"
          style="width:22rem;"
          x-cloak
          x-show.transition="showDatepicker"
          @click.away="showDatepicker = false"
     >

          <div class="flex justify-between items-center mb-2">
               <div>
                    <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-purple-100"></span>
                    <span x-text="year" class="ml-1 text-lg text-purple-300 font-normal"></span>
               </div>
               <div>
                    <button
                         type="button"
                         class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-purple-200 p-1 rounded-full"
                         :class="{'cursor-not-allowed opacity-25': !isPrevMonthValid(month) }"
                         :disabled="!isPrevMonthValid(month)"
                         @click="decrementMonth();  getMonthData()"
                    >
                         <svg class="h-6 w-6 text-purple-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                         </svg>
                    </button>
                    <button
                         type="button"
                         class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-purple-200 p-1 rounded-full"
                         :class="{'cursor-not-allowed opacity-25': !isNextMonthValid(month) }"
                         :disabled="!isNextMonthValid(month)"
                         @click="incrementMonth(); getMonthData()"
                    >
                         <svg class="h-6 w-6 text-purple-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                         </svg>
                    </button>
               </div>
          </div>

          <div class="w-auto grid grid-cols-7 row-gap-2 col-gap-4">
               <template x-for="(day, index) in days" :key="index">
                    <div x-text="day" class="text-gray-100 font-medium text-center text-sm mb-3"></div>
               </template>

               <template x-for="blankday in [...Array(startOfMonthOnDay).keys()]">
                    <div class="border p-1 border-transparent"></div>
               </template>

               <template x-for="dateIndex in [...Array(numDaysInMonth).keys()]" :key="dateIndex">

                    <div
                         @click="if (isDateSelectable(dateIndex+1)) { selectDate(dateIndex+1);  showDatepicker = false; @this.set(wireModelName, dateString) }"
                         x-text="(dateIndex+1)"
                         class="px-2 py-1 cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                         :class="{'bg-purple-100 text-purple-800': isDateSelected(dateIndex+1), 'cursor-not-allowed opacity-25 text-purple-700': ( !isDateSelected(dateIndex+1)  && !isDateSelectable(dateIndex+1)),  'text-gray-200 hover:bg-purple-700': (isDateSelectable(dateIndex+1) && !isDateSelected(dateIndex+1)) }"
                    ></div>
               </template>
          </div>
     </div>
</div>
