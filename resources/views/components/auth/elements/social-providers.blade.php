@props([
    'socialProviders' => \Devdojo\Auth\Helper::activeProviders(),
    'separator' => true,
    'separator_text' => 'or'
])
@if(count($socialProviders))
    @if($separator && config('devdojo.auth.settings.social_providers_location') != 'top')
        <x-auth::elements.separator class="my-6">{{ $separator_text }}</x-auto::elements.separator>
    @endif
    <div class="relative space-y-2 w-full">
        @foreach($socialProviders as $slug => $provider)
            <x-auth::elements.social-button :$slug :$provider />
        @endforeach
    </div>
    @if($separator && config('devdojo.auth.settings.social_providers_location') == 'top')
        <x-auth::elements.separator class="my-6">{{ $separator_text }}</x-auto::elements.separator>
    @endif
@endif