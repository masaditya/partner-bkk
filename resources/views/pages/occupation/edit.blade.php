@extends('layouts.app')
@section('title', 'Lowongan-Pekerjaan')

@section('content')

<main>
    <x-head.tinymce-config/>
    {{-- toast success or failed Start --}}
    @include('includes.toast')
    {{-- toast success or failed End --}}

    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="flex flex-col gap-3 mb-2 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-bold text-gray-700 text-title-md2 dark:text-white">
                Ubah Lowongan
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-700 dark:text-neutral-200" href="{{ route('dashboard') }}">Dasbor /</a>
                    </li>
                    <li>
                        <a class="font-medium text-gray-700 dark:text-neutral-200" href="{{ route('occupation.index') }}">Lowongan /</a>
                    </li>
                    <li class="font-medium text-blue-500">Ubah</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <form action="{{ route('occupation.update', $occupation->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex flex-col gap-3 mt-6 mb-4 sm:flex-row sm:items-center sm:justify-between">
                <span></span>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-1 px-4 py-3 text-sm font-medium text-center text-white bg-blue-600 rounded-md hover:bg-opacity-90">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-[18px] -rotate-45">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                        </svg>
                    </span>
                    Ubah Data
                </button>
            </div>
            {{-- Button add end --}}

            <div class="flex flex-col mt-4 gap-9">
                <div
                    class="bg-white border rounded-sm border-stroke shadow-default dark:border-gray-600 dark:bg-gray-800">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-600">
                        <h3 class="font-medium text-gray-700 dark:text-white">
                        </h3>
                    </div>
                    <div class="p-6.5">
                        <div class="mb-4.5">
                            <label class="block mb-3 text-base font-medium text-gray-700 dark:text-white">
                                Posisi Lowongan <span class="text-sm text-red-500">*</span>
                            </label>
                            <input type="text" name="title" placeholder="Masukkan judul pekerjaan" required
                                value="{{ $occupation->title }}"
                                class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>

                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-base font-medium text-gray-700 dark:text-white">
                                    Nama Perusahaan <span class="text-sm text-red-500">*</span>
                                </label>
                                <input type="text" name="company" placeholder="Masukkan nama perusahaan" required
                                    value="{{ $occupation->company }}"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>

                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-base font-medium text-gray-700 dark:text-white">
                                    Lokasi Pekerjaan <span class="text-sm text-red-500">*</span>
                                </label>
                                <select name="location" required
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Pilih Lokasi Pekerjaan</option>
                                    <option value="Bandung" {{ $occupation->location === 'Bandung' ? 'selected' : '' }}>Bandung</option>
                                    <option value="Batam" {{ $occupation->location === 'Batam' ? 'selected' : '' }}>Batam</option>
                                    <option value="Batu" {{ $occupation->location === 'Batu' ? 'selected' : '' }}>Batu</option>
                                    <option value="Bekasi" {{ $occupation->location === 'Bekasi' ? 'selected' : '' }}>Bekasi</option>
                                    <option value="Blitar" {{ $occupation->location === 'Blitar' ? 'selected' : '' }}>Blitar</option>
                                    <option value="Bogor" {{ $occupation->location === 'Bogor' ? 'selected' : '' }}>Bogor</option>
                                    <option value="Bojonegoro" {{ $occupation->location === 'Bojonegoro' ? 'selected' : '' }}>Bojonegoro</option>
                                    <option value="Cimahi" {{ $occupation->location === 'Cimahi' ? 'selected' : '' }}>Cimahi</option>
                                    <option value="Cirebon" {{ $occupation->location === 'Cirebon' ? 'selected' : '' }}>Cirebon</option>
                                    <option value="Denpasar" {{ $occupation->location === 'Denpasar' ? 'selected' : '' }}>Denpasar</option>
                                    <option value="Depok" {{ $occupation->location === 'Depok' ? 'selected' : '' }}>Depok</option>
                                    <option value="Gresik" {{ $occupation->location === 'Gresik' ? 'selected' : '' }}>Gresik</option>
                                    <option value="Jakarta" {{ $occupation->location === 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                                    <option value="Jombang" {{ $occupation->location === 'Jombang' ? 'selected' : '' }}>Jombang</option>
                                    <option value="Kediri" {{ $occupation->location === 'Kediri' ? 'selected' : '' }}>Kediri</option>
                                    <option value="Lamongan" {{ $occupation->location === 'Lamongan' ? 'selected' : '' }}>Lamongan</option>
                                    <option value="Lumajang" {{ $occupation->location === 'Lumajang' ? 'selected' : '' }}>Lumajang</option>
                                    <option value="Madiun" {{ $occupation->location === 'Madiun' ? 'selected' : '' }}>Madiun</option>
                                    <option value="Magelang" {{ $occupation->location === 'Magelang' ? 'selected' : '' }}>Magelang</option>
                                    <option value="Magetan" {{ $occupation->location === 'Magetan' ? 'selected' : '' }}>Magetan</option>
                                    <option value="Malang" {{ $occupation->location === 'Malang' ? 'selected' : '' }}>Malang</option>
                                    <option value="Mojokerto" {{ $occupation->location === 'Mojokerto' ? 'selected' : '' }}>Mojokerto</option>
                                    <option value="Nganjuk" {{ $occupation->location === 'Nganjuk' ? 'selected' : '' }}>Nganjuk</option>
                                    <option value="Ngawi" {{ $occupation->location === 'Ngawi' ? 'selected' : '' }}>Ngawi</option>
                                    <option value="Pasuruan" {{ $occupation->location === 'Pasuruan' ? 'selected' : '' }}>Pasuruan</option>
                                    <option value="Pekalongan" {{ $occupation->location === 'Pekalongan' ? 'selected' : '' }}>Pekalongan</option>
                                    <option value="Probolinggo" {{ $occupation->location === 'Probolinggo' ? 'selected' : '' }}>Probolinggo</option>
                                    <option value="Semarang" {{ $occupation->location === 'Semarang' ? 'selected' : '' }}>Semarang</option>
                                    <option value="Sidoarjo" {{ $occupation->location === 'Sidoarjo' ? 'selected' : '' }}>Sidoarjo</option>
                                    <option value="Surabaya" {{ $occupation->location === 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                                    <option value="Surakarta" {{ $occupation->location === 'Surakarta' ? 'selected' : '' }}>Surakarta</option>
                                    <option value="Tangerang" {{ $occupation->location === 'Tangerang' ? 'selected' : '' }}>Tangerang</option>
                                    <option value="Tasikmalaya" {{ $occupation->location === 'Tasikmalaya' ? 'selected' : '' }}>Tasikmalaya</option>
                                    <option value="Tangerang Selatan" {{ $occupation->location === 'Tangerang Selatan' ? 'selected' : '' }}>Tangerang Selatan</option>
                                    <option value="Tuban" {{ $occupation->location === 'Tuban' ? 'selected' : '' }}>Tuban</option>
                                    <option value="Yogyakarta" {{ $occupation->location === 'Yogyakarta' ? 'selected' : '' }}>Yogyakarta</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-base font-medium text-gray-700 dark:text-white">
                                    Jenis Pekerjaan <span class="text-sm text-red-500">*</span>
                                </label>
                                <select name="job_type" required
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Pilih Jenis Pekerjaan</option>
                                    <option value="Purna Waktu" {{ $occupation->job_type === 'Purna Waktu' ? 'selected' : '' }}>Purna Waktu</option>
                                    <option value="Paruh Waktu" {{ $occupation->job_type === 'Paruh Waktu' ? 'selected' : '' }}>Paruh Waktu</option>
                                    <option value="Kontrak" {{ $occupation->job_type === 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                                    <option value="Magang" {{ $occupation->job_type === 'Magang' ? 'selected' : '' }}>Magang</option>
                                </select>
                            </div>

                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-base font-medium text-gray-700 dark:text-white">
                                    Industri Perusahaan <span class="text-sm text-red-500">*</span>
                                </label>
                                <select name="company_industry_id" required
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Pilih Industri Perusahaan</option>
                                    @foreach ($industries as $industry)
                                        <option value="{{ $industry->id }}" {{ $occupation->company_industry_id === $industry->id ? 'selected' : '' }}>
                                            {{ $industry->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                
                        <div class="mb-4.5">
                            <label class="block mb-3 text-base font-medium text-gray-700 dark:text-white">
                                Job Deskripsi <span class="text-sm text-red-500">*</span>
                            </label>
                            
                            <textarea id="jobdescription" name="description" placeholder="Masukkan deskripsi pekerjaan" required
                                class="w-full rounded border-[1.5px] z-[19999] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                rows="10">
                                {{ $occupation->description }}
                            </textarea>
                        </div>

                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-base font-medium text-gray-700 dark:text-white">
                                    Batas Waktu Pendaftaran <span class="text-sm text-red-500">*</span>
                                </label>
                                <input type="date" name="deadline" placeholder="Masukkan batas waktu" required
                                    value="{{ $occupation->deadline }}"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-base font-medium text-gray-700 dark:text-white">
                                    Logo Perusahaan <span class="text-sm text-red-500">*</span>
                                </label>
                                <input type="file" name="thumbnail" accept="image/*"
                                    placeholder="Masukkan logo perusahaan"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="logo" onchange="previewImage()" />
                                <div class="w-40 h-40 p-4 overflow-hidden">
                                    <img id="previewImage" src="{{ $occupation->thumbnail ? $occupation->thumbnail : $occupation->admin->logo }}" alt="Preview Logo"
                                        class="object-cover rounded" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<script>
    const logo = document.getElementById('logo');
    const previewImage = document.getElementById('previewImage');

    logo.addEventListener("change", function () {
        const file = logo.files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function () {
            previewImage.src = reader.result;
        });

        reader.readAsDataURL(file);
    });

</script>

@endsection

