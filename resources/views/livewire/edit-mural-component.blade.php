<div>
    <x-cms.page-header title="Edit mural">
        <x-slot:actions>
            <x-cms.button variant="secondary" href="{{ url('/cms/cmsmural') }}">Cancel</x-cms.button>
            <x-cms.button wire:click="storePosts" loadingTarget="storePosts">Save</x-cms.button>
        </x-slot:actions>
    </x-cms.page-header>

    @if ($errors->any())
        <div class="mb-5 rounded-md border border-danger/30 bg-danger/10 px-4 py-3">
            <p class="text-sm font-medium text-danger">Please fix the following before saving:</p>
            <ul class="mt-1.5 list-inside list-disc text-sm text-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="max-w-3xl space-y-4">
        <x-cms.panel title="Details">
            <div class="grid gap-4 sm:grid-cols-2">
                <div wire:ignore x-init="flatpickr('#publishdate', { enableTime: false, dateFormat: 'Y-m-d', disableMobile: 'true' });">
                    <label for="publishdate" class="mb-1.5 block text-xs font-medium text-ink">Publish date</label>
                    <input id="publishdate" type="text" placeholder="Pick a date…" wire:model.defer="publishdate"
                           class="h-8 w-full rounded-md border border-line-strong bg-surface px-2.5 text-sm text-ink placeholder:text-ink-subtle cms-focus" />
                </div>

                <div class="flex items-end pb-0.5">
                    <x-cms.select name="isactive" label="Status" :options="[1 => 'Publish', 0 => 'Non Publish']" wire:model="isactive" />
                </div>
            </div>
        </x-cms.panel>

        <x-cms.form-tabs initial="id">
            <x-slot:en>
                <x-cms.panel title="English content">
                    <div class="space-y-4">
                        <x-cms.image-upload model="photoEN" label="Image"
                                            hint="Upload a new image to replace the current one."
                                            :preview-url="$photoEN?->temporaryUrl() ?? asset('/storage/files/photos/'.$uphotoEN)" />
                        <x-cms.input name="titleEN" label="Title" wire:model.defer="titleEN" placeholder="Title…" />
                        <x-cms.input name="fileEN" label="File URL" wire:model.defer="fileEN" placeholder="File url…" />
                    </div>
                </x-cms.panel>
            </x-slot:en>
            <x-slot:idn>
                <x-cms.panel title="Konten Bahasa Indonesia">
                    <div class="space-y-4">
                        <x-cms.image-upload model="photoID" label="Gambar"
                                            hint="Unggah gambar baru untuk mengganti gambar saat ini."
                                            :preview-url="$photoID?->temporaryUrl() ?? asset('/storage/files/photos/'.$uphotoID)" />
                        <x-cms.input name="titleID" label="Judul" wire:model.defer="titleID" placeholder="Judul…" />
                        <x-cms.input name="fileID" label="URL File" wire:model.defer="fileID" placeholder="URL file…" />
                    </div>
                </x-cms.panel>
            </x-slot:idn>
        </x-cms.form-tabs>
    </div>
</div>
