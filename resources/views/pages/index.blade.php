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
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
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
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
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
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
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
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
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

    <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5 px-4 sm:px-6 lg:px-8 pb-10 lg:pb-14">
        <!-- ====== Chart One Start -->
        <div
            class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8">
            <div>
                <canvas id="myBarChart" width="400" height="200"></canvas>
            </div>
        </div>

        <!-- ====== Chart One End -->

        <!-- ====== Chart Two Start -->
        <div
            class="col-span-12 p-2 bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-4">
            <div>
                <canvas id="statusGraduation" width="500" height="500"></canvas>
            </div>
        </div>

        <!-- ====== Chart Two End -->

        <!-- ====== Chart Three Start -->
        <div
            class="col-span-12 p-2 bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-4">
            <div class="mb-2">
                <canvas id="statusEmployee" width="400" height="400"></canvas>
            </div>
        </div>

        <!-- ====== Chart Three End -->

        <!-- ====== Map One Start -->
        <div
            class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8">
            <canvas id="partnerBarChart" width="400" height="200"></canvas>
        </div>

        <!-- ====== Map One End -->

        <!-- ====== Chat Card End -->
    </div>
</main>

{{-- bar chart 1 --}}
<script>
  // Dapatkan elemen canvas
  var ctx = document.getElementById('myBarChart').getContext('2d');

  // Buat chart baru
  var myBarChart = new Chart(ctx, {
    type: 'bar', // Jenis chart yang ingin digunakan
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June'], // Label pada sumbu X
      datasets: [{
        label: 'Sales 2024', // Label dataset
        data: [12, 19, 3, 5, 2, 3], // Data pada sumbu Y
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1 // Ketebalan garis batas
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true // Memulai nilai Y dari 0
        }
      }
    }
  });
</script>

{{-- bar pie 2 --}}
<script>
  var ctx = document.getElementById('statusGraduation').getContext('2d');
  var statusGraduation = new Chart(ctx, {
    type: 'pie', // Jenis chart pie
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple'], // Label untuk setiap bagian pie
      datasets: [{
        label: 'Votes',
        data: [12, 19, 3, 5, 2], // Data untuk setiap label
        backgroundColor: [
          'rgba(255, 99, 132, 0.6)',  // Warna Red
          'rgba(54, 162, 235, 0.6)',  // Warna Blue
          'rgba(255, 206, 86, 0.6)',  // Warna Yellow
          'rgba(75, 192, 192, 0.6)',  // Warna Green
          'rgba(153, 102, 255, 0.6)'  // Warna Purple
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top', // Posisi legend di atas
        }
      }
    }
  });
</script>

{{-- bar pie 3 --}}
<script>
  var ctx = document.getElementById('statusEmployee').getContext('2d');
  var statusEmployee = new Chart(ctx, {
    type: 'pie', // Jenis chart pie
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple'], // Label untuk setiap bagian pie
      datasets: [{
        label: 'Votes',
        data: [12, 19, 3, 5, 2], // Data untuk setiap label
        backgroundColor: [
          'rgba(255, 99, 132, 0.6)',  // Warna Red
          'rgba(54, 162, 235, 0.6)',  // Warna Blue
          'rgba(255, 206, 86, 0.6)',  // Warna Yellow
          'rgba(75, 192, 192, 0.6)',  // Warna Green
          'rgba(153, 102, 255, 0.6)'  // Warna Purple
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top', // Posisi legend di atas
        }
      }
    }
  });
</script>

{{-- bar chart 1 --}}
<script>
  // Dapatkan elemen canvas
  var ctx = document.getElementById('partnerBarChart').getContext('2d');

  // Buat chart baru
  var partnerBarChart = new Chart(ctx, {
    type: 'bar', // Jenis chart yang ingin digunakan
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June'], // Label pada sumbu X
      datasets: [{
        label: 'Sales 2024', // Label dataset
        data: [12, 19, 3, 5, 2, 3], // Data pada sumbu Y
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1 // Ketebalan garis batas
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true // Memulai nilai Y dari 0
        }
      }
    }
  });
</script>
@endsection
