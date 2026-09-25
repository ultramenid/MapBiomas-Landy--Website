<div>
    <x-cms.page-header title="Murals" description="Mural maps published on the website.">
        <x-slot:actions>
            <x-cms.button href="{{ url('/cms/addmural') }}">New mural</x-cms.button>
        </x-slot:actions>
    </x-cms.page-header>

    <div class="mb-4 flex flex-col gap-2 sm:flex-row sm:items-center">
        <input type="search" placeholder="Search murals…"
               wire:model.live.debounce.300ms="query"
               class="h-8 w-full rounded-md border border-line-strong bg-surface px-2.5 text-sm text-ink placeholder:text-ink-subtle cms-focus sm:max-w-xs">
    </div>

    @if (count($posts))
        <x-cms.data-table>
            <x-slot:head>
                <x-cms.th>Title</x-cms.th>
                <x-cms.th class="hidden md:table-cell">Image</x-cms.th>
                <x-cms.th class="hidden md:table-cell">Status</x-cms.th>
                <x-cms.th class="w-20 text-right">Actions</x-cms.th>
            </x-slot:head>

            @foreach ($posts as $item)
                <tr class="transition-colors hover:bg-hover/50">
                    <x-cms.td>
                        <a href="{{ url('/cms/editmural/'.$item->id) }}" class="block max-w-xs">
                            <p class="truncate font-medium hover:text-accent">{{ $item->titleEN }}</p>
                        </a>
                    </x-cms.td>
                    <x-cms.td class="hidden md:table-cell">
                        @if ($item->imgEN)
                            <img src="{{ asset('storage/files/photos/'.$item->imgEN) }}" alt=""
                                 class="h-9 w-14 rounded border border-line object-cover">
                        @else
                            <span class="text-xs text-ink-subtle">—</span>
                        @endif
                    </x-cms.td>
                    <x-cms.td class="hidden md:table-cell">
                        <x-cms.badge :tone="$item->status == 1 ? 'green' : 'amber'">
                            {{ $item->status == 1 ? 'Published' : 'Unpublished' }}
                        </x-cms.badge>
                    </x-cms.td>
                    <x-cms.td class="text-right">
                        <x-cms.dropdown>
                            <x-cms.dropdown-item href="{{ url('/cms/editmural/'.$item->id) }}">Edit</x-cms.dropdown-item>
                            <x-cms.dropdown-item wire:click="delete({{ $item->id }})" variant="danger">
                                Delete
                            </x-cms.dropdown-item>
                        </x-cms.dropdown>
                    </x-cms.td>
                </tr>
            @endforeach
        </x-cms.data-table>

        {{ $posts->links('cms.pagination') }}
    @else
        <x-cms.empty-state
            title="{{ $query ? 'No matching murals' : 'No murals yet' }}"
            description="{{ $query ? 'Try a different search.' : 'Add the first mural map to see it here.' }}">
            @if (! $query)
                <x-slot:action>
                    <x-cms.button href="{{ url('/cms/addmural') }}">New mural</x-cms.button>
                </x-slot:action>
            @endif
        </x-cms.empty-state>
    @endif

    <x-cms.modal open="$wire.deleter" close="$wire.closeDelete()" title="Delete mural">
        <p class="text-sm text-ink-muted">
            Are you sure you want to delete
            <span class="font-medium text-ink">{{ $deleteName ?: 'this item' }}</span>?
            This action cannot be undone.
        </p>
        <div class="mt-5 flex justify-end gap-2">
            <x-cms.button variant="secondary" wire:click="closeDelete">Cancel</x-cms.button>
            <x-cms.button variant="danger" wire:click="deleting({{ $deleteID }})" wire:target="deleting({{ $deleteID }})">Delete</x-cms.button>
        </div>
    </x-cms.modal>
</div>
