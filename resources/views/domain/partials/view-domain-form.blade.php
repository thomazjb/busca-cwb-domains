@if(isset($domain))
<x-modal name="view-domain" focusable>
    <div x-data="{
        domain: null,
        init() {}
    }"
        x-on:open-modal.window="if ($event.detail.id === 'view-domain') { 
        domain = $event.detail.domain;
        $dispatch('open-modal', 'view-domain');
    }">

        <template x-if="domain">
            <form class="p-6">
                @csrf


                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Visualizar domínio') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Ótima leitura!') }}
                </p>

                <!-- First line: Domain e Host -->
                <div class="mt-6 grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="domain" value="{{ __('Domínio') }}" />
                        <x-text-input id="domain" name="domain" type="text" x-model="domain.domain"
                            class="mt-1 block w-full bg-slate-200 pointer-events-none placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                            placeholder="{{ __('Domínio') }}" disabled readonly />
                    </div>

                    <div>
                        <x-input-label for="host" value="{{ __('Hospedagem') }}" />
                        <x-text-input id="host" name="host" type="text" x-model="domain.host"
                            class="mt-1 block w-full bg-slate-200 pointer-events-none placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                            placeholder="{{ __('Hospedagem') }}" disabled />
                    </div>
                </div>

                <!-- Second Line: Registered at and Expires at -->
                <div class="mt-6 grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="registered_at" value="{{ __('Registrado em:') }}" />
                        <x-date-picker name="registered_at" x-model="domain.registered_at"
                            class="mt-1 block w-full bg-slate-200 pointer-events-none placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                            disabled />
                    </div>

                    <div>
                        <x-input-label for="expires_at" value="{{ __('Expira em:') }}" />
                        <x-date-picker name="expires_at" x-model="domain.expires_at"
                            class="mt-1 block w-full bg-slate-200 pointer-events-none placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                            disabled />
                    </div>
                </div>

                <!-- Third line: Notes -->
                <div class="mt-6 block w-full">
                    <div>
                        <x-input-label for="notes" value="{{ __('Notas:') }}" />
                        <x-text-area-input name="notes" x-model="domain.notes"
                            class="mt-1 block w-full bg-slate-200 pointer-events-none placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                            disabled />
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <x-primary-button x-on:click="$dispatch('close')">
                        {{ __('Sair') }}
                    </x-primary-button>
                </div>
            </form>
        </template>
    </div>
</x-modal>
@endif