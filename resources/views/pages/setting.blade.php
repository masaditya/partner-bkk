@extends('layouts.app')
@section('title', 'Pengaturan')

@section('content')

<main>

    {{-- toast success or failed Start --}}
    @include('includes.toast')
    {{-- toast success or failed End --}}

    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="flex flex-col gap-3 mb-2 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-bold text-black text-title-md2 dark:text-white">
                Pengaturan
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="/">Dasbor /</a>
                    </li>
                    <li class="font-medium text-meta-3">Pengaturan</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <!-- Card Section -->
        <div class="max-w-6xl px-4 py-5 mx-auto sm:px-6 lg:px-12 lg:py-10">
            <!-- Card -->
            <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-neutral-900">

                @foreach($settings as $setting)
                <form action="{{ route('setting.update', $setting->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Menambahkan metode PUT untuk update -->
                    <div class="p-2">

                        <!-- Email Field -->
                        <div class="mb-4.5">
                            <label class="block mb-3 text-base font-medium text-black dark:text-white">
                                Email
                            </label>
                            <input type="email" name="email" value="{{ old('email', $setting->email) }}"
                                placeholder="Masukkan alamat email"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <!-- Phone Field -->
                        <div class="mb-4.5">
                            <label class="block mb-3 text-base font-medium text-black dark:text-white">
                                No Telp
                            </label>
                            <input name="phone" type="text" value="{{ old('phone', $setting->phone) }}"
                                placeholder="Masukkan nomor telepon" maxlength="15" minlength="10"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>


                        <div class="mb-4.5">
                            <label class="block mb-3 text-base font-medium text-black dark:text-white">
                                Link Facebook
                            </label>
                            <input type="text" name="facebook" value="{{ old('name', $setting->facebook) }}"
                                placeholder="Masukkan link facebook"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <div class="mb-4.5">
                            <label class="block mb-3 text-base font-medium text-black dark:text-white">
                                Link Instagram
                            </label>
                            <input type="text" name="instagram" value="{{ old('name', $setting->instagram) }}"
                                placeholder="Masukkan link instagram"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <div class="mb-4.5">
                            <label class="block mb-3 text-base font-medium text-black dark:text-white">
                                Link Youtube
                            </label>
                            <input type="text" name="youtube" value="{{ old('name', $setting->youtube) }}"
                                placeholder="Masukkan link youtube"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <div class="mb-4.5">
                            <label class="block mb-3 text-base font-medium text-black dark:text-white">
                                Link Tiktok
                            </label>
                            <input type="text" name="tiktok" value="{{ old('name', $setting->tiktok) }}"
                                placeholder="Masukkan link tiktok"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <div class="mb-4.5">
                            <label class="block mb-3 text-base font-medium text-black dark:text-white">
                                Link Website Sekolah
                            </label>
                            <input type="text" name="website" value="{{ old('name', $setting->website) }}"
                                placeholder="Masukkan link website"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <div class="mb-4.5">
                            <label class="block mb-3 text-base font-medium text-black dark:text-white">
                                Alamat Sekolah
                            </label>
                            <textarea name="address" placeholder="Masukkan alamat sekolah" 
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">{{ $setting->address }}
                            </textarea>
                        </div>
                    </div>

                    <button type="submit"
                        class="inline-flex items-center justify-center w-full px-4 py-3 text-base font-medium text-white border border-transparent rounded-lg bg-meta-3 gap-x-2 hover:bg-emerald-500 focus:outline-none focus:bg-emerald-700 disabled:opacity-50 disabled:pointer-events-none">
                        Simpan Perubahan
                    </button>
                </form>
                @endforeach

            </div>
            <!-- End Card -->
        </div>
        <!-- End Card Section -->



    </div>
</main>
@endsection
