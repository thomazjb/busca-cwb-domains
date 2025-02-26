@props(['disabled' => false])

<textarea 
    @disabled($disabled) 
    {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-green-500 dark:focus:border-indigo-600 focus:ring-green-500 dark:focus:ring-green-600 rounded-md shadow-sm p-2 resize-none']) }}
></textarea>
