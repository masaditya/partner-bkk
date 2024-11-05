@extends('layouts.app')
@section('title', 'Dokumentasi')
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
                Update Deskripsi {{ $documentation->title }}
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-700 dark:text-neutral-200" href="{{ route('dashboard') }}">Dasbor /</a>
                    </li>
                    <li>
                        <a class="font-medium text-gray-700 dark:text-neutral-200" href="{{ route('documentation.index') }}">Dokumentasi /</a>
                    </li>
                    <li class="font-medium text-blue-500">Edit</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <form action="{{ route('documentation.update', $documentation->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="flex flex-col gap-3 mt-6 mb-4 sm:flex-row sm:items-center sm:justify-between">
                <span></span>
                <button type="submit"
                    class="inline-flex items-center justify-center gap-1 px-4 py-3 text-sm font-medium text-center text-white bg-blue-600 rounded-md hover:bg-opacity-90">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-[18px] -rotate-45">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                        </svg>
                    </span>
                    Perbarui Data
                </button>
            </div>

            <div class="flex flex-col mt-4 gap-9">
                <div
                    class="bg-white border rounded-sm border-stroke shadow-default dark:border-gray-600 dark:bg-gray-800">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-gray-600">
                        <h3 class="font-medium text-gray-700 dark:text-white">
                        </h3>
                    </div>
                    <div class="p-6.5">
                        <div class="mb-4.5">
                            <textarea id="jobdescription" name="description" placeholder="Masukkan konten artikel"
                                class="w-full rounded border-[1.5px] z-[19999] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                rows="10">{{ $documentation->description }}</textarea>
                        </div>
                    </>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection

