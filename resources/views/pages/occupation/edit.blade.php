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
                        <a class="font-medium" href="{{ route('dashboard') }}">Dasbor /</a>
                    </li>
                    <li>
                        <a class="font-medium" href="{{ route('occupation.index') }}">Lowongan /</a>
                    </li>
                    <li class="font-medium text-blue-500">Ubah</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <form action="{{ route('occupation.update', $occupation->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex flex-col gap-3 mb-4 sm:flex-row sm:items-center sm:justify-between mt-6">
                <span></span>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-1 px-4 py-3 text-sm font-medium text-center text-white rounded-md bg-blue-600 hover:bg-opacity-90">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-[18px] -rotate-45">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                        </svg>
                    </span>
                    Simpan
                </button>
            </div>
            {{-- Button add end --}}

            <div class="flex flex-col gap-9 mt-4">
                <div
                    class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-gray-700 dark:text-white">
                        </h3>
                    </div>
                    <div class="p-6.5">
                        <div class="mb-4.5">
                            <label class="mb-3 block text-base font-medium text-gray-700 dark:text-white">
                                Judul Lowongan <span class="text-red-500 text-sm">*</span>
                            </label>
                            <input type="text" name="title" placeholder="Masukkan judul pekerjaan" required
                                value="{{ $occupation->title }}"
                                class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <div class="mb-4.5">
                            <label class="mb-3 block text-base font-medium text-gray-700 dark:text-white">
                                Nama Perusahaan <span class="text-red-500 text-sm">*</span>
                            </label>
                            <input type="text" name="company" placeholder="Masukkan nama perusahaan" required
                                value="{{ $occupation->company }}"
                                class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <div class="mb-4.5">
                            <label class="mb-3 block text-base font-medium text-gray-700 dark:text-white">
                                Lokasi Pekerjaan <span class="text-red-500 text-sm">*</span>
                            </label>
                            <input type="text" name="location" placeholder="Masukkan lokasi pekerjaan" required
                                value="{{ $occupation->location }}"
                                class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <div class="mb-4.5">
                            <label class="mb-3 block text-base font-medium text-gray-700 dark:text-white">
                                Job Deskripsi <span class="text-red-500 text-sm">*</span>
                            </label>
                            
                            <textarea id="jobdescription" name="description" placeholder="Masukkan deskripsi pekerjaan" required
                                class="w-full rounded border-[1.5px] z-[19999] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                rows="10">
                                {{ $occupation->description }}
                            </textarea>
                        </div>

                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                            <div class="w-full xl:w-1/2">
                                <label class="mb-3 block text-base font-medium text-gray-700 dark:text-white">
                                    Batas Waktu Pendaftaran <span class="text-red-500 text-sm">*</span>
                                </label>
                                <input type="date" name="deadline" placeholder="Masukkan batas waktu" required
                                    value="{{ $occupation->deadline }}"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>
                            <div class="w-full xl:w-1/2">
                                <label class="mb-3 block text-base font-medium text-gray-700 dark:text-white">
                                    Logo Perusahaan <span class="text-red-500 text-sm">*</span>
                                </label>
                                <input type="file" name="thumbnail" accept="image/*"
                                    placeholder="Masukkan logo perusahaan"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                    id="logo" onchange="previewImage()" />
                                <div class="h-40 w-40 overflow-hidden p-4">
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

