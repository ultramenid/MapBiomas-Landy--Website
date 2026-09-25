<div>
    <x-cms.page-header title="Google Earth Engine" description="Edit the Google Earth Engine page content shown on the public site.">
        <x-slot:actions>
            <x-cms.button variant="secondary" href="{{ url('/cms/dashboard') }}">Back to dashboard</x-cms.button>
            <x-cms.button wire:click="storePage" loadingTarget="storePage">Save</x-cms.button>
        </x-slot:actions>
    </x-cms.page-header>

    <div class="max-w-3xl">
        <x-cms.form-tabs>
            <x-slot:en>
                <x-cms.panel title="English content">
                    <x-cms.rich-text field="contentEN" :height="620">{{ $contentEN }}</x-cms.rich-text>
                </x-cms.panel>
            </x-slot:en>
            <x-slot:idn>
                <x-cms.panel title="Konten Bahasa Indonesia">
                    <x-cms.rich-text field="contentID" :height="620">{{ $contentID }}</x-cms.rich-text>
                </x-cms.panel>
            </x-slot:idn>
        </x-cms.form-tabs>
    </div>
</div>
