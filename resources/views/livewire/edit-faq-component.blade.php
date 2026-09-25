<div>
    <x-cms.page-header title="Edit FAQ">
        <x-slot:actions>
            <x-cms.button variant="secondary" href="{{ url('/cms/listfaq') }}">Cancel</x-cms.button>
            <x-cms.button wire:click="storeAksi" loadingTarget="storeAksi">Save</x-cms.button>
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

    <div class="max-w-3xl">
        <x-cms.form-tabs initial="id">
            <x-slot:en>
                <x-cms.panel title="English content">
                    <div class="space-y-4">
                        <x-cms.textarea name="questionEN" rows="3" label="Question" wire:model.defer="questionEN"
                                        placeholder="Question in English…"></x-cms.textarea>
                        <div>
                            <span class="mb-1.5 block text-xs font-medium text-ink">Answer</span>
                            <x-cms.rich-text field="answerEN" :height="480">{{ $answerEN }}</x-cms.rich-text>
                        </div>
                    </div>
                </x-cms.panel>
            </x-slot:en>
            <x-slot:idn>
                <x-cms.panel title="Konten Bahasa Indonesia">
                    <div class="space-y-4">
                        <x-cms.textarea name="questionID" rows="3" label="Pertanyaan" wire:model.defer="questionID"
                                        placeholder="Pertanyaan dalam Bahasa Indonesia…"></x-cms.textarea>
                        <div>
                            <span class="mb-1.5 block text-xs font-medium text-ink">Jawaban</span>
                            <x-cms.rich-text field="answerID" :height="480">{{ $answerID }}</x-cms.rich-text>
                        </div>
                    </div>
                </x-cms.panel>
            </x-slot:idn>
        </x-cms.form-tabs>
    </div>
</div>
