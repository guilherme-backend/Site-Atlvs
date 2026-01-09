<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        <link rel="icon" href="{{ asset('img/icone.png') }}" type="image/png">
    </head>
    <body class="min-h-screen bg-zinc-950 text-zinc-100 antialiased relative selection:bg-blue-600 selection:text-white">
        
        <div class="fixed top-0 right-0 w-[500px] h-[500px] bg-blue-600/10 blur-[100px] rounded-full -z-10 pointer-events-none"></div>
        <div class="fixed inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px] -z-20 pointer-events-none"></div>

        <flux:sidebar sticky stashable class="border-r border-zinc-800 bg-zinc-900/60 backdrop-blur-xl">
            
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse mb-6" wire:navigate>
                <img src="{{ asset('img/logo.png') }}" alt="ATLVS" class="h-10 w-auto">
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Principal')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Visão Geral') }}</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group :heading="__('Gestão')" class="grid mt-4">
                    <flux:navlist.item icon="briefcase" href="#">{{ __('Meus Projetos') }}</flux:navlist.item>
                    <flux:navlist.item icon="banknotes" href="#">{{ __('Financeiro') }}</flux:navlist.item>
                    <flux:navlist.item icon="document-text" href="#">{{ __('Contratos') }}</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group :heading="__('Atendimento')" class="grid mt-4">
                    <flux:navlist.item icon="chat-bubble-left-right" href="#">{{ __('Meus Chamados') }}</flux:navlist.item>
                    <flux:navlist.item icon="question-mark-circle" href="#">{{ __('Central de Ajuda') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <div class="w-full border-t border-zinc-800 pt-5 mt-2">
                
                <flux:dropdown class="hidden lg:block w-full" position="bottom" align="start">
                    <flux:profile
                        :name="auth()->user()->name"
                        :initials="auth()->user()->initials()"
                        icon-trailing="chevrons-up-down"
                        class="w-full hover:bg-zinc-800/50 transition-colors rounded-lg p-2 -ml-2"
                    />

                    <flux:menu class="w-[220px] bg-zinc-900 border border-zinc-800">
                        <flux:menu.radio.group>
                            <div class="p-0 text-sm font-normal">
                                <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                        <span class="flex h-full w-full items-center justify-center rounded-lg bg-zinc-800 text-white border border-zinc-700">
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    </span>
                                    <div class="grid flex-1 text-start text-sm leading-tight">
                                        <span class="truncate font-semibold text-white">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-xs text-zinc-400">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>

                        <flux:menu.separator class="bg-zinc-800"/>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Configurações') }}</flux:menu.item>
                        <flux:menu.separator class="bg-zinc-800"/>

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                {{ __('Sair') }}
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
                
                <div class="text-[10px] text-zinc-600 mt-3 text-center lg:text-left px-1">
                    ATLVS v1.0 &copy; {{ date('Y') }}
                </div>
            </div>

        </flux:sidebar>

        <flux:header class="lg:hidden bg-zinc-900 border-b border-zinc-800">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
            <flux:spacer />
            <flux:dropdown position="top" align="end">
                <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />
                <flux:menu class="bg-zinc-900 border border-zinc-800">
                     <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Sair') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        <flux:main class="relative z-10">
            {{ $slot }}
        </flux:main>

        @fluxScripts
    </body>
</html>