@extends('layouts.site')

@section('title', 'Contato - ATLVS')

@section('content')
    <section class="pt-32 pb-20 lg:pt-40 lg:pb-32 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h1 class="text-4xl font-extrabold text-white mb-4">Vamos impulsionar seu negócio?</h1>
                <p class="text-lg text-zinc-400">Preencha o formulário abaixo e nossos consultores entrarão em contato para entender sua demanda técnica.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 lg:gap-24">
                
                <div class="bg-zinc-900/50 border border-zinc-800 rounded-2xl p-8 shadow-xl backdrop-blur-sm">
                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-zinc-400 mb-2">Nome Completo</label>
                                <input type="text" name="name" id="name" required class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-3 text-white placeholder-zinc-600 focus:outline-none focus:border-blue-600 focus:ring-1 focus:ring-blue-600 transition-colors">
                            </div>
                            <div>
                                <label for="company" class="block text-sm font-medium text-zinc-400 mb-2">Empresa</label>
                                <input type="text" name="company" id="company" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-3 text-white placeholder-zinc-600 focus:outline-none focus:border-blue-600 focus:ring-1 focus:ring-blue-600 transition-colors">
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-zinc-400 mb-2">E-mail Corporativo</label>
                            <input type="email" name="email" id="email" required class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-3 text-white placeholder-zinc-600 focus:outline-none focus:border-blue-600 focus:ring-1 focus:ring-blue-600 transition-colors">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-zinc-400 mb-2">Como podemos ajudar?</label>
                            <textarea name="message" id="message" rows="4" required class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-3 text-white placeholder-zinc-600 focus:outline-none focus:border-blue-600 focus:ring-1 focus:ring-blue-600 transition-colors"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-lg transition-all shadow-lg shadow-blue-600/20 hover:shadow-blue-600/40">
                            Enviar Solicitação
                        </button>
                    </form>
                </div>

                <div class="flex flex-col justify-center space-y-10">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-4">Canais de Atendimento</h3>
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="text-zinc-300 font-medium">E-mail Comercial</p>
                                    <a href="mailto:contato@atlvs.com.br" class="text-blue-400 hover:text-blue-300 transition-colors">contato@atlvs.com.br</a>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-zinc-800 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <p class="text-zinc-300 font-medium">Sede</p>
                                    <p class="text-zinc-500 text-sm mt-1">Av. Paulista, 1000 - Bela Vista<br>São Paulo - SP, 01310-100</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection