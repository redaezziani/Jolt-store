<label
    {{ $attributes->merge([
        'class' => 'text-sm font-medium leading-none text-slate-800  peer-disabled:cursor-not-allowed
        peer-disabled:opacity-70',
    ]) }}
    for="{{ $for }}
    >
    {{ $slot }}
</label>
