@extends('layouts.app')
@section('title', 'Profile Pengguna')

@section('content')

<main>

    {{-- toast success or failed Start --}}
    @include('includes.toast')
    {{-- toast success or failed End --}}

    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="flex flex-col gap-3 mb-2 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-bold text-gray-700 text-title-md2 dark:text-white">
                Halaman Profile
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-700 dark:text-neutral-200" href="{{ route('dashboard') }}">Dasbor /</a>
                    </li>
                    <li class="font-medium text-blue-500">Profile</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <div class="grid grid-cols-5 gap-8 mt-4">
            <div class="col-span-5 xl:col-span-3 ">
                <div
                    class="bg-white rounded shadow-default dark:bg-gray-800">
                    <div class="py-4 border-b border-gray-200 px-7">
                        <h3 class="font-medium text-gray-700 dark:text-white">
                            Informasi Pribadi
                        </h3>
                    </div>
                    <div class="p-7">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="mb-5.5">
                                <div class="w-full">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white"
                                        for="name">Nama Lengkap</label>
                                    <div class="relative">

                                        <input
                                            class="w-full rounded border border-gray-200 bg-gray py-3 pl-11.5 pr-4.5 font-medium text-gray-700 focus:border-primary focus-visible:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            type="text" name="name" id="name" placeholder="Masukkan nama lenkap"
                                            value="{{ old('name', Auth::user()->name) }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white"
                                    for="email">Alamat Email</label>
                                <div class="relative">
                                    <input
                                        class="w-full rounded border border-gray-200 bg-gray py-3 pl-11.5 pr-4.5 font-medium text-gray-700 focus:border-primary focus-visible:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="email" name="email" id="email" placeholder="Masukkan alamat email"
                                        value="{{ old('email', Auth::user()->email) }}" />
                                </div>
                            </div>
                            <div class="mb-5.5">
                                <div class="w-full">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white"
                                        for="phone">Nomor telepon</label>
                                    <input
                                        class="w-full rounded border border-gray-200 bg-gray px-4.5 py-3 font-medium text-gray-700 focus:border-primary focus-visible:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="text" name="phone" id="phone" placeholder="Masukkan nomor telepon"
                                        value="{{ old('phone', Auth::user()->phone) }}" />
                                </div>
                            </div>

                            <div class=" flex justify-end gap-4.5">
                                <button
                                    class="flex justify-center px-6 py-2 font-medium bg-blue-700 rounded text-gray hover:bg-opacity-90"
                                    type="submit">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-span-5 xl:col-span-2">
                <div
                    class="bg-white rounded-sm dark:bg-gray-800 shadow-default dark:bg-boxdark">
                    <div class="border-b border-gray-200 px-6.5 py-4">
                        <h3 class="font-medium text-gray-700 dark:text-white">
                            Ubah Kata Sandi
                        </h3>
                    </div>
                    <form action="{{ route('update.password') }}" method="POST">
                        @csrf
                        <div class="p-6.5">

                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Kata Sandi
                                </label>
                                <input type="password" name="password" placeholder="Masukkan kata sandi"
                                    autocomplete="password"
                                    class="w-full rounded border-[1.5px] border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>

                            <div class="mb-5.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Ketik Ulang Kata Sandi
                                </label>
                                <input type="password" name="password_confirmation"
                                    placeholder="Masukkan kembali kata sandi" autocomplete="re-enter-password"
                                    class="w-full rounded border-[1.5px] border-gray-200 bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>

                            <button type="submit"
                                class="flex justify-center w-full p-3 font-medium bg-blue-700 rounded text-gray hover:bg-opacity-90">
                                Perbarui kata sandi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
