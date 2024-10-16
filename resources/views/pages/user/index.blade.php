@extends('layouts.app')
@section('title', 'User')

@section('content')

<main>

    {{-- toast success or failed Start --}}
    @include('includes.toast')
    {{-- toast success or failed End --}}

    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="flex flex-col gap-3 mb-6 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-bold text-gray-700 text-title-md2 dark:text-white">
                Daftar User
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-700 dark:text-neutral-200" href="{{ route('dashboard') }}">Dasbor /</a>
                    </li>
                    <li class="font-medium text-blue-500">User</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        {{-- Button add start --}}
        <div class="flex flex-col gap-3 mb-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex justify-end text-sm">
                <a href="{{ route('user.export.excel') }}" class="flex items-center gap-2 px-4 py-2 text-white bg-green-300 rounded hover:bg-green-400">
                    <span class="text-[#14532D] font-medium">Export</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#14532D" viewBox="0 0 256 256"><path d="M200,24H72A16,16,0,0,0,56,40V64H40A16,16,0,0,0,24,80v96a16,16,0,0,0,16,16H56v24a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V40A16,16,0,0,0,200,24ZM72,160a8,8,0,0,1-6.15-13.12L81.59,128,65.85,109.12a8,8,0,0,1,12.3-10.24L92,115.5l13.85-16.62a8,8,0,1,1,12.3,10.24L102.41,128l15.74,18.88a8,8,0,0,1-12.3,10.24L92,140.5,78.15,157.12A8,8,0,0,1,72,160Zm56,56H72V192h56Zm0-152H72V40h56Zm72,152H144V192a16,16,0,0,0,16-16v-8h40Zm0-64H160V104h40Zm0-64H160V80a16,16,0,0,0-16-16V40h56Z"></path></svg>
                </a>
                <a href="{{ route('user.export.pdf') }}" class="flex items-center gap-2 px-4 py-2 ml-2 text-white bg-red-300 rounded hover:bg-red-400">
                    <span class="text-[#7F1D1D] font-medium">Export</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#7F1D1D" viewBox="0 0 256 256"><path d="M44,120H212a4,4,0,0,0,4-4V88a8,8,0,0,0-2.34-5.66l-56-56A8,8,0,0,0,152,24H56A16,16,0,0,0,40,40v76A4,4,0,0,0,44,120ZM152,44l44,44H152Zm72,108.53a8.18,8.18,0,0,1-8.25,7.47H192v16h15.73a8.17,8.17,0,0,1,8.25,7.47,8,8,0,0,1-8,8.53H192v15.73a8.17,8.17,0,0,1-7.47,8.25,8,8,0,0,1-8.53-8V152a8,8,0,0,1,8-8h32A8,8,0,0,1,224,152.53ZM64,144H48a8,8,0,0,0-8,8v55.73A8.17,8.17,0,0,0,47.47,216,8,8,0,0,0,56,208v-8h7.4c15.24,0,28.14-11.92,28.59-27.15A28,28,0,0,0,64,144Zm-.35,40H56V160h8a12,12,0,0,1,12,13.16A12.25,12.25,0,0,1,63.65,184ZM128,144H112a8,8,0,0,0-8,8v56a8,8,0,0,0,8,8h15.32c19.66,0,36.21-15.48,36.67-35.13A36,36,0,0,0,128,144Zm-.49,56H120V160h8a20,20,0,0,1,20,20.77C147.58,191.59,138.34,200,127.51,200Z"></path></svg>
                </a>
            </div>
            <button type="button"
                class="inline-flex items-center justify-center gap-1 px-4 py-3 text-sm font-medium text-center text-white bg-blue-600 rounded-md hover:bg-opacity-90"
                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-data-user-modal"
                data-hs-overlay="#hs-add-data-user-modal">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" width="18" height="18">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                    </svg>
                </span>
                Tambah User
            </button>

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
                                <th class="min-w-[220px] px-4 py-4 font-medium  xl:pl-11">
                                    Nama
                                </th>
                                <th class="min-w-[150px] px-4 py-4 font-medium ">
                                    Email
                                </th>
                                
                                <th class="min-w-[150px] px-4 py-4 font-medium text-gray-700 dark:text-white">
                                    Status
                                </th>
                                <th class="px-4 py-4 font-medium text-gray-700 dark:text-white">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                    <h5 class="font-medium text-gray-700 dark:text-white">{{ $loop->iteration }}</h5>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-gray-700 dark:text-white">{{ $user->name }}</p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-gray-700 dark:text-white">{{ $user->email }}</p>
                                </td>
                               
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <span
                                        class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium {{ $user->is_alumni ? 'bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-800/30 dark:text-yellow-500' }}">
                                        {{ $user->is_alumni ? 'Alumni' : 'Umum' }}
                                    </span>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <div class="flex items-center space-x-3.5">
                                        <button class="hover:text-primary dark:text-gray-100"
                                            aria-haspopup="dialog"
                                            aria-expanded="false" aria-controls="hs-update-password-data-{{ $user->id }}"
                                            data-hs-overlay="#hs-update-password-data-{{ $user->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" width="18" height="18">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                            </svg>
                                        </button>
                                        <button type="button" class="hover:text-primary dark:text-gray-100" aria-haspopup="dialog"
                                            aria-expanded="false" aria-controls="hs-delete-data-{{ $user->id }}"
                                            data-hs-overlay="#hs-delete-data-{{ $user->id }}">
                                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z"
                                                    fill="" />
                                                <path
                                                    d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z"
                                                    fill="" />
                                                <path
                                                    d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z"
                                                    fill="" />
                                                <path
                                                    d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z"
                                                    fill="" />
                                            </svg>
                                        </button>
                                        <a href="{{ route('user.edit', $user->id) }}" class="hover:text-primary dark:text-gray-100"
                                        aria-haspopup="dialog"
                                            aria-expanded="false" aria-controls="hs-edit-data-{{ $user->id }}"
                                            data-hs-overlay="#hs-edit-data-{{ $user->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" width="18" height="18">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @include('components.modal.user.delete')
                            @include('components.modal.user.update-password')
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
@include('components.modal.user.add')
@endsection

