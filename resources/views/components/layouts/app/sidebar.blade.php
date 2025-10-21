<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('home') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            {{--If the user sudah login --}}
            @auth
                <flux:navlist variant="outline">
                    <flux:navlist.group :heading="__('Platform')" class="grid">
                        <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                        <flux:navlist.item icon="plus-circle" :href="route('recipe.create')" :current="request()->routeIs('recipe.create')" wire:navigate>{{ __('Upload Recipe') }}</flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist>

                <flux:spacer />

                <flux:navlist variant="outline">
                    <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                        {{ __('Repository') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                        {{ __('Documentation') }}
                    </flux:navlist.item>
                </flux:navlist>

            
                
                <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                    <flux:profile
                        :name="auth()->user()->name"
                        :initials="auth()->user()->initials()"
                        icon:trailing="chevrons-up-down"
                        data-test="sidebar-menu-button"
                    />

                    <flux:menu class="w-[220px]">
                    
                        <flux:menu.separator />

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); this.closest('form').submit();"
                               class="flex w-full cursor-pointer items-center gap-2 rounded-md px-2 py-1.5 text-sm outline-none transition-colors hover:bg-zinc-100 dark:hover:bg-zinc-800">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><path d="M5 3h6a2 2 0 0 1 2 2v3"/><path d="M12 18h5a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-5"/><path d="M8 12h11"/><path d="m5 9-3 3 3 3"/></svg>
                                <span>{{ __('Log Out') }}</span>
                            </a>
                        </form>
                    </flux:menu>
                </flux:dropdown>
        
            @endauth

            @guest
                <flux:navlist variant="outline">
                     <flux:navlist.group :heading="__('Menu')" class="grid">
                        <flux:navlist.item icon="home" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>{{ __('All Recipes') }}</flux:navlist.item>
                        <flux:navlist.item icon="arrow-right-end-on-rectangle" :href="route('login')" :current="request()->routeIs('login')" wire:navigate>{{ __('Login') }}</flux:navlist.item>
                        <flux:navlist.item icon="user-plus" :href="route('register')" :current="request()->routeIs('register')" wire:navigate>{{ __('Register') }}</flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist>
            @endguest
            
        </flux:sidebar>
        
        <main class="flex-1">
             {{ $slot }}
        </main>

        @fluxScripts
    </body>
</html>
