<x-modal name="add-new-domain" focusable>
    <form method="post" action="{{ route('domain.store') }}" class="p-6">
        @csrf

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Adicionar novo domínio') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Para adicionar um novo domínio no gerenciador e ficar atento às renovações, são necessárias algumas informações. Por favor preencha corretamente todos os campos para evitar transtornos futuros!') }}
        </p>

        <!-- Primeira linha: Domínio e Hospedagem -->
        <div class="mt-6 grid grid-cols-2 gap-4">
            <div>
                <x-input-label for="domain" value="{{ __('Domínio') }}" />
                <x-text-input
                    id="domain"
                    name="domain"
                    type="text"
                    class="mt-1 block w-full"
                    oninput="this.value = this.value.replace(/\s/g, '')"
                    placeholder="{{ __('Domínio') }}"
                />
            </div>

            <div>
                <x-input-label for="host" value="{{ __('Hospedagem') }}" />
                <x-text-input
                    id="host"
                    name="host"
                    type="text"
                    class="mt-1 block w-full"
                    oninput="this.value = this.value.replace(/\s/g, '')"
                    placeholder="{{ __('Hospedagem') }}"
                />
            </div>
        </div>

        <!-- Segunda linha: Registrado em e Expira em -->
        <div class="mt-6 grid grid-cols-2 gap-4">
            <div>
                <x-input-label for="registered_at" value="{{ __('Registrado em:') }}" />
                <x-date-picker
                    name="registered_at"
                    oninput="this.value = this.value.replace(/\s/g, '')"
                    class="mt-1 block w-full"
                />
            </div>

            <div>
                <x-input-label for="expires_at" value="{{ __('Expira em:') }}" />
                <x-date-picker
                    name="expires_at"
                    oninput="this.value = this.value.replace(/\s/g, '')"
                    class="mt-1 block w-full"
                />
            </div>
        </div>

        <!-- Terceira linha: Notas -->
        <div class="mt-6 block w-full">
            <div>
                <x-input-label for="notes" value="{{ __('Notas:') }}" />
                <x-text-area-input
                    name="notes"
                    class="mt-1 block w-full"
                />
            </div>

        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-primary-button class="ms-3">
                {{ __('Salvar') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
