@extends('layouts.app')
@section('title', 'User')

@section('content')

<main>

    {{-- toast success or failed Start --}}
    @include('includes.toast')
    {{-- toast success or failed End --}}

    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="flex flex-col gap-3 mb-2 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-bold text-gray-700 text-title-md2 dark:text-white">
                Detail Data User
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-700 dark:text-neutral-200" href="{{ route('dashboard') }}">Dasbor /</a>
                    </li>
                    <li>
                        <a class="font-medium text-gray-700 dark:text-neutral-200" href="{{ route('user.index') }}">User /</a>
                    </li>
                    <li class="font-medium text-blue-500">Ubah User</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex flex-col gap-3 mt-6 mb-4 sm:flex-row sm:items-center sm:justify-between">
                <span></span>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-1 px-4 py-3 text-sm font-medium text-center text-white bg-blue-600 rounded-md hover:bg-opacity-90">
                    <span>
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-[18px] -rotate-45">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                      </svg>
                    </span>
                    Simpan Perubahan
                </button>

            </div>
            {{-- Button add end --}}

            <div class="flex flex-col mt-4 gap-9">
                <div
                    class="bg-white border rounded-sm border-stroke shadow-default dark:bg-gray-800 dark:border-gray-600">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-600">
                        <h3 class="font-medium text-gray-700 dark:text-white">
                            Informasi Pribadi
                        </h3>
                    </div>
                  
                        <div class="p-6.5">
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                      
                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Nama Lengkap <span class="text-sm text-red-500">*</span>
                                    </label>
                                    <input type="name" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name', $user->name) }}" required
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        NIS (Hanya untuk alumni)
                                    </label>
                                    <input type="text" name="NIS" placeholder="Masukkan nomer induk siswa" value="{{ old('NIS', $user->NIS) }}"
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                            </div>

                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                      
                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Alamat Email <span class="text-sm text-red-500">*</span>
                                    </label>
                                    <input type="email" name="email" placeholder="Masukkan alamat email" required value="{{ old('email', $user->email) }}"
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Nomer HP (WA Aktif) <span class="text-sm text-red-500">*</span>
                                    </label>
                                    <input type="text" name="phone" placeholder="Masukkan nomer telepon" value="{{ old('phone', $user->phone) }}" required
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Jenis Kelamin <span class="text-sm text-red-500">*</span>
                                    </label>
                                    <select name="gender" required 
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Pas Foto (jpg, png, max 1mb)
                                </label>
                                <div class="flex items-center gap-4">
                                    <div class="block">
                                        <div class="w-40 h-40">
                                            <img id="previewImage" src="{{ $user->photo ?? 'https://placehold.co/160x160' }}" alt="Logo {{ $user->photo ?? 'Default' }}" class="object-cover w-full h-full rounded">
                                        </div>
                                        
                                    </div>
                                    <div>
                                        <label class="block">
                                            <span class="sr-only">Pas Foto</span>
                                            <input id="photoInput" type="file" accept="image/*" name="photo"
                                                class="block w-full text-sm text-gray-500 file:me-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-900 file:text-white hover:file:bg-blue-700 file:disabled:opacity-50 file:disabled:pointer-events-none dark:text-neutral-500 dark:file:bg-blue-500 dark:hover:file:bg-blue-400">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Alamat<span class="text-sm text-red-500">*</span>
                                </label>
                                <textarea name="address" rows="3" placeholder="Masukkan alamat"
                                    class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('mail', $user->address) }}</textarea>
                            </div>
                        </div>
                </div>
            </div>

            <div class="flex flex-col mt-4 gap-9">
                <div
                    class="bg-white border rounded-sm border-stroke shadow-default dark:bg-gray-800 dark:border-gray-600">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-600">
                        <h3 class="font-medium text-gray-700 dark:text-white">
                            Pendidikan
                        </h3>
                    </div>
                  
                        <div class="p-6.5">
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">

                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Status User <span class="text-sm text-red-500">*</span>
                                    </label>
                                    <select name="is_alumni" required 
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" disabled selected>Pilih Status User</option>
                                        <option value="1" {{ old('is_alumni', $user->is_alumni) == 1 ? 'selected' : '' }}>Alumni</option>
                                        <option value="0" {{ old('is_alumni', $user->is_alumni) == 0 ? 'selected' : '' }}>Umum</option>
                                    </select>
                                </div>
                      
                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Tahun Kelulusan <span class="text-sm text-red-500">*</span>
                                    </label>
                                    <input type="number" name="graduation_year" placeholder="2024" value="{{ old('graduation_year', $user->graduation_year) }}" required
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Jurusan<span class="text-sm text-red-500">*</span>
                                    </label>
                                        <select name="major_id" 
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Pilih Jurusan</option>
                                        @foreach($majors as $majors)
                                        <option value="{{ $majors->id }}"
                                            {{ $user->major_id == $majors->id ? 'selected' : '' }}>{{ $majors->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">

                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Pendidikan Terakhir<span class="text-sm text-red-500">*</span>
                                    </label>
                                        <select name="latest_degree" required
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" disabled selected>Pilih Gelar Terakhir</option>
                                        <option value="SMK" {{ old('latest_degree', $user->latest_degree) == 'SMK' ? 'selected' : '' }}>SMK</option>
                                        <option value="SMA" {{ old('latest_degree', $user->latest_degree) == 'SMA' ? 'selected' : '' }}>SMA</option>
                                        <option value="D-1" {{ old('latest_degree', $user->latest_degree) == 'D-1' ? 'selected' : '' }}>D-1</option>
                                        <option value="D-2" {{ old('latest_degree', $user->latest_degree) == 'D-2' ? 'selected' : '' }}>D-2</option>
                                        <option value="D-3" {{ old('latest_degree', $user->latest_degree) == 'D-3' ? 'selected' : '' }}>D-3</option>
                                        <option value="D-4" {{ old('latest_degree', $user->latest_degree) == 'D-4' ? 'selected' : '' }}>D-4</option>
                                        <option value="S-1" {{ old('latest_degree', $user->latest_degree) == 'S-1' ? 'selected' : '' }}>S-1</option>
                                        <option value="S-2" {{ old('latest_degree', $user->latest_degree) == 'S-2' ? 'selected' : '' }}>S-2</option>
                                        <option value="Sarjana III" {{ old('latest_degree', $user->latest_degree) == 'S-3' ? 'selected' : '' }}>S-3</option>
                                    </select>
                                </div>
                      
                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Universitas
                                    </label>
                                    <input type="text" name="university" placeholder="Masukkan nama universitas" value="{{ old('university ', $user->university ) }}"
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Fakultas
                                    </label>
                                    <input type="text" name="faculty" placeholder="Masukkan nama fakultas" value="{{ old('faculty', $user->faculty) }}" 
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="flex flex-col mt-4 gap-9">
                <div
                    class="bg-white border rounded-sm border-stroke shadow-default dark:bg-gray-800 dark:border-gray-600">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-600">
                        <h3 class="font-medium text-gray-700 dark:text-white">
                            Pekerjaan
                        </h3>
                    </div>
                  
                        <div class="p-6.5">
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">

                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Status Pekerjaan <span class="text-sm text-red-500">*</span>
                                    </label>
                                    <select name="status_id" required 
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected disabled>Status Pekerjaan</option>
                                        @foreach($status as $stat)
                                        <option value="{{ $stat->id }}"
                                            {{ $user->status_id == $stat->id ? 'selected' : '' }}>{{ $stat->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                      
                                 <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Nama Perusahaan
                                    </label>
                                    <input type="text" name="company" placeholder="Masukkan nama perusahaan Anda bekerja" value="{{ old('company', $user->company ) }}"
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                                
                            </div>

                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                      
                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Perusahaan Industri
                                    </label>
                                    <select name="company_industry_id" 
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option disabled selected value="">Perusahaan Industri</option>
                                        @foreach($company_industries as $industry)
                                        <option value="{{ $industry->id }}"
                                            {{ $user->company_industry_id == $industry->id ? 'selected' : '' }}>{{ $industry->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                        Posisi
                                    </label>
                                    <input type="text" name="position" placeholder="Masukkan posisi Anda bekerja" value="{{ old('position', $user->position) }}"
                                        class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="flex flex-col mt-4 gap-9">
                <div
                    class="bg-white border rounded-sm border-stroke shadow-default dark:bg-gray-800 dark:border-gray-600">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-600">
                        <h3 class="font-medium text-gray-700 dark:text-white">
                            Dokument (CV)
                        </h3>
                    </div>
                  
                        <div class="p-6.5">
                           
                            <div class="mb-4.5">
                                <label class="block mb-3 text-sm font-medium text-gray-700 dark:text-white">
                                    Dokumen CV (pdf, max 1024)
                                </label>
                                <div>
                                    <label class="block">
                                        <span class="sr-only">CV (1mb)</span>
                                        <input type="file" accept="application/pdf" name="document"
                                            class="block w-full text-sm text-gray-500 file:me-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-900 file:text-white hover:file:bg-blue-700 file:disabled:opacity-50 file:disabled:pointer-events-none dark:text-neutral-500 dark:file:bg-blue-500 dark:hover:file:bg-blue-400">
                                    </label>
                                </div>
                                <div class="my-8">
                                    @if($user->document)
                                    <a href="{{ $user->document }}" class="inline-flex items-center justify-center gap-1 px-4 py-3 text-sm font-medium text-center text-white bg-blue-600 rounded-md hover:bg-opacity-90">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
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
        </form>



    </div>
</main>
<script>
    document.getElementById('photoInput').addEventListener('change', function(event) {
        const previewImage = document.getElementById('previewImage');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
