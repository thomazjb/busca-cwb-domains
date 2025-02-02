<div class="fixed top-5 right-5 z-50 space-y-2">
    @foreach (['success' => 'bg-teal-500', 'error' => 'bg-red-500', 'warning' => 'bg-yellow-500', 'info' => 'bg-blue-500'] as $type => $color)
        @if(session($type))
            <div class="toast max-w-xs {{ $color }} text-sm text-white rounded-xl shadow-lg p-4 flex items-center justify-between opacity-100 transition-opacity duration-500" role="alert">
                <span>{{ session($type) }}</span>
                <button type="button" class="close-button ml-3 text-white hover:text-opacity-75 focus:outline-none">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6L6 18"></path>
                        <path d="M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif
    @endforeach
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // select all toasts
        document.querySelectorAll(".toast").forEach((toast) => {
            // Close after 3 seconds
            setTimeout(() => {
                toast.classList.add("opacity-0");
                setTimeout(() => toast.remove(), 500);
            }, 3000);

            // Close on click
            toast.querySelector(".close-button").addEventListener("click", function () {
                toast.classList.add("opacity-0");
                setTimeout(() => toast.remove(), 500);
            });
        });
    });
</script>
