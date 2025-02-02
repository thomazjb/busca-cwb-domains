<x-modal name="delete-domain" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <div x-data="{ domainId: null }"
         x-on:open-modal.window="if ($event.detail.id === 'delete-domain') { domainId = $event.detail.domainId; $dispatch('open-modal', 'delete-domain'); }">
        
        <form method="POST" x-bind:action="domainId ? '{{ url('/domain') }}/' + domainId : '#'" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Tem certeza de que deseja excluir este domínio?
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Uma vez que o domínio for excluído, todos os seus recursos e dados serão permanentemente apagados.
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancelar
                </x-secondary-button>
                <x-danger-button type="submit" class="ml-3">
                    Excluir
                </x-danger-button>
            </div>
        </form>
    </div>
</x-modal>