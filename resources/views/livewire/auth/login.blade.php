<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Faça login na sua conta')" :description="__('Digite seu e-mail e senha abaixo para fazer login')" />

        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <flux:input
                name="email"
                :label="__('Endereço de e-mail')"
                :value="old('email')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@exemplo.com"
                class="bg-slate-950/50 border-slate-700 focus:border-blue-500 text-slate-100 placeholder-slate-500"
            />

            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('Senha')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Senha')"
                    viewable
                    class="bg-slate-950/50 border-slate-700 focus:border-blue-500 text-slate-100 placeholder-slate-500"
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute top-0 text-sm end-0 text-blue-400 hover:text-blue-300" :href="route('password.request')" wire:navigate>
                        {{ __('Esqueceu sua senha?') }}
                    </flux:link>
                @endif
            </div>

            <flux:checkbox name="remember" :label="__('Lembre-se de mim')" :checked="old('remember')" class="text-slate-400" />

            <div class="flex items-center justify-end">
                {{-- Botão Azul Intenso --}}
                <flux:button variant="primary" type="submit" class="w-full bg-blue-600 hover:bg-blue-500 border-none shadow-lg shadow-blue-900/20 font-bold" data-test="login-button">
                    {{ __('Entrar') }}
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-slate-500">
                <span>{{ __('Não tem conta?') }}</span>
                <flux:link :href="route('register')" wire:navigate class="text-blue-400 hover:text-blue-300 font-medium">{{ __('Inscreva-se') }}</flux:link>
            </div>
        @endif
    </div>
</x-layouts.auth>