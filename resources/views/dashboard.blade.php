<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel') }}
        </h2>
    </x-slot>

    <div class="flex justify-between mt-4 max-w-7xl space-y-3 mb-8 mx-auto flex-col md:flex-row md:space-x-4 md:space-y-0 md:mb-14">
        <div class="p-5 bg-[#2d895f] rounded-xl w-full registered">
            <p class="text-base font-bold text-white opacity-90">DOMÍNIOS REGISTRADOS</p>
            <p class="text-base font-semibold text-white">{{ $registeredCount ?? 0 }}</p>
        </div>
        <div class="p-5 bg-[#2d895f] rounded-xl w-full expired">
            <p class="text-base font-bold text-white opacity-90">DOMÍNIOS EXPIRADOS</p>
            <p class="text-base font-semibold text-white">{{ $expiredCount ?? 0 }}</p>
        </div>
        <div class="p-5 bg-[#2d895f] rounded-xl w-full attention">
            <p class="text-base font-bold text-white opacity-90">EXPIRAM NESTE MÊS</p>
            <p class="text-base font-semibold text-white">{{ $expiringThisWeekCount ?? 0 }}</p>
        </div>
    </div>
    

    <div class="max-w-7xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Gerenciamento de Domínios</h3>
            <a href="#" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Adicionar novo domínio</a>
        </div>
    
        <!-- Campo de Busca -->
        <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Buscar por domínio ou hospedagem..."
                   class="p-2 border border-gray-300 dark:border-gray-600 rounded-lg w-full md:w-1/3 focus:ring-2 focus:ring-green-500">
            <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Buscar</button>
        </form>
    
        <!-- Tabela -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
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
                            <td class="px-4 py-2">{{ $domain->name }}</td>
                            <td class="px-4 py-2">{{ $domain->host }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($domain->registered_at)->format('d/m/Y') }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($domain->expire_in)->format('d/m/Y') }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 text-xs font-semibold {{ $domain->status === 'Ativo' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} rounded-full">
                                    {{ $domain->status }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="#" class="px-2 py-1 bg-blue-500 text-white text-xs rounded-lg hover:bg-blue-600">Visualizar</a>
                                    <a href="#" class="px-2 py-1 bg-yellow-500 text-white text-xs rounded-lg hover:bg-yellow-600">Editar</a>
                                    <a href="#" class="px-2 py-1 bg-red-500 text-white text-xs rounded-lg hover:bg-red-600">Excluir</a>
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
    
</x-app-layout>
