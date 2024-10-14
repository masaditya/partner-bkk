@extends('layouts.app')
@section('title', 'Pelamar')

@section('content')

<main>

    {{-- toast success or failed Start --}}
    @include('includes.toast')
    {{-- toast success or failed End --}}

    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="flex flex-col gap-3 mb-6 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-bold text-gray-700 text-title-md2 dark:text-white">
                Daftar Pelamar
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-stone-200" href="{{ route('dashboard') }}">Dasbor /</a>
                    </li>
                    <li class="font-medium text-blue-500">Pelamar</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        {{-- Button add start --}}
        <div class="flex flex-col gap-3 mb-4 sm:flex-row sm:items-center sm:justify-between">
            <span></span>
            

        </div>
        {{-- Button add end --}}

        <div class="w-full px-2 mb-4">
            <!-- Gunakan margin dan lebar penuh langsung di sini -->
            <input type="text" id="customSearchInput" placeholder="Cari data..."
                class="w-full py-2.5 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <!-- ====== Table Section Start -->
        <div class="flex flex-col gap-10">
            <!-- ====== Table Three Start -->
            <div
                class="border border-stroke p-6 rounded-lg bg-white pb-2.5 shadow-default dark:border-gray-800 dark:bg-gray-800 xl:pb-1">
                <div class="max-w-full overflow-x-auto">
                    <table id="dataTableBkk" class="w-full table-auto">
                        <thead>
                            <tr class="text-left bg-gray-2 dark:bg-gray-700 dark:text-gray-100">
                                <th class="px-4 py-4 font-medium  xl:pl-11">
                                    No.
                                </th>
                                <th class="px-4 py-4 font-medium  xl:pl-11">
                                    Nama User
                                </th>
                                <th class="px-4 py-4 font-medium ">
                                    Status Alumni
                                </th>
                                <th class="px-4 py-4 font-medium ">
                                    Nama Pekerjaan
                                </th>
                                <th class="px-4 py-4 font-medium ">
                                    Tanggal Lamar
                                </th>
                                <th class="px-4 py-4 font-medium ">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applicants as $applicant)
                            <tr class="text-sm">
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                    <h5 class="font-medium text-gray-700 dark:text-white">{{ $loop->iteration }}</h5>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-gray-700 dark:text-white">{{ $applicant->user->name }}</p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <span
                                        class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium {{ $applicant->user->is_alumni ? 'bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-800/30 dark:text-yellow-500' }}">
                                        {{ $applicant->user->is_alumni ? 'Alumni' : 'Umum' }}
                                    </span>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-gray-700 dark:text-white">{{ $applicant->occupation->title }}</p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-gray-700 dark:text-white">
                                        {{ \Carbon\Carbon::parse($applicant->created_at)->locale('id_ID')->translatedFormat('d M Y') }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <div class="flex items-center space-x-3.5">
                                        
                                        <a href="{{ route('applicant.detail', $applicant->id) }}" class="hover:text-primary text-gray-100"
                                        aria-haspopup="dialog"
                                            aria-expanded="false" aria-controls="hs-edit-data-{{ $applicant->id }}"
                                            data-hs-overlay="#hs-edit-data-{{ $applicant->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-[18px]">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ====== Table Three End -->
        </div>
        <!-- ====== Table Section End -->
    </div>
</main>
@include('components.datatables')
@endsection

