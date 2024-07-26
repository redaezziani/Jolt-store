<input
    {{
        $attributes->merge([
            "class" => "flex h-10 w-full rounded-md border border-slate-400/35 bg-transparent px-3 py-2 text-sm text-slate-600 shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary  focus-visible:outline-none focus-visible:border-none   disabled:cursor-not-allowed disabled:opacity-50",
        ])
    }}
    type="{{ $type }}"
    placeholder="{{ $placeholder }}"
/>
