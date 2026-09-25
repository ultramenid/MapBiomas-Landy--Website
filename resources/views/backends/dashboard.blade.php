<x-cms-layout title="Dashboard">
    <x-cms.page-header title="Dashboard" description="Overview of MapBiomas Landy content.">
        <x-slot:actions>
            <x-cms.button variant="secondary" href="{{ url('/cms/addnews') }}">New news</x-cms.button>
            <x-cms.button href="{{ url('/cms/addfaq') }}">New FAQ</x-cms.button>
        </x-slot:actions>
    </x-cms.page-header>

    <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
        <x-cms.stat-card label="News" :value="$stats['news']" href="{{ url('/cms/listnews') }}" />
        <x-cms.stat-card label="FAQ entries" :value="$stats['faqs']" href="{{ url('/cms/listfaq') }}" />
        <x-cms.stat-card label="Infographics" :value="$stats['infographics']" href="{{ url('/cms/listinfographic') }}" />
        <x-cms.stat-card label="Murals" :value="$stats['murals']" href="{{ url('/cms/cmsmural') }}" />
    </div>

    <div class="mt-6 grid gap-4 lg:grid-cols-2">
        <x-cms.panel title="Recent news">
            @if ($recentNews->count())
                <ul class="divide-y divide-line">
                    @foreach ($recentNews as $item)
                        <li class="flex items-center justify-between gap-3 py-2.5 first:pt-0 last:pb-0">
                            <div class="min-w-0">
                                <p class="truncate text-sm font-medium text-ink">{{ $item->titleID }}</p>
                                <p class="text-xs text-ink-muted">{{ $item->publishdate ?? 'No date' }}</p>
                            </div>
                            <x-cms.badge :tone="$item->category === 'news' ? 'green' : 'neutral'">
                                {{ ucfirst($item->category) }}
                            </x-cms.badge>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-3 border-t border-line pt-3">
                    <a href="{{ url('/cms/listnews') }}" class="text-sm text-accent hover:underline">View all news →</a>
                </div>
            @else
                <p class="py-6 text-center text-sm text-ink-muted">No news yet.</p>
            @endif
        </x-cms.panel>

        <x-cms.panel title="Recent FAQ">
            @if ($recentFaqs->count())
                <ul class="divide-y divide-line">
                    @foreach ($recentFaqs as $faq)
                        <li class="py-2.5 first:pt-0 last:pb-0">
                            <p class="truncate text-sm font-medium text-ink">
                                {{ \Illuminate\Support\Str::limit(strip_tags($faq->questionID), 70) }}
                            </p>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-3 border-t border-line pt-3">
                    <a href="{{ url('/cms/listfaq') }}" class="text-sm text-accent hover:underline">View all FAQ →</a>
                </div>
            @else
                <p class="py-6 text-center text-sm text-ink-muted">No FAQ entries yet.</p>
            @endif
        </x-cms.panel>
    </div>
</x-cms-layout>
