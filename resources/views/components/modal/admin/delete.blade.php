<div id="hs-delete-data-{{ $admin->id }}"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[3000] overflow-x-hidden overflow-y-auto" role="dialog"
    tabindex="-1" aria-labelledby="hs-delete-data-{{ $admin->id }}-label">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-xs sm:w-full m-3 sm:mx-auto">
        <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-neutral-900">
            <div class="absolute top-2 end-2">
                <button type="button"
                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gary-700 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                    aria-label="Close" data-hs-overlay="#hs-delete-data-{{ $admin->id }}">
                    <span class="sr-only">Tutup</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" /></svg>
                </button>
            </div>

            <div class="p-4 sm:p-10 text-center overflow-y-auto">
                <!-- Icon -->
                <span
                    class="mb-4 inline-flex justify-center items-center size-[62px] rounded-full border-4 border-yellow-50 bg-yellow-100 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100">
                    <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                </span>
                <!-- End Icon -->

                <h3 id="hs-delete-data-{{ $admin->id }}-label"
                    class="mb-2 text-2xl font-bold text-gary-700 dark:text-neutral-200">
                    Hapus Data
                </h3>
                <p class="text-gray-500 dark:text-neutral-500">
                    Apakah Anda yakin ingin menghapus data ini?
                </p>

                <div class="mt-6 grid gap-y-2">
                    <form action="{{ route('admin.destroy', $admin->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="py-2.5 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                            Hapus
                        </button>
                    </form>

                    <button type="button"
                        class="py-2.5 px-4 w-full inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gary-700 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                        data-hs-overlay="#hs-delete-data-{{ $admin->id }}">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
