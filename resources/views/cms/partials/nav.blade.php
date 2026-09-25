@php
$navGroups = require resource_path('views/cms/nav-data.php');
@endphp

@foreach ($navGroups as $group)
    <div>
        <p class="px-2 pb-1.5 text-[11px] font-semibold uppercase tracking-widest text-ink-subtle">{{ $group['label'] }}</p>
        <div class="space-y-0.5">
            @foreach ($group['items'] as $item)
                @php
                    $active = collect(explode('|', $item['match']))->contains(fn ($m) => request()->is($m));
                @endphp
                <a href="{{ url($item['href']) }}" aria-current="{{ $active ? 'page' : 'false' }}"
                   class="flex items-center gap-2.5 rounded-md px-2.5 py-1.5 text-sm transition-colors
                          {{ $active ? 'bg-hover font-medium text-ink' : 'text-ink-muted hover:bg-hover hover:text-ink' }}">
                    <svg class="h-4 w-4 shrink-0 {{ $active ? 'text-accent' : 'text-ink-subtle' }}"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="{{ $item['icon'] }}" />
                    </svg>
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
    </div>
@endforeach
