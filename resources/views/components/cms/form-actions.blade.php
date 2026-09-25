@props([
    'cancel', // URL of the cancel target
])

<div {{ $attributes->merge(['class' => 'mt-8 flex items-center justify-end gap-2 border-t border-line pt-5']) }}>
    <x-cms.button variant="secondary" href="{{ $cancel }}">Cancel</x-cms.button>
    <x-cms.button wire:click="save" loadingTarget="save">Save</x-cms.button>
</div>
