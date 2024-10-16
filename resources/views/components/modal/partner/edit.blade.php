<div id="hs-edit-data-{{ $partner->id }}"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[2000] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-edit-data-{{ $partner->id }}-label">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-2xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div
            class="flex flex-col w-full bg-white border shadow-sm pointer-events-auto rounded-xl dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex items-center justify-between px-4 py-3 border-b dark:border-neutral-700">
                <h1 id="hs-edit-data-{{ $partner->id }}-label" class="text-xl font-bold text-gray-700 dark:text-white">
                    Ubah Data Mitra Industri
                </h1>
                <button type="button"
                    class="inline-flex items-center justify-center text-gray-700 bg-gray-100 border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
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

                            <!-- Company Name Field -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Nama Perusahaan<span class="text-sm text-red-500">*</span>
                                </label>
                                <input name="company_name" type="text"
                                    value="{{ old('company_name', $partner->company_name) }}"
                                    placeholder="Masukkan nama perusahaan"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Alamat Email<span class="text-sm text-red-500">*</span>
                                </label>
                                <input type="email" name="email" placeholder="Masukkan nomer induk siswa"
                                    value="{{ old('email', $partner->email) }}" required
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Phone Field -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    No Telp<span class="text-sm text-red-500">*</span>
                                </label>
                                <input name="phone" type="text" value="{{ old('phone', $partner->phone) }}"
                                    placeholder="Masukkan nomor telepon" maxlength="15" minlength="10"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <!-- Company Industry -->
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Bidang Perusahaan<span class="text-sm text-red-500">*</span>
                                </label>
                                <select name="company_industry_id"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
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
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Asal Kota Perusahaan<span class="text-sm text-red-500">*</span>
                                </label>
                                <select name="company_city"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                                    <option value="">Pilih kota asal</option>
                                    <option value="Bandung" {{ $partner->company_city == 'Bandung' ? 'selected' : '' }}>
                                        Bandung</option>
                                    <option value="Batam" {{ $partner->company_city == 'Batam' ? 'selected' : '' }}>
                                        Batam</option>
                                    <option value="Batu" {{ $partner->company_city == 'Batu' ? 'selected' : '' }}>Batu
                                    </option>
                                    <option value="Bekasi" {{ $partner->company_city == 'Bekasi' ? 'selected' : '' }}>
                                        Bekasi</option>
                                    <option value="Blitar" {{ $partner->company_city == 'Blitar' ? 'selected' : '' }}>
                                        Blitar</option>
                                    <option value="Bogor" {{ $partner->company_city == 'Bogor' ? 'selected' : '' }}>
                                        Bogor</option>
                                    <option value="Bojonegoro"
                                        {{ $partner->company_city == 'Bojonegoro' ? 'selected' : '' }}>Bojonegoro
                                    </option>
                                    <option value="Cimahi" {{ $partner->company_city == 'Cimahi' ? 'selected' : '' }}>
                                        Cimahi</option>
                                    <option value="Cirebon" {{ $partner->company_city == 'Cirebon' ? 'selected' : '' }}>
                                        Cirebon</option>
                                    <option value="Denpasar"
                                        {{ $partner->company_city == 'Denpasar' ? 'selected' : '' }}>Denpasar</option>
                                    <option value="Depok" {{ $partner->company_city == 'Depok' ? 'selected' : '' }}>
                                        Depok</option>
                                    <option value="Gresik" {{ $partner->company_city == 'Gresik' ? 'selected' : '' }}>
                                        Gresik</option>
                                    <option value="Jakarta" {{ $partner->company_city == 'Jakarta' ? 'selected' : '' }}>
                                        Jakarta</option>
                                    <option value="Jombang" {{ $partner->company_city == 'Jombang' ? 'selected' : '' }}>
                                        Jombang</option>
                                    <option value="Kediri" {{ $partner->company_city == 'Kediri' ? 'selected' : '' }}>
                                        Kediri</option>
                                    <option value="Lamongan"
                                        {{ $partner->company_city == 'Lamongan' ? 'selected' : '' }}>Lamongan</option>
                                    <option value="Lumajang"
                                        {{ $partner->company_city == 'Lumajang' ? 'selected' : '' }}>Lumajang</option>
                                    <option value="Madiun" {{ $partner->company_city == 'Madiun' ? 'selected' : '' }}>
                                        Madiun</option>
                                    <option value="Magelang"
                                        {{ $partner->company_city == 'Magelang' ? 'selected' : '' }}>Magelang</option>
                                    <option value="Magetan" {{ $partner->company_city == 'Magetan' ? 'selected' : '' }}>
                                        Magetan</option>
                                    <option value="Malang" {{ $partner->company_city == 'Malang' ? 'selected' : '' }}>
                                        Malang</option>
                                    <option value="Mojokerto"
                                        {{ $partner->company_city == 'Mojokerto' ? 'selected' : '' }}>Mojokerto</option>
                                    <option value="Nganjuk" {{ $partner->company_city == 'Nganjuk' ? 'selected' : '' }}>
                                        Nganjuk</option>
                                    <option value="Ngawi" {{ $partner->company_city == 'Ngawi' ? 'selected' : '' }}>
                                        Ngawi</option>
                                    <option value="Pasuruan"
                                        {{ $partner->company_city == 'Pasuruan' ? 'selected' : '' }}>Pasuruan</option>
                                    <option value="Pekalongan"
                                        {{ $partner->company_city == 'Pekalongan' ? 'selected' : '' }}>Pekalongan
                                    </option>
                                    <option value="Probolinggo"
                                        {{ $partner->company_city == 'Probolinggo' ? 'selected' : '' }}>Probolinggo
                                    </option>
                                    <option value="Semarang"
                                        {{ $partner->company_city == 'Semarang' ? 'selected' : '' }}>Semarang</option>
                                    <option value="Sidoarjo"
                                        {{ $partner->company_city == 'Sidoarjo' ? 'selected' : '' }}>Sidoarjo</option>
                                    <option value="Surabaya"
                                        {{ $partner->company_city == 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                                    <option value="Surakarta"
                                        {{ $partner->company_city == 'Surakarta' ? 'selected' : '' }}>Surakarta</option>
                                    <option value="Tangerang"
                                        {{ $partner->company_city == 'Tangerang' ? 'selected' : '' }}>Tangerang</option>
                                    <option value="Tasikmalaya"
                                        {{ $partner->company_city == 'Tasikmalaya' ? 'selected' : '' }}>Tasikmalaya
                                    </option>
                                    <option value="Tangerang Selatan"
                                        {{ $partner->company_city == 'Tangerang Selatan' ? 'selected' : '' }}>Tangerang
                                        Selatan</option>
                                    <option value="Tuban" {{ $partner->company_city == 'Tuban' ? 'selected' : '' }}>
                                        Tuban</option>
                                    <option value="Yogyakarta"
                                        {{ $partner->company_city == 'Yogyakarta' ? 'selected' : '' }}>Yogyakarta
                                    </option>

                                </select>
                            </div>

                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Status Verifikasi Mitra<span class="text-sm text-red-500">*</span>
                                </label>
                                <select name="is_verified"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                                    <option value="">Pilih status verifikasi</option>
                                    <option value="0" {{ $partner->is_verified == '0' ? 'selected' : '' }}>
                                        Belum Verifikasi</option>
                                    <option value="1" {{ $partner->is_verified == '1' ? 'selected' : '' }}>
                                        Diverifikasi</option>
                                </select>
                            </div>

                            <div class="mb-4.5 flex items-center justify-start gap-3 px-4">
                                <div class="block">
                                    @if($partner->logo)
                                    <div class="w-20 h-20">
                                        <img id="previewLogo{{ $partner->id }}" src="{{ $partner->logo }}" alt="Logo {{ $partner->name }}" class="object-cover w-full h-full rounded">
                                    </div>
                                    @else
                                    <div class="w-20 h-20">
                                        <img id="previewLogo{{ $partner->id }}" src="https://placehold.co/160x160" alt="Default Logo" class="object-cover w-full h-full rounded">
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Logo Perusahaan
                                    </label>
                                    <label class="block">
                                        <span class="sr-only">Pilih logo Perusahaan (Kosongkan jika tidak diganti, max 1mb)</span>
                                        <input id="logoInput{{ $partner->id }}" type="file" accept="image/*" name="logo"
                                            class="block w-full text-sm text-gray-500 file:me-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-900 file:text-white hover:file:bg-blue-700 file:disabled:opacity-50 file:disabled:pointer-events-none dark:text-neutral-500 dark:file:bg-blue-500 dark:hover:file:bg-blue-400">
                                    </label>
                                </div>
                            </div>
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Tampilkan Logo<span class="text-sm text-red-500">*</span>
                                </label>
                                <select name="is_show"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                                    <option value="">Pilih status verifikasi</option>
                                    <option value="0" {{ $partner->is_show == '0' ? 'selected' : '' }}>
                                        Sembunyikan</option>
                                    <option value="1" {{ $partner->is_show == '1' ? 'selected' : '' }}>
                                        Tampilkan</option>
                                </select>
                            </div>

                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end px-4 py-3 gap-x-2">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 text-base font-medium text-gray-700 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                data-hs-overlay="#hs-edit-data-{{ $partner->id }}">
                                Tutup
                            </button>
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-opacity-90 focus:outline-none focus:bg-opacity-100">
                                Perbarui
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('logoInput{{ $partner->id }}').addEventListener('change', function(event) {
        const previewLogo = document.getElementById('previewLogo{{ $partner->id }}');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewLogo.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>