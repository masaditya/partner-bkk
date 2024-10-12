<div id="hs-add-data-user-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[2000] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-add-data-user-modal-label">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-2xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div
            class="flex flex-col w-full bg-white border shadow-sm pointer-events-auto rounded-xl dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex items-center justify-between px-4 py-3 border-b dark:border-neutral-700">
                <h1 id="hs-add-data-user-modal-label" class="text-xl font-bold text-gray-800 dark:text-white">
                    Tambah Data Pelamar
                </h1>
                <button type="button"
                    class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                    aria-label="Close" data-hs-overlay="#hs-add-data-user-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">

                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-2">
                        <div class="grid grid-cols-1 gap-2 p-2 sm:grid-cols-2">
                            <!-- Name Field -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Nama
                                </label>
                                <input type="text" name="name" placeholder="Masukkan nama lengkap"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Email Field -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Email
                                </label>
                                <input type="email" name="email" placeholder="Masukkan alamat email"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Password Field -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Kata Sandi
                                </label>
                                <input type="password" name="password" placeholder="Masukkan kata sandi"
                                    autocomplete="password" minlength="8"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Password Confirmation Field -->
                            <div>
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Ketik Ulang Kata Sandi
                                </label>
                                <input type="password" name="password_confirmation"
                                    placeholder="Masukkan kembali kata sandi" autocomplete="re-enter-password"
                                    minlength="8"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            
                                <div class="mb-4.5">
                                    <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                        Status Alumni SMKN 1 BJN
                                    </label>
                                    <div class="flex items-center">
                                        <label for="is_alumni"
                                            class="text-xs text-gray-500 me-3 dark:text-neutral-400">Umum</label>
                                        <input type="hidden" name="is_alumni" value="0">
                                        <input type="checkbox" id="is_alumni" name="is_alumni" value="1"
                                            class="relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                                        <label for="is_alumni"
                                            class="text-xs text-gray-500 ms-3 dark:text-neutral-400">Alumni</label>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end px-4 py-3 gap-x-2">
                        <button type="button"
                            class="inline-flex items-center px-3 py-2 text-base font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            data-hs-overlay="#hs-add-data-user-modal">
                            Tutup
                        </button>
                        <button type="submit"
                            class="inline-flex items-center px-3 py-2 text-base font-medium text-white border border-transparent rounded-lg gap-x-2 bg-meta-3 hover:bg-opacity-90 focus:outline-none focus:bg-opacity-100">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
