@props([
    'name' => 'date',
    'id' => 'date-picker-' . uniqid(),
    'value' => '',
    'placeholder' => 'dd/mm/aaaa',
])


<div class="relative">
    <input 
        type="text"
        id="{{ $id }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        {{ $attributes->merge([
            'class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-green-500 dark:focus:border-indigo-600 focus:ring-green-500 dark:focus:ring-green-600 rounded-md shadow-sm pr-10'
        ]) }}
        placeholder="{{ $placeholder }}"
        
    />
    <div class="absolute top-0 right-1 px-3 py-2">
        <svg class="w-6 h-6 text-green-300"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">
          <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
      </div>
</div>
 

@once
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @endpush
@endonce

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#{{ $id }}", {
                dateFormat: "d/m/Y",
                altInput: true,
                altFormat: "Y/m/d",
                clickOpens: true,
                allowInput: true,
                locale: {
                    firstDayOfWeek: 1,
                    weekdays: {
                        shorthand: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
                        longhand: [
                            'Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 
                            'Quinta-feira', 'Sexta-feira', 'Sábado'
                        ],
                    },
                    months: {
                        shorthand: [
                            'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 
                            'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
                        ],
                        longhand: [
                            'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 
                            'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
                        ],
                    },
                }
            });

        });
    </script>
@endpush
