@extends('layouts.app')
@section('title', 'Applicant')

@section('content')

<main>

    {{-- toast success or failed Start --}}
    @include('includes.toast')
    {{-- toast success or failed End --}}

    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="flex flex-col gap-3 mb-6 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-bold text-gray-700 text-title-md2 dark:text-white">
                Applicant Lowongan Pekerjaan
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-700 dark:text-stone-200" href="{{ route('dashboard') }}">Dasbor /</a>
                    </li>
                    <li class="font-medium text-blue-500">Applicant</li>
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
                                <th class="px-4 py-4 font-medium xl:pl-11">
                                    No.
                                </th>
                                <th class="px-4 py-4 font-medium xl:pl-11">
                                    Lowongan
                                </th>
                                <th class="px-4 py-4 font-medium ">
                                    Perusahaan
                                </th>
                                <th class="px-4 py-4 font-medium ">
                                    Batas Waktu
                                </th>
                                <th class="px-4 py-4 font-medium ">
                                    Lokasi
                                </th>
                                <th class="px-4 py-4 font-medium ">
                                    Publisher
                                </th>
                                <th class="px-4 py-4 font-medium ">
                                    Jumlah Pelamar
                                </th>
                                <th class="px-4 py-4 font-medium ">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($occupations as $occupation)
                            <tr class="text-sm">
                                <td class="border-b border-[#eee] dark:border-strokedark">
                                    <h5 class="font-medium text-gray-700 dark:text-white">{{ $loop->iteration }}</h5>
                                </td>
                                <td class="border-b border-[#eee] dark:border-strokedark">
                                    <p class="text-gray-700 dark:text-white">{{ $occupation->title }}</p>
                                </td>
                                <td class="border-b border-[#eee] dark:border-strokedark">
                                    <p class="text-gray-700 dark:text-white">{{ $occupation->company }}</p>
                                </td>
                                 <td class="border-b border-[#eee] dark:border-strokedark">
                                    <p class="text-gray-700 dark:text-white">
                                        @if(\Carbon\Carbon::parse($occupation->deadline) < \Carbon\Carbon::now())
                                            <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-500 text-center">
                                            {{ \Carbon\Carbon::parse($occupation->deadline)->locale('id_ID')->translatedFormat('d M Y') }}</span>
                                        @else
                                            {{ \Carbon\Carbon::parse($occupation->deadline)->locale('id_ID')->translatedFormat('d M Y') }}
                                        @endif
                                    </p>
                                </td>
                                 <td class="border-b border-[#eee] dark:border-strokedark">
                                    <p class="text-gray-700 dark:text-white">
                                        {{ $occupation->location }}
                                    </p>
                                </td>
                                 <td class="border-b border-[#eee] dark:border-strokedark">
                                    <p class="text-gray-700 dark:text-white">
                                        @if($occupation->admin->is_partner == 0)
                                            Admin
                                        @else
                                            {{ $occupation->admin->company_name }}
                                        @endif
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] dark:border-strokedark text-center">
                                   <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-700 text-white">
                                    {{ $occupation->applicants_count }}
                                </td>
                                <td class="border-b border-[#eee] dark:border-strokedark">
                                    <div class="flex items-center space-x-3.5">
                                        <a href="{{ route('applicant.show', $occupation->id) }}" class="inline-flex items-center px-3 py-2.5 text-xs font-semibold text-blue-800 bg-blue-100 border border-transparent rounded-lg gap-x-2 hover:bg-blue-200 focus:outline-none focus:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-400 dark:bg-blue-800/30 dark:hover:bg-blue-800/20 dark:focus:bg-blue-800/20">
                                            List Pelamar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @include('components.modal.occupation.delete')
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

