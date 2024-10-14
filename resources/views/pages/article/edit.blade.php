@extends('layouts.app')
@section('title', 'Artikel')
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
                Edit Artikel
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-neutral-200" href="{{ route('dashboard') }}">Dasbor /</a>
                    </li>
                    <li>
                        <a class="font-medium text-neutral-200" href="{{ route('article.index') }}">Artikel /</a>
                    </li>
                    <li class="font-medium text-blue-500">Edit</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                    Simpan
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
                            <label class="block mb-3 text-base font-medium text-gray-700 dark:text-white">
                                Judul Artikel <span class="text-sm text-red-500">*</span>
                            </label>
                            <input type="text" name="title" placeholder="Masukkan judul artikel" required
                                value="{{ old('title', $article->title) }}"
                                class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>

                        <div class="mb-4.5">
                            <label class="block mb-3 text-base font-medium text-gray-700 dark:text-white">
                                Thumbnail (max 1MB) <span class="text-sm text-red-500">*</span>
                            </label>
                            <input type="file" name="thumbnail" accept="image/*"
                                placeholder="Masukkan thumbnail artikel" required
                                class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="thumbnail" onchange="previewImage()" />
                            <div class="w-full h-64 p-4 overflow-hidden">
                                <img id="previewImage" src="{{ $article->thumbnail }}" alt="Preview Thumbnail"
                                    class="object-cover rounded" />
                            </div>
                        </div>

                        <div class="mb-4.5">
                            <label class="block mb-3 text-base font-medium text-gray-700 dark:text-white">
                                Kategori <span class="text-sm text-red-500">*</span>
                            </label>
                            <select name="category_id" required
                                class="w-full rounded border-[1.5px] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $article->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4.5">
                            <label class="block mb-3 text-base font-medium text-gray-700 dark:text-white">
                                Konten <span class="text-sm text-red-500">*</span>
                            </label>
                            <textarea id="jobdescription" name="content" placeholder="Masukkan konten artikel"
                                class="w-full rounded border-[1.5px] z-[19999] border-stroke border-gray-200  bg-transparent px-5 py-3 font-normal text-gray-700 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                rows="10">{{ $article->content }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        const thumbnail = document.getElementById('thumbnail');
        const previewImage = document.getElementById('previewImage');

        thumbnail.addEventListener("change", function () {
            const file = thumbnail.files[0];
            const reader = new FileReader();

            reader.addEventListener("load", function () {
                previewImage.src = reader.result;
            });

            reader.readAsDataURL(file);
        });
    </script>
</main>
@endsection

