<div>
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <a class="text-3xl font-semibold capitalize">{{__('news & event') }}</a>
        <label class=" w-full sm:w-48 "  >
            <div class="relative flex w-full flex-col  text-neutral-600 dark:text-neutral-300">
                <label for="os" class="w-fit pl-0.5 text-gray-700 mb-1"></label>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="absolute pointer-events-none right-4 top-3 size-5">
                    <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
                <select wire:ignore wire:model.live='category' class=" w-full appearance-none text-black  border border-landy  px-4 py-2 text-sm focus:outline-none">
                    <option selected value="all">all</option>
                    <option value="news">news</option>
                    <option value="event">event</option>
                </select>
            </div>
        </label>
    </div>
    <div class="mt-4 flex gap-2 flex-wrap justify-between ">
        @foreach ($data as $item)
            <div class="sm:w-[49%] w-full mt-6">
                <a href="{{ route('detailnews', [app()->getLocale(), $item->id, $item->slug]) }}" class="block bg-white rounded-lg  overflow-hidden ">
                    <img src="{{ asset('storage/files/photos/'.$item->img) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover mb-2">
                    <a class="text-sm  text-gray-500 font-light">{{$item->category}}</a>
                    <div class="mt-1">
                        <a href="{{ route('detailnews', [app()->getLocale(), $item->id, $item->slug]) }}" class="text-lg font-semibold">{{ $item->title }}</a>
                        <p class="text-sm text-gray-600 mt-2">{{ $item->description }}</p>
                    </div>
                </a>
            </div>
        @endforeach
        @if ($data)
        {{ $data->links('livewire.pagination') }}
        @endif
    </div>
</div>
