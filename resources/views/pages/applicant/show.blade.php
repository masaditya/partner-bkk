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
            <div>
                <h2 class="font-bold text-gray-700 text-title-md2 dark:text-white">
                    List Pelamar Lowongan Pekerjaan
                </h2>
                <p class="text-gray-600 dark:text-gray-400">
                    Posisi: {{ $apply->title }} | Perusahaan: {{ $apply->company }}
                </p>
            </div>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-700 dark:text-stone-200" href="{{ route('dashboard') }}">Dasbor /</a>
                    </li>
                    <li>
                        <a class="font-medium text-gray-700 dark:text-stone-200" href="{{ route('applicant.index') }}">Applicant /</a>
                    </li>
                    <li class="font-medium text-blue-500">List Pelamar</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        {{-- Button add start --}}
        <div class="flex flex-col gap-3 mb-4 sm:flex-row sm:items-center sm:justify-between">
            <span></span>
            <div class="flex justify-end text-sm">
                <a href="{{ route('applicant.export.excel', $apply->id) }}" class="flex items-center gap-2 px-4 py-2 text-white bg-green-300 rounded hover:bg-green-400">
                    <span class="text-[#14532D] font-medium">Export</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#14532D" viewBox="0 0 256 256">
                        <path d="M200,24H72A16,16,0,0,0,56,40V64H40A16,16,0,0,0,24,80v96a16,16,0,0,0,16,16H56v24a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V40A16,16,0,0,0,200,24ZM72,160a8,8,0,0,1-6.15-13.12L81.59,128,65.85,109.12a8,8,0,0,1,12.3-10.24L92,115.5l13.85-16.62a8,8,0,1,1,12.3,10.24L102.41,128l15.74,18.88a8,8,0,0,1-12.3,10.24L92,140.5,78.15,157.12A8,8,0,0,1,72,160Zm56,56H72V192h56Zm0-152H72V40h56Zm72,152H144V192a16,16,0,0,0,16-16v-8h40Zm0-64H160V104h40Zm0-64H160V80a16,16,0,0,0-16-16V40h56Z"></path>
                    </svg>
                </a>

                <a href="{{ route('applicant.export.pdf', $apply->id) }}" class="flex items-center gap-2 px-4 py-2 ml-2 text-white bg-red-300 rounded hover:bg-red-400">
                    <span class="text-[#7F1D1D] font-medium">Export</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#7F1D1D" viewBox="0 0 256 256">
                        <path d="M44,120H212a4,4,0,0,0,4-4V88a8,8,0,0,0-2.34-5.66l-56-56A8,8,0,0,0,152,24H56A16,16,0,0,0,40,40v76A4,4,0,0,0,44,120ZM152,44l44,44H152Zm72,108.53a8.18,8.18,0,0,1-8.25,7.47H192v16h15.73a8.17,8.17,0,0,1,8.25,7.47,8,8,0,0,1-8,8.53H192v15.73a8.17,8.17,0,0,1-7.47,8.25,8,8,0,0,1-8.53-8V152a8,8,0,0,1,8-8h32A8,8,0,0,1,224,152.53ZM64,144H48a8,8,0,0,0-8,8v55.73A8.17,8.17,0,0,0,47.47,216,8,8,0,0,0,56,208v-8h7.4c15.24,0,28.14-11.92,28.59-27.15A28,28,0,0,0,64,144Zm-.35,40H56V160h8a12,12,0,0,1,12,13.16A12.25,12.25,0,0,1,63.65,184ZM128,144H112a8,8,0,0,0-8,8v56a8,8,0,0,0,8,8h15.32c19.66,0,36.21-15.48,36.67-35.13A36,36,0,0,0,128,144Zm-.49,56H120V160h8a20,20,0,0,1,20,20.77C147.58,191.59,138.34,200,127.51,200Z"></path>
                    </svg>
                </a>

            </div>
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
                                        <a href="{{ route('applicant.detail', ['idJob' => $applicant->id_occupation, 'idUser' => $applicant->id_user]) }}" class="inline-flex items-center px-3 py-2.5 text-xs font-semibold text-blue-800 bg-blue-100 border border-transparent rounded-lg gap-x-2 hover:bg-blue-200 focus:outline-none focus:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-400 dark:bg-blue-800/30 dark:hover:bg-blue-800/20 dark:focus:bg-blue-800/20">
                                            Detail User
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

