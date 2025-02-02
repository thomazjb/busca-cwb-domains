@if(isset($domain))
<x-modal name="edit-domain" focusable>
    <div x-data="{
        domain: null,
        init() {}
    }"
        x-on:open-modal.window="if ($event.detail.id === 'edit-domain') { 
        domain = $event.detail.domain;
        $dispatch('open-modal', 'edit-domain');
    }">

        <template x-if="domain">
            <form method="post" action="{{ route('domain.edit', $domain->id) }}" class="p-6">
                @csrf
                @method('PATCH')

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Editar domínio') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Atenção, não é possível recuperar uma informação editada após salvar, por isso edite as informações e salve tendo certeza de que estão certas.') }}
                </p>

                <!-- First line: Domain e Host -->
                <div class="mt-6 grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="domain" value="{{ __('Domínio') }}" />
                        <x-text-input id="domain" name="domain" type="text" x-model="domain.domain"
                            class="mt-1 block w-full" placeholder="{{ __('Domínio') }}" />
                    </div>

                    <div>
                        <x-input-label for="host" value="{{ __('Hospedagem') }}" />
                        <x-text-input id="host" name="host" type="text" x-model="domain.host"
                            class="mt-1 block w-full" placeholder="{{ __('Hospedagem') }}" />
                    </div>
                </div>

                <!-- Second Line: Registered at and Expires at -->
                <div class="mt-6 grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="registered_at" value="{{ __('Registrado em:') }}" />
                        <x-date-picker type="date" name="registered_at" x-model="domain.registered_at" :value="$domain->registered_at" class="mt-1 block w-full" />
                    </div>

                    <div>
                        <x-input-label for="expires_at" value="{{ __('Expira em:') }}" />
                        <x-date-picker name="expires_at" x-model="domain.expires_at" :value="$domain->expires_at" class="mt-1 block w-full" />
                    </div>
                </div>

                <!-- Third line: Notes -->
                <div class="mt-6 block w-full">
                    <div>
                        <x-input-label for="notes" value="{{ __('Notas:') }}" />
                        <x-text-area-input name="notes" x-model="domain.notes" class="mt-1 block w-full" />
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
        </template>
    </div>
</x-modal>
@endif