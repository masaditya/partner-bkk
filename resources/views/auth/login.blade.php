<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Login | BKK SIGMA SMKN 1 BOJONEGORO
    </title>
    <link href="{{ asset('tail-admin/style.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>

    <main>
        <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
            {{-- toast success or failed Start --}}
            @include('includes.toast')
            {{-- toast success or failed End --}}
            <div class="bg-white border rounded-sm border-stroke shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="flex flex-wrap items-center">
                    <div class="hidden w-full xl:block xl:w-1/2">
                        <div class="px-26 py-17.5 text-center">

                            <p class="font-medium 2xl:px-20">

                            </p>

                            <span class="inline-block mt-15">
                                <img class="" src="{{ asset('images/LOGO-BKK-SMKN-1-BOJONEGORO.jpg') }}" alt="Logo" />
                            </span>
                        </div>
                    </div>
                    <div class="w-full border-stroke dark:border-strokedark xl:w-1/2 xl:border-l-2">
                        <div class="w-full p-4 sm:p-12.5 xl:p-17.5">
                            <span class="mb-1.5 block font-medium">SMKN 1 BOJONEGORO</span>
                            <h2 class="text-2xl font-bold text-black mb-9 dark:text-white sm:text-title-xl2">
                                Masuk ke Aplikasi BKK SIGMA
                            </h2>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-4">
                                    <label class="mb-2.5 block font-medium text-black dark:text-white">Email</label>
                                    <input type="email" name="email" placeholder="Masukkan email"
                                        class="w-full py-4 pl-6 pr-10 bg-transparent border rounded-lg outline-none border-stroke focus:border-primary"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label class="mb-2.5 block font-medium text-black dark:text-white">Kata
                                        Sandi</label>
                                    <input type="password" name="password" placeholder="Masukkan kata sandi"
                                        class="w-full py-4 pl-6 pr-10 bg-transparent border rounded-lg outline-none border-stroke focus:border-primary"
                                        required>
                                </div>

                                <div class="mb-5">
                                    <button type="submit"
                                        class="w-full p-4 font-medium text-white transition border rounded-lg cursor-pointer border-primary bg-meta-3 hover:bg-opacity-90"> Masuk
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ====== Forms Section End -->
        </div>
    </main>
    <script defer src="{{ asset('tail-admin/bundle.js') }}"></script>
</body>

</html>
