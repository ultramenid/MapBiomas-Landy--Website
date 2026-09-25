<div class="w-full max-w-sm">
    <div class="mb-6 flex flex-col items-center">
        <img src="{{ asset('assets/logo-landy.png') }}" alt="MapBiomas Landy" class="h-12 w-auto">
    </div>

    <div class="rounded-lg border border-line bg-surface p-6 shadow-sm">
        <h1 class="text-base font-semibold text-ink">Log in to your account</h1>
        <p class="mt-1 text-sm text-ink-muted">Enter your credentials to access the CMS.</p>

        <form wire:submit.prevent="login" class="mt-5 space-y-4">
            <x-cms.input name="email" type="email" label="Email" placeholder="name@example.com"
                         wire:model.defer="email" wire:keydown.enter="login" autofocus autocomplete="email" />

            <x-cms.input name="password" type="password" label="Password"
                         wire:model.defer="password" wire:keydown.enter="login" autocomplete="current-password" />

            @if (session()->has('message'))
                <p class="text-xs text-danger">{{ session('message') }}</p>
            @endif

            <x-cms.button type="submit" loadingTarget="login" class="w-full">Log in</x-cms.button>
        </form>

        <p class="mt-4 text-center text-xs text-ink-muted">
            <a href="{{ url('/') }}" class="hover:text-ink hover:underline">Continue to site</a>
        </p>
    </div>
</div>
