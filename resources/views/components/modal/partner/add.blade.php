<div id="hs-add-data-partner-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[2000] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-add-data-partner-modal-label">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-2xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div
            class="flex flex-col w-full bg-white border shadow-sm pointer-events-auto rounded-xl dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex items-center justify-between px-4 py-3 border-b dark:border-neutral-700">
                <h1 id="hs-add-data-partner-modal-label" class="text-xl font-bold text-gray-800 dark:text-white">
                    Tambah Data Mitra Industri
                </h1>
                <button type="button"
                    class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                    aria-label="Close" data-hs-overlay="#hs-add-data-partner-modal">
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

                <form action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-2">
                        <div class="grid grid-cols-1 gap-3 p-2 sm:grid-cols-2">
                            
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Nama Perusahaan<span class="text-red-500 text-sm">*</span>
                                </label>
                                <input name="company_name" type="text" placeholder="Masukkan nomor telepon" class="w-full rounded border-[1.5px] border-stroke border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>
                            <!-- Email Field -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Alamat Email<span class="text-red-500 text-sm">*</span>
                                </label>
                                <input type="email" name="email" placeholder="Masukkan alamat email" class="w-full rounded border-[1.5px] border-stroke border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Phone Field -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    No Telepon(WA Aktif)<span class="text-red-500 text-sm">*</span>
                                </label>
                                <input name="phone" type="text" placeholder="Masukkan nomor telepon" maxlength="15"
                                    minlength="10" class="w-full rounded border-[1.5px] border-stroke border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Company Industry (Bidang Perusahaan) -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Bidang Perusahaan<span class="text-red-500 text-sm">*</span>
                                </label>
                                <select name="company_industry_id"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                                    <option value="">Pilih bidang perusahaan</option>
                                    @foreach($industries as $industry)
                                    <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Password Field -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Kata Sandi<span class="text-red-500 text-sm">*</span>
                                </label>
                                <input type="password" name="password" placeholder="Masukkan kata sandi"
                                    autocomplete="password" minlength="8"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Password Confirmation Field -->
                            <div>
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Ketik Ulang Kata Sandi<span class="text-red-500 text-sm">*</span>
                                </label>
                                <input type="password" name="password_confirmation"
                                    placeholder="Masukkan kembali kata sandi" autocomplete="re-enter-password"
                                    minlength="8"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Company City (Asal Kota Perusahaan) -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Asal Kota Perusahaan<span class="text-red-500 text-sm">*</span>
                                </label>
                                <select name="company_city"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                                    <option value="">Pilih kota asal</option>
                                    <option value="Bandung">Bandung</option>
                                    <option value="Batam">Batam</option>
                                    <option value="Batu">Batu</option>
                                    <option value="Bekasi">Bekasi</option>
                                    <option value="Blitar">Blitar</option>
                                    <option value="Bogor">Bogor</option>
                                    <option value="Bojonegoro">Bojonegoro</option>
                                    <option value="Cimahi">Cimahi</option>
                                    <option value="Cirebon">Cirebon</option>
                                    <option value="Denpasar">Denpasar</option>
                                    <option value="Depok">Depok</option>
                                    <option value="Gresik">Gresik</option>
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Jombang">Jombang</option>
                                    <option value="Kediri">Kediri</option>
                                    <option value="Lamongan">Lamongan</option>
                                    <option value="Lumajang">Lumajang</option>
                                    <option value="Madiun">Madiun</option>
                                    <option value="Magelang">Magelang</option>
                                    <option value="Magetan">Magetan</option>
                                    <option value="Malang">Malang</option>
                                    <option value="Mojokerto">Mojokerto</option>
                                    <option value="Nganjuk">Nganjuk</option>
                                    <option value="Ngawi">Ngawi</option>
                                    <option value="Pasuruan">Pasuruan</option>
                                    <option value="Pekalongan">Pekalongan</option>
                                    <option value="Probolinggo">Probolinggo</option>
                                    <option value="Semarang">Semarang</option>
                                    <option value="Sidoarjo">Sidoarjo</option>
                                    <option value="Surabaya">Surabaya</option>
                                    <option value="Surakarta">Surakarta</option>
                                    <option value="Tangerang">Tangerang</option>
                                    <option value="Tasikmalaya">Tasikmalaya</option>
                                    <option value="Tangerang Selatan">Tangerang Selatan</option>
                                    <option value="Tuban">Tuban</option>
                                    <option value="Yogyakarta">Yogyakarta</option>
                                </select>
                            </div>

                            <div class="mb-4.5">
                            <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Logo Perusahaan
                                </label>
                            <label class="block">
                            <span class="sr-only">Pilih logo Perusahaan</span>
                            <input type="file" accept="image/*" name="logo" class="block w-full text-sm text-gray-500 file:me-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-900 file:text-white hover:file:bg-blue-700 file:disabled:opacity-50 file:disabled:pointer-events-none dark:text-neutral-500 dark:file:bg-blue-500 dark:hover:file:bg-blue-400">
                            </label>
                        </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end px-4 py-3 gap-x-2">
                        <button type="button"
                            class="inline-flex items-center px-3 py-2 text-base font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            data-hs-overlay="#hs-add-data-partner-modal">
                            Tutup
                        </button>
                        <button type="submit"
                            class="inline-flex items-center px-3 py-2 text-base font-medium text-white border border-transparent rounded-lg gap-x-2 bg-blue-600 hover:bg-opacity-90 focus:outline-none focus:bg-opacity-100">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
