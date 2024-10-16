<div id="hs-add-data-testimoni-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[2000] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-add-data-testimoni-modal-label">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-2xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div
            class="flex flex-col w-full bg-white border shadow-sm pointer-events-auto rounded-xl dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex items-center justify-between px-4 py-3 border-b dark:border-neutral-700">
                <h1 id="hs-add-data-testimoni-modal-label" class="text-xl font-bold text-gray-800 dark:text-white">
                    Tambah Data Testimoni
                </h1>
                <button type="button"
                    class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                    aria-label="Close" data-hs-overlay="#hs-add-data-testimoni-modal">
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
                <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-2">
                        <!-- Name Field -->
                        <div class="mb-4.5">
                            <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                Nama
                            </label>
                            <select name="user_id" 
                                class="w-full rounded border-[1.5px] border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                id="user_id">
                                <option value="" disabled selected>Pilih nama</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <div id="preview-user" class="mt-3 p-4 bg-gray-50 rounded-md border border-gray-200 dark:bg-neutral-800 dark:border-neutral-700">
                                <div class="flex items-center gap-x-4">
                                    <img src="" alt="Photo" class="object-cover w-12 h-12 rounded-full" onerror="this.src='https://placehold.co/48'" />
                                    <div class="flex flex-col">
                                        <span class="text-sm font-medium text-gray-800 dark:text-white" id="preview-user-name"></span>
                                        <span class="text-sm text-gray-600 dark:text-neutral-400" id="preview-user-company"></span>
                                        <span class="text-sm text-gray-600 dark:text-neutral-400" id="preview-user-position"></span>
                                    </div>
                                </div>
                            </div>
                            <script>
                                const selectUser = document.getElementById('user_id');
                                const previewUser = document.getElementById('preview-user');
                                const previewUserName = document.getElementById('preview-user-name');
                                const previewUserCompany = document.getElementById('preview-user-company');
                                const previewUserPosition = document.getElementById('preview-user-position');

                                selectUser.addEventListener('change', function() {
                                    const userId = this.value;
                                    const user = @json($users).find(user => user.id == userId);
                                    previewUser.classList.remove('hidden');
                                    previewUserName.textContent = user.name;
                                    previewUserCompany.textContent = user.company;
                                    previewUserPosition.textContent = user.position;
                                    previewUser.querySelector('img').src = user.photo || `{{ asset('images/blank-profile.png') }}`;
                                });
                            </script>
                        </div>

                        <!-- Desc Field -->
                        <div class="mb-4.5">
                            <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                Kutipan
                            </label>
                            <textarea name="quote" placeholder="Masukkan kutipan" maxlength="200"
                                class="w-full rounded border-[1.5px] border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"></textarea>
                        </div>

                        <div class="mb-4.5">
                            <label class="mb-3 block text-sm font-medium text-gray-700 dark:text-white">
                                company_logo (jpg, png, max 1mb)
                            </label>
                            <div class="flex items-center gap-4">
                                <div class="block">
                                    <div class="w-24 h-24 rounded">
                                        <img src="https://placehold.co/96" alt="Logo" id="previewImage" class="object-cover w-full h-full rounded">
                                    </div>
                                </div>
                                <div>
                                    <input type="file" accept="image/*" name="company_logo" id="thumbnail"
                                        class="block w-full text-sm text-gray-500 file:me-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-900 file:text-white hover:file:bg-blue-700 file:disabled:opacity-50 file:disabled:pointer-events-none dark:text-neutral-500 dark:file:bg-blue-500 dark:hover:file:bg-blue-400"
                                        onchange="document.getElementById('previewImage').src = URL.createObjectURL(this.files[0])">
                                </div>
                            </div>
                        </div>
                        <script>
                            const thumbnail = document.getElementById('thumbnail');
                            const previewImage = document.getElementById('previewImage');

                            thumbnail.addEventListener("change", function () {
                                const file = thumbnail.files[0];
                                const reader = new FileReader();

                                reader.addEventListener("load", function () {
                                    previewImage.src = reader.result;
                                });

                                reader.readAsDataURL(file);
                            });
                        </script>
                        
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end px-4 py-3 gap-x-2">
                        <button type="button"
                            class="inline-flex items-center px-3 py-2 text-base font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            data-hs-overlay="#hs-add-data-testimoni-modal">
                            Tutup
                        </button>
                        <button type="submit"
                            class="inline-flex items-center px-3 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-opacity-90 focus:outline-none focus:bg-opacity-100">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

