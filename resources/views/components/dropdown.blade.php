<div {{ $attributes->merge(['class' => 'relative']) }}>
    {{-- Trigger slot --}}
    <div>
        {{ $trigger ?? '' }}
    </div>

    {{-- Content slot (simple absolute panel) --}}
    <div class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50 hidden group-hover:block">
        <div class="py-1">
            {{ $content ?? '' }}
        </div>
    </div>
</div>
