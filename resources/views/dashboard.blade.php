<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel') }}
        </h2>
    </x-slot>

    <div
        class="flex justify-between mt-8 max-w-7xl space-y-3 mb-8 mx-auto flex-col md:flex-row md:space-x-4 md:space-y-0 md:mb-14">
        <div class="relative p-5 bg-[#2d895f] rounded-xl w-full registered">
            <svg class="absolute top-1/2 right-0 transform -translate-y-1/2 w-8 h-8 text-white dark:text-white mr-6"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                    d="M4.37 7.657c2.063.528 2.396 2.806 3.202 3.87 1.07 1.413 2.075 1.228 3.192 2.644 1.805 2.289 1.312 5.705 1.312 6.705M20 15h-1a4 4 0 0 0-4 4v1M8.587 3.992c0 .822.112 1.886 1.515 2.58 1.402.693 2.918.351 2.918 2.334 0 .276 0 2.008 1.972 2.008 2.026.031 2.026-1.678 2.026-2.008 0-.65.527-.9 1.177-.9H20M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <p class="text-base font-bold text-white opacity-90">DOMÍNIOS REGISTRADOS</p>
            <p class="text-base font-semibold text-white">{{ $registeredCount ?? 0 }}</p>
        </div>
        <div class="relative p-5 bg-[#2d895f] rounded-xl w-full expired">
            <svg class="absolute top-1/2 right-0 transform -translate-y-1/2 w-8 h-8 text-white dark:text-white mr-6"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                    d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <p class="text-base font-bold text-white opacity-90">DOMÍNIOS EXPIRADOS</p>
            <p class="text-base font-semibold text-white">{{ $expiredCount ?? 0 }}</p>
        </div>
        <div class="relative p-5 bg-[#2d895f] rounded-xl w-full attention">
            <svg class="absolute top-1/2 right-0 transform -translate-y-1/2 w-8 h-8 text-white dark:text-white mr-6"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M12 5.464V3.099m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175C19 17.4 19 18 18.462 18H5.538C5 18 5 17.4 5 16.807c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.464ZM6 5 5 4M4 9H3m15-4 1-1m1 5h1M8.54 18a3.48 3.48 0 0 0 6.92 0H8.54Z" />
            </svg>
            <p class="text-base font-bold text-white opacity-90">EXPIRAM NESTA SEMANA</p>
            <p class="text-base font-semibold text-white">{{ $expiringThisWeekCount ?? 0 }}</p>
        </div>
    </div>




    <div class="max-w-7xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Gerenciamento de Domínios</h3>
            <x-add-domain-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-new-domain')">{{ __('Adicionar Domínio') }}</x-add-domain-button>
        </div>

        <!-- Campo de Busca -->
        <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
            <input type="text" name="search" value="{{ $search ?? '' }}"
                placeholder="Buscar por domínio ou hospedagem..."
                class="p-2 border border-gray-300 dark:border-gray-600 rounded-lg w-full md:w-1/3 focus:ring-2 focus:ring-green-500">
            <button type="submit"
                class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Buscar</button>
        </form>

        <!-- Tabela -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Domínio</th>
                        <th class="px-4 py-2 text-left">Hospedagem</th>
                        <th class="px-4 py-2 text-left">Data Cadastro</th>
                        <th class="px-4 py-2 text-left">Expira em</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-center">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($domains as $domain)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-4 py-2">{{ $domain->id }}</td>
                            <td class="px-4 py-2">{{ $domain->domain }}</td>
                            <td class="px-4 py-2">{{ $domain->host }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($domain->registered_at)->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($domain->expires_at)->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-2">
                                <span
                                    class="px-2 py-1 text-xs font-semibold {{ $domain->status === 'Ativo' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} rounded-full">
                                    {{ $domain->status }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <div class="flex justify-center space-x-2">
                                    <!-- Botão Visualizar -->
                                    <x-options-button x-data
                                        x-on:click.prevent="$dispatch('open-modal', { 
                                                id: 'view-domain', 
                                                domain: {{ json_encode($domain) }}
                                            })"
                                        class="bg-blue-500 text-white text-xs rounded-lg px-2 py-1 hover:bg-blue-600">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 3C5.5 3 1.7 6.1.4 10c1.3 3.9 5.1 7 9.6 7s8.3-3.1 9.6-7c-1.3-3.9-5.1-7-9.6-7zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-8a3 3 0 1 0 0 6 3 3 0 0 0 0-6z" />
                                        </svg>
                                        {{ __('Visualizar') }}
                                    </x-options-button>
                                    <!-- Botão Editar -->
                                    <x-options-button x-data
                                        :domain="$domain"
                                        x-on:click.prevent="$dispatch('open-modal', { 
                                                id: 'edit-domain', 
                                                domain: {{ json_encode($domain) }}
                                            })"
                                        class="bg-yellow-500 text-white text-xs rounded-lg px-2 py-1 hover:bg-yellow-600">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M17.3 2.7a1 1 0 0 0-1.4 0L14 4.6 15.4 6l1.9-1.9a1 1 0 0 0 0-1.4zM13 5.4 5 13.4V16h2.6l8-8L13 5.4zM4 17h12a1 1 0 1 0 0-2H4a1 1 0 1 0 0 2z" />
                                        </svg>
                                        {{ __('Editar') }}
                                    </x-options-button>
                                    <!-- Formulário para exclusão -->

                                    <x-options-button x-data
                                        x-on:click.prevent="$dispatch('open-modal', { id: 'delete-domain', domainId: {{ $domain->id }} })"
                                        class="bg-red-500 text-white text-xs rounded-lg px-2 py-1 hover:bg-red-600">
                                        <svg class="w-4 h-4 inline" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M8 2a2 2 0 0 1 4 0h5a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2h5zm-3 4h10v10a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6zm3 2a1 1 0 0 0-2 0v6a1 1 0 0 0 2 0V8zm4 0a1 1 0 0 0-2 0v6a1 1 0 0 0 2 0V8z" />
                                        </svg>
                                        Excluir
                                    </x-options-button>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Nenhum domínio encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@include('domain.partials.add-domain-form')
@include('domain.partials.delete-domain-form')
@include('domain.partials.edit-domain-form')
@include('domain.partials.view-domain-form')
</x-app-layout>

