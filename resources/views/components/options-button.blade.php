<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex items-center gap-1 px-2 py-1']) }}>
    {{ $slot }}
</button>