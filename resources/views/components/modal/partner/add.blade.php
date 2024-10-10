<div id="hs-add-data-partner-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[2000] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-add-data-partner-modal-label">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-2xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div
            class="flex flex-col w-full bg-white border shadow-sm pointer-events-auto rounded-xl dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex items-center justify-between px-4 py-3 border-b dark:border-neutral-700">
                <h1 id="hs-add-data-partner-modal-label" class="text-xl font-bold text-gray-800 dark:text-white">
                    Tambah Data Admin
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

                <form action="{{ route('partner.store') }}" method="POST">
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

                            <!-- Phone Field -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    No Telp
                                </label>
                                <input name="phone" type="text" placeholder="Masukkan nomor telepon" maxlength="15"
                                    minlength="10"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Phone Company Name -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Nama Perusahaan
                                </label>
                                <input name="company_name" type="text" placeholder="Masukkan nomor telepon" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Company Industry (Bidang Perusahaan) -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Bidang Perusahaan
                                </label>
                                <select name="company_industry_id"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                                    <option value="">Pilih bidang perusahaan</option>
                                    @foreach($industries as $industry)
                                    <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Company City (Asal Kota Perusahaan) -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Asal Kota Perusahaan
                                </label>
                                <select name="company_city"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                                    <option value="">Pilih kota asal</option>
                                    <option value="Ambon">Ambon</option>
                                    <option value="Balikpapan">Balikpapan</option>
                                    <option value="Banda Aceh">Banda Aceh</option>
                                    <option value="Bandar Lampung">Bandar Lampung</option>
                                    <option value="Bandung">Bandung</option>
                                    <option value="Banjar">Banjar</option>
                                    <option value="Banjarbaru">Banjarbaru</option>
                                    <option value="Banjarmasin">Banjarmasin</option>
                                    <option value="Batam">Batam</option>
                                    <option value="Batu">Batu</option>
                                    <option value="Baubau">Baubau</option>
                                    <option value="Bekasi">Bekasi</option>
                                    <option value="Bengkulu">Bengkulu</option>
                                    <option value="Bima">Bima</option>
                                    <option value="Binjai">Binjai</option>
                                    <option value="Bitung">Bitung</option>
                                    <option value="Blitar">Blitar</option>
                                    <option value="Bogor">Bogor</option>
                                    <option value="Bontang">Bontang</option>
                                    <option value="Bukittinggi">Bukittinggi</option>
                                    <option value="Cilegon">Cilegon</option>
                                    <option value="Cimahi">Cimahi</option>
                                    <option value="Cirebon">Cirebon</option>
                                    <option value="Denpasar">Denpasar</option>
                                    <option value="Depok">Depok</option>
                                    <option value="Dumai">Dumai</option>
                                    <option value="Gorontalo">Gorontalo</option>
                                    <option value="Gunungsitoli">Gunungsitoli</option>
                                    <option value="Jambi">Jambi</option>
                                    <option value="Jayapura">Jayapura</option>
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Kediri">Kediri</option>
                                    <option value="Kendari">Kendari</option>
                                    <option value="Kota Bengkulu">Kota Bengkulu</option>
                                    <option value="Kotamobagu">Kotamobagu</option>
                                    <option value="Kupang">Kupang</option>
                                    <option value="Langsa">Langsa</option>
                                    <option value="Lhokseumawe">Lhokseumawe</option>
                                    <option value="Lubuklinggau">Lubuklinggau</option>
                                    <option value="Madiun">Madiun</option>
                                    <option value="Magelang">Magelang</option>
                                    <option value="Makassar">Makassar</option>
                                    <option value="Malang">Malang</option>
                                    <option value="Manado">Manado</option>
                                    <option value="Mataram">Mataram</option>
                                    <option value="Medan">Medan</option>
                                    <option value="Metro">Metro</option>
                                    <option value="Meulaboh">Meulaboh</option>
                                    <option value="Mojokerto">Mojokerto</option>
                                    <option value="Padang">Padang</option>
                                    <option value="Padang Panjang">Padang Panjang</option>
                                    <option value="Padang Sidempuan">Padang Sidempuan</option>
                                    <option value="Pagaralam">Pagaralam</option>
                                    <option value="Palangkaraya">Palangkaraya</option>
                                    <option value="Palembang">Palembang</option>
                                    <option value="Palopo">Palopo</option>
                                    <option value="Palu">Palu</option>
                                    <option value="Pangkalpinang">Pangkalpinang</option>
                                    <option value="Parepare">Parepare</option>
                                    <option value="Pariaman">Pariaman</option>
                                    <option value="Pasuruan">Pasuruan</option>
                                    <option value="Payakumbuh">Payakumbuh</option>
                                    <option value="Pekalongan">Pekalongan</option>
                                    <option value="Pekanbaru">Pekanbaru</option>
                                    <option value="Pematangsiantar">Pematangsiantar</option>
                                    <option value="Pontianak">Pontianak</option>
                                    <option value="Prabumulih">Prabumulih</option>
                                    <option value="Probolinggo">Probolinggo</option>
                                    <option value="Sabang">Sabang</option>
                                    <option value="Salatiga">Salatiga</option>
                                    <option value="Samarinda">Samarinda</option>
                                    <option value="Sawahlunto">Sawahlunto</option>
                                    <option value="Semarang">Semarang</option>
                                    <option value="Serang">Serang</option>
                                    <option value="Sibolga">Sibolga</option>
                                    <option value="Singkawang">Singkawang</option>
                                    <option value="Solok">Solok</option>
                                    <option value="Sorong">Sorong</option>
                                    <option value="Subulussalam">Subulussalam</option>
                                    <option value="Sukabumi">Sukabumi</option>
                                    <option value="Sungai Penuh">Sungai Penuh</option>
                                    <option value="Surabaya">Surabaya</option>
                                    <option value="Surakarta">Surakarta</option>
                                    <option value="Tangerang">Tangerang</option>
                                    <option value="Tangerang Selatan">Tangerang Selatan</option>
                                    <option value="Tanjungbalai">Tanjungbalai</option>
                                    <option value="Tanjungpinang">Tanjungpinang</option>
                                    <option value="Tarakan">Tarakan</option>
                                    <option value="Tasikmalaya">Tasikmalaya</option>
                                    <option value="Tebing Tinggi">Tebing Tinggi</option>
                                    <option value="Tegal">Tegal</option>
                                    <option value="Ternate">Ternate</option>
                                    <option value="Tidore">Tidore</option>
                                    <option value="Tomohon">Tomohon</option>
                                    <option value="Tual">Tual</option>
                                    <option value="Yogyakarta">Yogyakarta</option>
                                </select>
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
                            class="inline-flex items-center px-3 py-2 text-base font-medium text-white border border-transparent rounded-lg gap-x-2 bg-meta-3 hover:bg-opacity-90 focus:outline-none focus:bg-opacity-100">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
