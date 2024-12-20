<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body
    x-data="{ page: '@yield('title')', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}" class="dark:text-[#24303f] dark:bg-[#1a222c]">
    
    <!-- ===== Preloader Start ===== -->
    @include('includes.preloader')
    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
        <!-- ===== Sidebar Start ===== -->
        @include('includes.sidebar')
        <!-- ===== Sidebar End ===== -->

        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            <!-- ===== Header Start ===== -->
            @include('includes.header')
            <!-- ===== Header End ===== -->

            <!-- ===== Main Content Start ===== -->
            @yield('content')
            <!-- ===== Main Content End ===== -->
        </div>
        <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
    @include('includes.js')
</body>

</html>