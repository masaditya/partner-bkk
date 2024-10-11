<div id="hs-edit-data-{{ $partner->id }}"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[2000] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-edit-data-{{ $partner->id }}-label">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-2xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div
            class="flex flex-col w-full bg-white border shadow-sm pointer-events-auto rounded-xl dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex items-center justify-between px-4 py-3 border-b dark:border-neutral-700">
                <h1 id="hs-edit-data-{{ $partner->id }}-label" class="text-xl font-bold text-gray-800 dark:text-white">
                    Ubah Data Mitra Industri
                </h1>
                <button type="button"
                    class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                    aria-label="Close" data-hs-overlay="#hs-edit-data-{{ $partner->id }}">
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

                <form action="{{ route('partner.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-2">
                        <div class="grid grid-cols-1 gap-2 p-2 sm:grid-cols-2">
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Nama
                                </label>
                                <input type="text" name="name" value="{{ old('name', $partner->name) }}"
                                    placeholder="Masukkan nama lengkap"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Email Field -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Email
                                </label>
                                <input type="email" name="email" value="{{ old('email', $partner->email) }}"
                                    placeholder="Masukkan alamat email"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Phone Field -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    No Telp
                                </label>
                                <input name="phone" type="text" value="{{ old('phone', $partner->phone) }}"
                                    placeholder="Masukkan nomor telepon" maxlength="15" minlength="10"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Company Name Field -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Nama Perusahaan
                                </label>
                                <input name="company_name" type="text"
                                    value="{{ old('company_name', $partner->company_name) }}"
                                    placeholder="Masukkan nama perusahaan"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Company Industry -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Bidang Perusahaan
                                </label>
                                <select name="company_industry_id"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                                    <option value="">Pilih bidang perusahaan</option>
                                    @foreach($industries as $industry)
                                    <option value="{{ $industry->id }}"
                                        {{ $partner->company_industry_id == $industry->id ? 'selected' : '' }}>
                                        {{ $industry->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Company City -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Asal Kota Perusahaan
                                </label>
                                <select name="company_city"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                                    <option value="">Pilih kota asal</option>
                                    <option value="Ambon" {{ $partner->company_city == 'Ambon' ? 'selected' : '' }}>
                                        Ambon</option>
                                    <option value="Balikpapan"
                                        {{ $partner->company_city == 'Balikpapan' ? 'selected' : '' }}>Balikpapan
                                    </option>
                                    <option value="Banda Aceh"
                                        {{ $partner->company_city == 'Banda Aceh' ? 'selected' : '' }}>Banda Aceh
                                    </option>
                                    <option value="Bandar Lampung"
                                        {{ $partner->company_city == 'Bandar Lampung' ? 'selected' : '' }}>Bandar
                                        Lampung</option>
                                    <option value="Bandung" {{ $partner->company_city == 'Bandung' ? 'selected' : '' }}>
                                        Bandung</option>
                                    <option value="Banjar" {{ $partner->company_city == 'Banjar' ? 'selected' : '' }}>
                                        Banjar</option>
                                    <option value="Banjarbaru"
                                        {{ $partner->company_city == 'Banjarbaru' ? 'selected' : '' }}>Banjarbaru
                                    </option>
                                    <option value="Banjarmasin"
                                        {{ $partner->company_city == 'Banjarmasin' ? 'selected' : '' }}>Banjarmasin
                                    </option>
                                    <option value="Batam" {{ $partner->company_city == 'Batam' ? 'selected' : '' }}>
                                        Batam</option>
                                    <option value="Batu" {{ $partner->company_city == 'Batu' ? 'selected' : '' }}>Batu
                                    </option>
                                    <option value="Baubau" {{ $partner->company_city == 'Baubau' ? 'selected' : '' }}>
                                        Baubau</option>
                                    <option value="Bekasi" {{ $partner->company_city == 'Bekasi' ? 'selected' : '' }}>
                                        Bekasi</option>
                                    <option value="Bengkulu"
                                        {{ $partner->company_city == 'Bengkulu' ? 'selected' : '' }}>Bengkulu</option>
                                    <option value="Bima" {{ $partner->company_city == 'Bima' ? 'selected' : '' }}>Bima
                                    </option>
                                    <option value="Binjai" {{ $partner->company_city == 'Binjai' ? 'selected' : '' }}>
                                        Binjai</option>
                                    <option value="Bitung" {{ $partner->company_city == 'Bitung' ? 'selected' : '' }}>
                                        Bitung</option>
                                    <option value="Blitar" {{ $partner->company_city == 'Blitar' ? 'selected' : '' }}>
                                        Blitar</option>
                                    <option value="Bogor" {{ $partner->company_city == 'Bogor' ? 'selected' : '' }}>
                                        Bogor</option>
                                    <option value="Bontang" {{ $partner->company_city == 'Bontang' ? 'selected' : '' }}>
                                        Bontang</option>
                                    <option value="Bukittinggi"
                                        {{ $partner->company_city == 'Bukittinggi' ? 'selected' : '' }}>Bukittinggi
                                    </option>
                                    <option value="Cilegon" {{ $partner->company_city == 'Cilegon' ? 'selected' : '' }}>
                                        Cilegon</option>
                                    <option value="Cimahi" {{ $partner->company_city == 'Cimahi' ? 'selected' : '' }}>
                                        Cimahi</option>
                                    <option value="Cirebon" {{ $partner->company_city == 'Cirebon' ? 'selected' : '' }}>
                                        Cirebon</option>
                                    <option value="Denpasar"
                                        {{ $partner->company_city == 'Denpasar' ? 'selected' : '' }}>Denpasar</option>
                                    <option value="Depok" {{ $partner->company_city == 'Depok' ? 'selected' : '' }}>
                                        Depok</option>
                                    <option value="Dumai" {{ $partner->company_city == 'Dumai' ? 'selected' : '' }}>
                                        Dumai</option>
                                    <option value="Gorontalo"
                                        {{ $partner->company_city == 'Gorontalo' ? 'selected' : '' }}>Gorontalo</option>
                                    <option value="Gunungsitoli"
                                        {{ $partner->company_city == 'Gunungsitoli' ? 'selected' : '' }}>Gunungsitoli
                                    </option>
                                    <option value="Jambi" {{ $partner->company_city == 'Jambi' ? 'selected' : '' }}>
                                        Jambi</option>
                                    <option value="Jayapura"
                                        {{ $partner->company_city == 'Jayapura' ? 'selected' : '' }}>Jayapura</option>
                                    <option value="Jakarta" {{ $partner->company_city == 'Jakarta' ? 'selected' : '' }}>
                                        Jakarta</option>
                                    <option value="Kediri" {{ $partner->company_city == 'Kediri' ? 'selected' : '' }}>
                                        Kediri</option>
                                    <option value="Kendari" {{ $partner->company_city == 'Kendari' ? 'selected' : '' }}>
                                        Kendari</option>
                                    <option value="Kota Bengkulu"
                                        {{ $partner->company_city == 'Kota Bengkulu' ? 'selected' : '' }}>Kota Bengkulu
                                    </option>
                                    <option value="Kotamobagu"
                                        {{ $partner->company_city == 'Kotamobagu' ? 'selected' : '' }}>Kotamobagu
                                    </option>
                                    <option value="Kupang" {{ $partner->company_city == 'Kupang' ? 'selected' : '' }}>
                                        Kupang</option>
                                    <option value="Langsa" {{ $partner->company_city == 'Langsa' ? 'selected' : '' }}>
                                        Langsa</option>
                                    <option value="Lhokseumawe"
                                        {{ $partner->company_city == 'Lhokseumawe' ? 'selected' : '' }}>Lhokseumawe
                                    </option>
                                    <option value="Lubuklinggau"
                                        {{ $partner->company_city == 'Lubuklinggau' ? 'selected' : '' }}>Lubuklinggau
                                    </option>
                                    <option value="Madiun" {{ $partner->company_city == 'Madiun' ? 'selected' : '' }}>
                                        Madiun</option>
                                    <option value="Magelang"
                                        {{ $partner->company_city == 'Magelang' ? 'selected' : '' }}>Magelang</option>
                                    <option value="Makassar"
                                        {{ $partner->company_city == 'Makassar' ? 'selected' : '' }}>Makassar</option>
                                    <option value="Malang" {{ $partner->company_city == 'Malang' ? 'selected' : '' }}>
                                        Malang</option>
                                    <option value="Manado" {{ $partner->company_city == 'Manado' ? 'selected' : '' }}>
                                        Manado</option>
                                    <option value="Mataram" {{ $partner->company_city == 'Mataram' ? 'selected' : '' }}>
                                        Mataram</option>
                                    <option value="Medan" {{ $partner->company_city == 'Medan' ? 'selected' : '' }}>
                                        Medan</option>
                                    <option value="Metro" {{ $partner->company_city == 'Metro' ? 'selected' : '' }}>
                                        Metro</option>
                                    <option value="Meulaboh"
                                        {{ $partner->company_city == 'Meulaboh' ? 'selected' : '' }}>Meulaboh</option>
                                    <option value="Mojokerto"
                                        {{ $partner->company_city == 'Mojokerto' ? 'selected' : '' }}>Mojokerto</option>
                                    <option value="Padang" {{ $partner->company_city == 'Padang' ? 'selected' : '' }}>
                                        Padang</option>
                                    <option value="Padang Panjang"
                                        {{ $partner->company_city == 'Padang Panjang' ? 'selected' : '' }}>Padang
                                        Panjang</option>
                                    <option value="Padang Sidempuan"
                                        {{ $partner->company_city == 'Padang Sidempuan' ? 'selected' : '' }}>Padang
                                        Sidempuan</option>
                                    <option value="Pagaralam"
                                        {{ $partner->company_city == 'Pagaralam' ? 'selected' : '' }}>Pagaralam</option>
                                    <option value="Palangkaraya"
                                        {{ $partner->company_city == 'Palangkaraya' ? 'selected' : '' }}>Palangkaraya
                                    </option>
                                    <option value="Palembang"
                                        {{ $partner->company_city == 'Palembang' ? 'selected' : '' }}>Palembang</option>
                                    <option value="Palopo" {{ $partner->company_city == 'Palopo' ? 'selected' : '' }}>
                                        Palopo</option>
                                    <option value="Palu" {{ $partner->company_city == 'Palu' ? 'selected' : '' }}>Palu
                                    </option>
                                    <option value="Pangkalpinang"
                                        {{ $partner->company_city == 'Pangkalpinang' ? 'selected' : '' }}>Pangkalpinang
                                    </option>
                                    <option value="Parepare"
                                        {{ $partner->company_city == 'Parepare' ? 'selected' : '' }}>Parepare</option>
                                    <option value="Pariaman"
                                        {{ $partner->company_city == 'Pariaman' ? 'selected' : '' }}>Pariaman</option>
                                    <option value="Pasuruan"
                                        {{ $partner->company_city == 'Pasuruan' ? 'selected' : '' }}>Pasuruan</option>
                                    <option value="Payakumbuh"
                                        {{ $partner->company_city == 'Payakumbuh' ? 'selected' : '' }}>Payakumbuh
                                    </option>
                                    <option value="Pekalongan"
                                        {{ $partner->company_city == 'Pekalongan' ? 'selected' : '' }}>Pekalongan
                                    </option>
                                    <option value="Pekanbaru"
                                        {{ $partner->company_city == 'Pekanbaru' ? 'selected' : '' }}>Pekanbaru</option>
                                    <option value="Pematangsiantar"
                                        {{ $partner->company_city == 'Pematangsiantar' ? 'selected' : '' }}>
                                        Pematangsiantar</option>
                                    <option value="Pontianak"
                                        {{ $partner->company_city == 'Pontianak' ? 'selected' : '' }}>Pontianak</option>
                                    <option value="Prabumulih"
                                        {{ $partner->company_city == 'Prabumulih' ? 'selected' : '' }}>Prabumulih
                                    </option>
                                    <option value="Probolinggo"
                                        {{ $partner->company_city == 'Probolinggo' ? 'selected' : '' }}>Probolinggo
                                    </option>
                                    <option value="Sabang" {{ $partner->company_city == 'Sabang' ? 'selected' : '' }}>
                                        Sabang</option>
                                    <option value="Salatiga"
                                        {{ $partner->company_city == 'Salatiga' ? 'selected' : '' }}>Salatiga</option>
                                    <option value="Samarinda"
                                        {{ $partner->company_city == 'Samarinda' ? 'selected' : '' }}>Samarinda</option>
                                    <option value="Sawahlunto"
                                        {{ $partner->company_city == 'Sawahlunto' ? 'selected' : '' }}>Sawahlunto
                                    </option>
                                    <option value="Semarang"
                                        {{ $partner->company_city == 'Semarang' ? 'selected' : '' }}>Semarang</option>
                                    <option value="Serang" {{ $partner->company_city == 'Serang' ? 'selected' : '' }}>
                                        Serang</option>
                                    <option value="Sibolga" {{ $partner->company_city == 'Sibolga' ? 'selected' : '' }}>
                                        Sibolga</option>
                                    <option value="Singkawang"
                                        {{ $partner->company_city == 'Singkawang' ? 'selected' : '' }}>Singkawang
                                    </option>
                                    <option value="Solok" {{ $partner->company_city == 'Solok' ? 'selected' : '' }}>
                                        Solok</option>
                                    <option value="Sorong" {{ $partner->company_city == 'Sorong' ? 'selected' : '' }}>
                                        Sorong</option>
                                    <option value="Subulussalam"
                                        {{ $partner->company_city == 'Subulussalam' ? 'selected' : '' }}>Subulussalam
                                    </option>
                                    <option value="Sukabumi"
                                        {{ $partner->company_city == 'Sukabumi' ? 'selected' : '' }}>Sukabumi</option>
                                    <option value="Sungai Penuh"
                                        {{ $partner->company_city == 'Sungai Penuh' ? 'selected' : '' }}>Sungai Penuh
                                    </option>
                                    <option value="Surabaya"
                                        {{ $partner->company_city == 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                                    <option value="Surakarta"
                                        {{ $partner->company_city == 'Surakarta' ? 'selected' : '' }}>Surakarta</option>
                                    <option value="Tangerang"
                                        {{ $partner->company_city == 'Tangerang' ? 'selected' : '' }}>Tangerang</option>
                                    <option value="Tangerang Selatan"
                                        {{ $partner->company_city == 'Tangerang Selatan' ? 'selected' : '' }}>Tangerang
                                        Selatan</option>
                                    <option value="Tanjungbalai"
                                        {{ $partner->company_city == 'Tanjungbalai' ? 'selected' : '' }}>Tanjungbalai
                                    </option>
                                    <option value="Tanjungpinang"
                                        {{ $partner->company_city == 'Tanjungpinang' ? 'selected' : '' }}>Tanjungpinang
                                    </option>
                                    <option value="Tarakan" {{ $partner->company_city == 'Tarakan' ? 'selected' : '' }}>
                                        Tarakan</option>
                                    <option value="Tasikmalaya"
                                        {{ $partner->company_city == 'Tasikmalaya' ? 'selected' : '' }}>Tasikmalaya
                                    </option>
                                    <option value="Tebing Tinggi"
                                        {{ $partner->company_city == 'Tebing Tinggi' ? 'selected' : '' }}>Tebing Tinggi
                                    </option>
                                    <option value="Tegal" {{ $partner->company_city == 'Tegal' ? 'selected' : '' }}>
                                        Tegal</option>
                                    <option value="Ternate" {{ $partner->company_city == 'Ternate' ? 'selected' : '' }}>
                                        Ternate</option>
                                    <option value="Tidore" {{ $partner->company_city == 'Tidore' ? 'selected' : '' }}>
                                        Tidore</option>
                                    <option value="Tomohon" {{ $partner->company_city == 'Tomohon' ? 'selected' : '' }}>
                                        Tomohon</option>
                                    <option value="Tual" {{ $partner->company_city == 'Tual' ? 'selected' : '' }}>Tual
                                    </option>

                                    <option value="Yogyakarta"
                                        {{ $partner->company_city == 'Yogyakarta' ? 'selected' : '' }}>Yogyakarta
                                    </option>
                                </select>
                            </div>

                            <div class="mb-4.5 flex items-center justify-start gap-3 px-4">
                                <div class="block">
                                    @if($partner->logo)
                                    <img src="{{ $partner->logo }}" alt="Logo {{ $partner->name }}"
                                        class="object-cover w-20 h-20 rounded">
                                    @else
                                    <div
                                        class="flex items-center justify-center w-20 h-20 bg-gray-200 rounded dark:bg-gray-700">
                                        <span class="font-medium text-gray-700 dark:text-gray-300">
                                            {{ Str::upper(Str::substr($partner->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                        Logo Perusahaan (Kosongkan jika tidak diganti, max
                                        1mb)
                                    </label>
                                    <label class="block">
                                        <span class="sr-only">Pilih logo Perusahaan (Kosongkan jika tidak diganti, max
                                            1mb)</span>
                                        <input type="file" accept="image/*" name="logo" class="block w-full text-sm text-gray-500 file:me-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-emerald-600 file:text-white hover:file:bg-emerald-700 file:disabled:opacity-50 file:disabled:pointer-events-none dark:text-neutral-500 dark:file:bg-emerald-500 dark:hover:file:bg-emerald-400">
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4.5">
                                <div class="mb-4.5">
                                    <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                        Status Verifikasi Akun
                                    </label>
                                    <div class="flex items-center">
                                        <label for="is_verified"
                                            class="text-xs text-gray-500 me-3 dark:text-neutral-400">Belum
                                            Verifikasi</label>
                                        <input type="hidden" name="is_verified" value="0">
                                        <!-- Hidden input for unchecked state -->
                                        <input type="checkbox" id="is_verified" name="is_verified" value="1"
                                            class="relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200"
                                            {{ $partner->is_verified ? 'checked' : '' }}>
                                        <label for="is_verified"
                                            class="text-xs text-gray-500 ms-3 dark:text-neutral-400">Sudah
                                            Verifikasi</label>
                                    </div>
                                </div>

                                <div>
                                    <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                        Tampilkan Logo di halaman utama
                                    </label>
                                    <div class="flex items-center">
                                        <label for="is_show"
                                            class="text-xs text-gray-500 me-3 dark:text-neutral-400">Belum
                                            Tampilkan</label>
                                        <input type="hidden" name="is_show" value="0">
                                        <!-- Hidden input for unchecked state -->
                                        <input type="checkbox" id="is_show" name="is_show" value="1"
                                            class="relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200"
                                            {{ $partner->is_show ? 'checked' : '' }}>
                                        <label for="is_show"
                                            class="text-xs text-gray-500 ms-3 dark:text-neutral-400">Sudah
                                            Tampilkan</label>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <!-- Submit Button -->
                        <div class="flex items-center justify-end px-4 py-3 gap-x-2">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 text-base font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                data-hs-overlay="#hs-edit-data-{{ $partner->id }}">
                                Tutup
                            </button>
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 text-base font-medium text-white border border-transparent rounded-lg gap-x-2 bg-meta-3 hover:bg-opacity-90 focus:outline-none focus:bg-opacity-100">
                                Perbarui
                            </button>



                        </div>
                </form>


            </div>
        </div>
    </div>
</div>
