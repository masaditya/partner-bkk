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
                Halaman Profile
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="{{ route('dashboard') }}">Dasbor /</a>
                    </li>
                    <li class="font-medium text-meta-3">Profile</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <div class="grid grid-cols-5 gap-8 mt-4">
            <div class="col-span-5 xl:col-span-3">
                <div
                    class="bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="py-4 border-b border-stroke px-7 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            Informasi Pribadi
                        </h3>
                    </div>
                    <div class="p-7">
                        <form action="{{ route('profile.update') }}"  method="POST">
                            @csrf
                            <div class="mb-5.5">
                                <div class="w-full">
                                    <label class="block mb-3 text-sm font-medium text-black dark:text-white"
                                        for="name">Nama Lengkap</label>
                                    <div class="relative">
                                        <span class="absolute left-4.5 top-4">
                                            <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.8">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3.72039 12.887C4.50179 12.1056 5.5616 11.6666 6.66667 11.6666H13.3333C14.4384 11.6666 15.4982 12.1056 16.2796 12.887C17.061 13.6684 17.5 14.7282 17.5 15.8333V17.5C17.5 17.9602 17.1269 18.3333 16.6667 18.3333C16.2064 18.3333 15.8333 17.9602 15.8333 17.5V15.8333C15.8333 15.1703 15.5699 14.5344 15.1011 14.0655C14.6323 13.5967 13.9964 13.3333 13.3333 13.3333H6.66667C6.00363 13.3333 5.36774 13.5967 4.8989 14.0655C4.43006 14.5344 4.16667 15.1703 4.16667 15.8333V17.5C4.16667 17.9602 3.79357 18.3333 3.33333 18.3333C2.8731 18.3333 2.5 17.9602 2.5 17.5V15.8333C2.5 14.7282 2.93899 13.6684 3.72039 12.887Z"
                                                        fill="" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9.99967 3.33329C8.61896 3.33329 7.49967 4.45258 7.49967 5.83329C7.49967 7.214 8.61896 8.33329 9.99967 8.33329C11.3804 8.33329 12.4997 7.214 12.4997 5.83329C12.4997 4.45258 11.3804 3.33329 9.99967 3.33329ZM5.83301 5.83329C5.83301 3.53211 7.69849 1.66663 9.99967 1.66663C12.3009 1.66663 14.1663 3.53211 14.1663 5.83329C14.1663 8.13448 12.3009 9.99996 9.99967 9.99996C7.69849 9.99996 5.83301 8.13448 5.83301 5.83329Z"
                                                        fill="" />
                                                </g>
                                            </svg>
                                        </span>
                                        <input
                                            class="w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                            type="text" name="name" id="name" placeholder="Masukkan nama lenkap"
                                            value="{{ old('name', Auth::user()->name) }}" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white"
                                    for="email">Alamat Email</label>
                                <div class="relative">
                                    <span class="absolute left-4.5 top-4">
                                        <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.8">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.33301 4.16667C2.87658 4.16667 2.49967 4.54357 2.49967 5V15C2.49967 15.4564 2.87658 15.8333 3.33301 15.8333H16.6663C17.1228 15.8333 17.4997 15.4564 17.4997 15V5C17.4997 4.54357 17.1228 4.16667 16.6663 4.16667H3.33301ZM0.833008 5C0.833008 3.6231 1.9561 2.5 3.33301 2.5H16.6663C18.0432 2.5 19.1663 3.6231 19.1663 5V15C19.1663 16.3769 18.0432 17.5 16.6663 17.5H3.33301C1.9561 17.5 0.833008 16.3769 0.833008 15V5Z"
                                                    fill="" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M0.983719 4.52215C1.24765 4.1451 1.76726 4.05341 2.1443 4.31734L9.99975 9.81615L17.8552 4.31734C18.2322 4.05341 18.7518 4.1451 19.0158 4.52215C19.2797 4.89919 19.188 5.4188 18.811 5.68272L10.4776 11.5161C10.1907 11.7169 9.80879 11.7169 9.52186 11.5161L1.18853 5.68272C0.811486 5.4188 0.719791 4.89919 0.983719 4.52215Z"
                                                    fill="" />
                                            </g>
                                        </svg>
                                    </span>
                                    <input
                                        class="w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                        type="email" name="email" id="email" placeholder="Masukkan alamat email"
                                        value="{{ old('email', Auth::user()->email) }}" />
                                </div>
                            </div>
                            <div class="mb-5.5">
                                <div class="w-full">
                                    <label class="block mb-3 text-sm font-medium text-black dark:text-white"
                                        for="phone">Nomor telepon</label>
                                    <input
                                        class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary"
                                        type="text" name="phone" id="phone" placeholder="Masukkan nomor telepon"
                                        value="{{ old('phone', Auth::user()->phone) }}" />
                                </div>
                            </div>

                            <div class=" flex justify-end gap-4.5">
                                    <button
                                        class="flex justify-center px-6 py-2 font-medium rounded bg-meta-3 text-gray hover:bg-opacity-90"
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
                    class="bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            Ubah Kata Sandi
                        </h3>
                    </div>
                    <form action="{{ route('update.password') }}" method="POST">
                        @csrf
                        <div class="p-6.5">
                        
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Kata Sandi
                                </label>
                                <input type="password" name="password" placeholder="Masukkan kata sandi" autocomplete="password"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <div class="mb-5.5">
                                <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Ketik Ulang Kata Sandi
                                </label>
                                <input type="password" name="password_confirmation" placeholder="Masukkan kembali kata sandi" autocomplete="re-enter-password"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            </div>

                            <button type="submit"
                                class="flex justify-center w-full p-3 font-medium rounded bg-meta-3 text-gray hover:bg-opacity-90">
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
