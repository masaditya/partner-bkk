@extends('layouts.app')
@section('title', 'Dasbor')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('content')
<main>
    <!-- Card Stats -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 sm:gap-6">
            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-neutral-800">
                <div class="flex justify-between p-4 md:p-5 gap-x-3">
                    <div>
                        <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                            Total Users
                        </p>
                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                {{ \App\Models\User::count() }}
                            </h3>
                        </div>
                    </div>
                    <div
                        class="shrink-0 flex justify-center items-center size-[46px] bg-blue-600 text-white rounded-full dark:bg-blue-900 dark:text-blue-200">
                        <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>
                    </div>
                </div>

                <a class="inline-flex items-center justify-between px-4 py-3 text-sm text-gray-600 border-t border-gray-200 md:px-5 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 rounded-b-xl dark:border-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    href="{{route('user.index')}}">
                    Lihat Laporan
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" /></svg>
                </a>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-neutral-800">
                <div class="flex justify-between p-4 md:p-5 gap-x-3">
                    <div>
                        <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                            Mitra Industri
                        </p>
                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                {{ \App\Models\Admin::where('is_partner', 1)->count() }}
                            </h3>
                        </div>
                    </div>
                    <div
                        class="shrink-0 flex justify-center items-center size-[46px] bg-blue-600 text-white rounded-full dark:bg-blue-900 dark:text-blue-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 size-5" fill="#f0f0f0"
                            viewBox="0 0 256 256">
                            <path
                                d="M27.2,126.4a8,8,0,0,0,11.2-1.6,52,52,0,0,1,83.2,0,8,8,0,0,0,11.2,1.59,7.73,7.73,0,0,0,1.59-1.59h0a52,52,0,0,1,83.2,0,8,8,0,0,0,12.8-9.61A67.85,67.85,0,0,0,203,93.51a40,40,0,1,0-53.94,0,67.27,67.27,0,0,0-21,14.31,67.27,67.27,0,0,0-21-14.31,40,40,0,1,0-53.94,0A67.88,67.88,0,0,0,25.6,115.2,8,8,0,0,0,27.2,126.4ZM176,40a24,24,0,1,1-24,24A24,24,0,0,1,176,40ZM80,40A24,24,0,1,1,56,64,24,24,0,0,1,80,40ZM203,197.51a40,40,0,1,0-53.94,0,67.27,67.27,0,0,0-21,14.31,67.27,67.27,0,0,0-21-14.31,40,40,0,1,0-53.94,0A67.88,67.88,0,0,0,25.6,219.2a8,8,0,1,0,12.8,9.6,52,52,0,0,1,83.2,0,8,8,0,0,0,11.2,1.59,7.73,7.73,0,0,0,1.59-1.59h0a52,52,0,0,1,83.2,0,8,8,0,0,0,12.8-9.61A67.85,67.85,0,0,0,203,197.51ZM80,144a24,24,0,1,1-24,24A24,24,0,0,1,80,144Zm96,0a24,24,0,1,1-24,24A24,24,0,0,1,176,144Z">
                            </path>
                        </svg>
                    </div>
                </div>

                <a class="inline-flex items-center justify-between px-4 py-3 text-sm text-gray-600 border-t border-gray-200 md:px-5 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 rounded-b-xl dark:border-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    href="{{ route('partner.index') }}">
                    Lihat Laporan
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" /></svg>
                </a>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-neutral-800">
                <div class="flex justify-between p-4 md:p-5 gap-x-3">
                    <div>
                        <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                            Loker
                        </p>
                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                {{ \App\Models\Occupations::count() }}
                            </h3>
                        </div>
                    </div>
                    <div
                        class="shrink-0 flex justify-center items-center size-[46px] bg-blue-600 text-white rounded-full dark:bg-blue-900 dark:text-blue-200">

                        <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 size-5" fill="#f0f0f0"
                            viewBox="0 0 256 256">
                            <path
                                d="M216,56H176V48a24,24,0,0,0-24-24H104A24,24,0,0,0,80,48v8H40A16,16,0,0,0,24,72V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V72A16,16,0,0,0,216,56ZM96,48a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96ZM216,72v41.61A184,184,0,0,1,128,136a184.07,184.07,0,0,1-88-22.38V72Zm0,128H40V131.64A200.19,200.19,0,0,0,128,152a200.25,200.25,0,0,0,88-20.37V200ZM104,112a8,8,0,0,1,8-8h32a8,8,0,0,1,0,16H112A8,8,0,0,1,104,112Z">
                            </path>
                        </svg>
                    </div>
                </div>

                <a class="inline-flex items-center justify-between px-4 py-3 text-sm text-gray-600 border-t border-gray-200 md:px-5 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 rounded-b-xl dark:border-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    href="{{ route('occupation.index') }}">
                    Lihat Laporan
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" /></svg>
                </a>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-neutral-800">
                <div class="flex justify-between p-4 md:p-5 gap-x-3">
                    <div>
                        <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                            Pelamar
                        </p>
                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                {{ \App\Models\Applicant::count() }}
                            </h3>
                        </div>
                    </div>
                    <div
                        class="shrink-0 flex justify-center items-center size-[46px] bg-blue-600 text-white rounded-full dark:bg-blue-900 dark:text-blue-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 size-5" fill="#f0f0f0"
                            viewBox="0 0 256 256">
                            <path
                                d="M210.78,39.25l-130.25-23A16,16,0,0,0,62,29.23l-29.75,169a16,16,0,0,0,13,18.53l130.25,23h0a16,16,0,0,0,18.54-13l29.75-169A16,16,0,0,0,210.78,39.25ZM178.26,224h0L48,201,77.75,32,208,55ZM89.34,58.42a8,8,0,0,1,9.27-6.48l83,14.65a8,8,0,0,1-1.39,15.88,8.36,8.36,0,0,1-1.4-.12l-83-14.66A8,8,0,0,1,89.34,58.42ZM83.8,89.94a8,8,0,0,1,9.27-6.49l83,14.66A8,8,0,0,1,174.67,114a7.55,7.55,0,0,1-1.41-.13l-83-14.65A8,8,0,0,1,83.8,89.94Zm-5.55,31.51A8,8,0,0,1,87.52,115L129,122.29a8,8,0,0,1-1.38,15.88,8.27,8.27,0,0,1-1.4-.12l-41.5-7.33A8,8,0,0,1,78.25,121.45Z">
                            </path>
                        </svg>

                    </div>
                </div>

                <a class="inline-flex items-center justify-between px-4 py-3 text-sm text-gray-600 border-t border-gray-200 md:px-5 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 rounded-b-xl dark:border-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                    href="{{ route('applicant.index') }}">
                    Lihat Laporan
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" /></svg>
                </a>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Stats -->

    <div class="flex px-4 sm:px-6 lg:px-8">
        <div class="flex p-1 transition bg-gray-200 rounded-lg dark:bg-neutral-700 dark:hover:bg-neutral-600">
            <nav class="flex gap-x-1" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
            <button type="button" class="inline-flex items-center px-4 py-3 text-sm font-medium text-gray-500 bg-transparent rounded-lg hs-tab-active:bg-white hs-tab-active:text-gray-700 hs-tab-active:dark:bg-neutral-800 hs-tab-active:dark:text-neutral-200 dark:hs-tab-active:bg-gray-800 gap-x-2 hover:text-gray-700 focus:outline-none focus:text-gray-700 hover:hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-200 dark:hover:text-white dark:focus:text-white active" id="segment-item-1" aria-selected="true" data-hs-tab="#segment-1" aria-controls="segment-1" role="tab">
                Statistik Alumni
            </button>
            <button type="button" class="inline-flex items-center px-4 py-3 text-sm font-medium text-gray-500 bg-transparent rounded-lg hs-tab-active:bg-white hs-tab-active:text-gray-700 hs-tab-active:dark:bg-neutral-800 hs-tab-active:dark:text-neutral-200 dark:hs-tab-active:bg-gray-800 gap-x-2 hover:text-gray-700 focus:outline-none focus:text-gray-700 hover:hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-200 dark:hover:text-white dark:focus:text-white" id="segment-item-2" aria-selected="false" data-hs-tab="#segment-2" aria-controls="segment-2" role="tab">
                Statistik Umum
            </button>
            </nav>
        </div>
        </div>

        <div class="mt-3">
        <div id="segment-1" role="tabpanel" aria-labelledby="segment-item-1">
            
            <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5 px-4 sm:px-6 lg:px-8 pb-10 lg:pb-14">
                <!-- ====== Chart One Start -->
                <div
                    class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-gray-200 dark:bg-gray-300 sm:px-7.5 xl:col-span-8 text-center">
                    <div class="mb-4">
                        <canvas id="alumniBarChart" width="400" height="200"></canvas>
                    </div>
                    <span class="text-sm text-gray-500 ">Untuk menunjukkan pertumbuhan atau fluktuasi lulusan tiap tahun.</span>
                </div>
                <!-- ====== Chart One End -->

                <!-- ====== Chart Two Start -->
                <div
                    class="col-span-12 p-2 text-center bg-white border rounded-sm border-stroke shadow-default dark:border-gray-200 dark:bg-gray-300 xl:col-span-4">
                    <div class="mb-4">
                        <canvas id="statusGraduation" width="500" height="500"></canvas>
                    </div>
                    <span class="text-sm text-gray-500">Untuk menunjukkan diversifikasi bidang pekerjaan lulusan.</span>
                </div>
                <!-- ====== Chart Two End -->

                <!-- ====== Chart Three Start -->
                <div
                    class="col-span-12 p-2 text-center bg-white border rounded-sm border-stroke shadow-default dark:border-gray-200 dark:bg-gray-300 xl:col-span-4">
                    <div class="mb-4">
                        <canvas id="statusEmployee" width="400" height="400"></canvas>
                    </div>
                    <span class="text-sm text-gray-500 ">Untuk memberikan gambaran cepat mengenai tingkat keberhasilan penyaluran kerja.</span>
                </div>
                <!-- ====== Chart Three End -->

                <!-- ====== Map One Start -->
                <div
                    class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-gray-200 dark:bg-gray-300 sm:px-7.5 xl:col-span-8 text-center">
                    <div class="mb-4">
                        <canvas id="partnerIndustry" width="400" height="200"></canvas>
                    </div>
                    <span class="text-sm text-gray-500 ">Data statistik yang menunjukkan berapa banyak perusahaan yang bermitra dengan sekolah setiap tahun.</span>
                </div>
                <!-- ====== Map One End -->

                <!-- ====== Chat Card End -->
            </div>

        </div>
        <div id="segment-2" class="hidden" role="tabpanel" aria-labelledby="segment-item-2">
           <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5 px-4 sm:px-6 lg:px-8 pb-10 lg:pb-14">
                <div
                    class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-gray-200 dark:bg-gray-300 sm:px-7.5 xl:col-span-8 text-center">
                    <div class="mb-4">
                        <canvas id="userGrowthChart" width="400" height="200"></canvas>
                    </div>
                    <span class="text-sm text-gray-500 ">Untuk menunjukkan pertumbuhan Pengguna Umum per tahun.</span>
                </div>
                 <div
                    class="col-span-12 p-2 text-center bg-white border rounded-sm border-stroke shadow-default dark:border-gray-200 dark:bg-gray-300 xl:col-span-4">
                    <div class="mb-4">
                         <canvas id="educationChart" width="400" height="400"></canvas>
                    </div>
                    <span class="text-sm text-gray-500 ">Untuk menunjukkan tingkat pendidikan user umum.</span>
                </div>
                <div
                    class="col-span-12 p-2 text-center bg-white border rounded-sm border-stroke shadow-default dark:border-gray-200 dark:bg-gray-300 xl:col-span-4">
                    <div class="mb-4">
                        <canvas id="genderChart" width="400" height="200"></canvas>
                    </div>
                    <span class="text-sm text-gray-500 ">Untuk memberikan gambaran cepat mengenai statistik Jenis Kelamin User Umum.</span>
                </div>
                <div
                    class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-gray-200 dark:bg-gray-300 sm:px-7.5 xl:col-span-8 text-center">
                    <div class="mb-4">
                        <canvas id="applicantsChart" width="400" height="200"></canvas>
                    </div>
                    <span class="text-sm text-gray-500 ">Untuk memberikan gambaran cepat mengenai User Umum yang Melakukan Apply Lamaran per Tahun.</span>
                </div>
            </div>
        </div>
    </div>

</main>



{{-- umum --}}
@include('components.chart.userGrowthChart')
@include('components.chart.educationChart')
@include('components.chart.applicantsChart')
@include('components.chart.genderChart')
{{-- Alumni --}}
@include('components.chart.alumniBarChart')
@include('components.chart.statusGraduation')
@include('components.chart.statusEmployee')
@include('components.chart.partnerIndustry')
@endsection
