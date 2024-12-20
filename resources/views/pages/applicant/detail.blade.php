@extends('layouts.app')
@section('title', 'Applicant')

@section('content')

<main>
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">

        
        <!-- Breadcrumb Start -->
        <div class="flex flex-col gap-3 mb-2 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-bold text-gray-700 text-title-md2 dark:text-white">
                Detail Data Pelamar
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-700 dark:text-stone-200" href="{{ route('dashboard') }}">Dasbor /</a>
                    </li>
                    <li>
                        <a class="font-medium text-gray-700 dark:text-stone-200" href="{{ route('applicant.index') }}">Applicant /</a>
                    </li>
                    <li>
                        <a class="font-medium text-gray-700 dark:text-stone-200" href="{{ route('applicant.show', $applicant->id_occupation) }}">List Pelamar /</a>
                    </li>
                    <li class="font-medium text-blue-500">Detail Pelamar</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

            <div class="flex flex-col mt-4 gap-9">
                <div
                    class="bg-white border rounded-sm border-stroke shadow-default dark:border-gray-600 dark:bg-gray-800">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-600">
                        <h3 class="font-medium text-gray-700 dark:text-white">
                            Detail Loker
                        </h3>
                    </div>
                        <div class="p-6.5">
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Perusahaan
                                    </label>
                                    <input type="text" value="{{ $occupation->company }}" disabled
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                                </div>
                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Posisi
                                    </label>
                                    <input type="text" value="{{ $occupation->title }}" disabled
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                                </div>
                            </div>
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Jenis Pekerjaan
                                    </label>
                                    <input type="text" value="{{ $occupation->job_type }}" disabled
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                                </div>
                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Lokasi
                                    </label>
                                    <input type="text" value="{{ $occupation->location }}" disabled
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="flex flex-col mt-4 gap-9">
                <div
                    class="bg-white border rounded-sm border-stroke shadow-default dark:border-gray-600 dark:bg-gray-800">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-600">
                        <h3 class="font-medium text-gray-700 dark:text-white">
                            Informasi Pribadi
                        </h3>
                    </div>
                        <div class="p-6.5">
                            <div>
                                <div class="flex items-center justify-center gap-4 mb-10">
                                    <div class="block">
                                    @if($applicant->user->photo)
                                    <div class="w-40 h-40">
                                        <img src="{{ $applicant->user->photo }}" alt="Logo {{ $applicant->user->photo }}" class="object-cover w-full h-full rounded">
                                    </div>
                                    @else
                                    <div
                                        class="flex items-center justify-center w-40 h-40 bg-gray-200 rounded dark:bg-gray-700">
                                        <span class="font-medium text-gray-700 dark:text-gray-300">
                                            {{ Str::upper(Str::substr($applicant->user->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                      
                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Nama Lengkap
                                    </label>
                                    <input type="name" name="name" value="{{ old('name', $applicant->user->name) }}" disabled
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        NIS (Hanya untuk alumni)
                                    </label>
                                    <input type="text" name="NIS" value="{{ old('NIS', $applicant->user->NIS) }}" disabled
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                                </div>
                            </div>
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                      
                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Alamat Email
                                    </label>
                                    <input type="email" name="email" required value="{{ old('email', $applicant->user->email) }}" disabled
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Nomer HP (WA Aktif)
                                    </label>
                                    <input type="text" name="phone" value="{{ old('phone', $applicant->user->phone) }}" required disabled
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Jenis Kelamin
                                    </label>
                                    <input type="text" value="{{  $applicant->user->gender == 'male' ? 'Laki - Laki' : 'Perempuan' }}" required disabled
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                                </div>

                            </div>
                            <div class="mb-6">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Alama
                                </label>
                                <textarea name="address" rows="3" disabled
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700">{{ old('mail', $applicant->user->address) }}</textarea>
                            </div>
                        </div>
                </div>
            </div>

            <div class="flex flex-col mt-4 gap-9">
                <div class="bg-white border rounded-sm border-stroke shadow-default dark:border-gray-600 dark:bg-gray-800">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-600">
                        <h3 class="font-medium text-gray-700 dark:text-white">
                            Pendidikan
                        </h3>
                    </div>

                    <div class="p-6.5">
                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">

                            

                             <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Status User
                                </label>
                                <input type="text" name="graduation_year" disabled
                                    value="{{ $applicant->user->is_alumni ? 'Alumni' : 'Umum' }}" required
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                            </div>

                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Tahun Kelulusan
                                </label>
                                <input type="number" name="graduation_year" disabled
                                    value="{{ $applicant->user->graduation_year }}" required
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                            </div>

                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Jurusan
                                </label>
                                <input type="text" disabled
                                    value="{{ $applicant->user->major->name }}" required
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                            </div>
                        </div>

                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">

                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Pendidikan Terakhir
                                </label>
                                <input type="text" disabled
                                    value="{{ $applicant->user->latest_degree }}"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                            </div>

                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Universitas
                                </label>
                                <input type="text" name="university " disabled
                                    value="{{ old('university ', $applicant->user->university ) }}"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                            </div>

                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Fakultas
                                </label>
                                <input type="text" name="faculty" disabled
                                    value="{{ old('faculty', $applicant->user->faculty) }}"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <div class="flex flex-col mt-4 gap-9">
                <div class="bg-white border rounded-sm border-stroke shadow-default dark:border-gray-600 dark:bg-gray-800">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-600">
                        <h3 class="font-medium text-gray-700 dark:text-white">
                            Pekerjaan
                        </h3>
                    </div>

                    <div class="p-6.5">
                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">

                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Status
                                </label>
                                <input type="text" disabled
                                    value="{{ $applicant->user->employmentStatus->name }}"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                            </div>                       

                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Nama Perusahaan
                                </label>
                                <input type="text" disabled
                                    value="{{ old('company ', $applicant->user->company ) }}"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                            </div>

                        </div>

                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">

                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Perusahaan Industri
                                </label>
                                <input type="text" disabled
                                    value="{{ $applicant->user->companyIndustry->name }}"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                            </div>

                            
                            <div class="w-full xl:w-1/2">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Posisi
                                </label>
                                <input type="text" disabled
                                    value="{{ old('position', $applicant->user->position) }}"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:disabled:bg-gray-700" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col mt-4 gap-9">
                <div class="bg-white border rounded-sm border-stroke shadow-default dark:border-gray-600 dark:bg-gray-800">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-600">
                        <h3 class="font-medium text-gray-700 dark:text-white">
                            Dokument (CV)
                        </h3>
                    </div>

                    <div class="p-6.5">

                        <div class="my-8">
                                @if($applicant->user->document)
                                <a target="_blank" rel="noopener noreferrer" href="{{ $applicant->user->document }}"
                                    class="inline-flex items-center justify-center gap-1 px-4 py-3 text-sm font-medium text-center text-white bg-blue-600 rounded-md hover:bg-opacity-90">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </span>
                                    Lihat Curriculum Vitae (CV) User

                                </a>
                                @else
                                <p class="text-gray-500">Dokumen tidak tersedia.</p>
                                @endif
                            </div>


                    </div>
                </div>
            </div>

    </div>
</main>
@endsection
