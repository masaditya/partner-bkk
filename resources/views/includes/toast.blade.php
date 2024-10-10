<!-- Toast Success -->
@if (session('success'))
<div id="dismiss-toast"
    class="absolute top-24 end-4 hs-removing:translate-x-5 z-[3000] hs-removing:opacity-0 transition duration-300 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-neutral-800 dark:border-neutral-700"
    role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
    <div class="flex p-4 items-center justify-between">
        <div class="flex mr-8">
            <div class="shrink-0">
                <svg class="shrink-0 size-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                    </path>
                </svg>
            </div>
            <div class="ms-3">
                <p id="hs-toast-normal-example-label" class="text-sm text-gray-700 dark:text-neutral-400">
                    {{ session('success') }}
                </p>
            </div>
        </div>
        <button type="button"
            class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-white"
            aria-label="Close" data-hs-remove-element="#dismiss-toast">
            <span class="sr-only">Tutup</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
        </button>
    </div>
</div>
@endif
<!-- End Toast Success -->
<!-- Toast Failed -->
@if (session('error'))
<div id="dismiss-toast-failed"
    class="absolute top-24 end-4 hs-removing:translate-x-5 z-[3000] hs-removing:opacity-0 transition duration-300 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-neutral-800 dark:border-neutral-700"
    role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
    <div class="flex p-4 items-center justify-between">
        <div class="flex mr-8">
            <div class="shrink-0">
                <svg class="shrink-0 size-4 text-red-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z">
                    </path>
                </svg>
            </div>
            <div class="ms-3">
                <p id="hs-toast-normal-example-label" class="text-sm text-gray-700 dark:text-neutral-400">
                    {{ session('error') }}
                </p>
            </div>
        </div>
        <button type="button"
            class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-white"
            aria-label="Close" data-hs-remove-element="#dismiss-toast-failed">
            <span class="sr-only">Tutup</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
        </button>
    </div>
</div>
@endif
<!-- End Toast Failed -->

<!-- Toast Error Validate -->
@if ($errors->any())
<div id="dismiss-toast-failed"
    class="absolute top-24 end-4 hs-removing:translate-x-5 z-[3100] hs-removing:opacity-0 transition duration-300 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-neutral-800 dark:border-neutral-700"
    role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
    <div class="flex p-4 items-center justify-between">
        <div class="flex mr-8">
            <div class="shrink-0">
                <svg class="shrink-0 size-4 text-red-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z">
                    </path>
                </svg>
            </div>
            <div class="ms-3">
                <p id="hs-toast-normal-example-label" class="text-sm text-gray-700 dark:text-neutral-400">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </p>
            </div>
        </div>
        <button type="button"
            class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-white"
            aria-label="Close" data-hs-remove-element="#dismiss-toast-failed">
            <span class="sr-only">Tutup</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
        </button>
    </div>
</div>
@endif
<!-- End Toast Failed Validate -->