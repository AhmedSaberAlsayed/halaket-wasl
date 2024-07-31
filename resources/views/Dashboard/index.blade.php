<!DOCTYPE html>
<html lang="en" >

@include('Dashboard\layouts\HeadDashboard')
<body>
    <div class="container-fluid position-relative d-flex p-0">
        
        <!-- Spinner Start -->
        @include('Dashboard\layouts\Spinner')
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        @include('Dashboard\layouts\Sidebar')
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            
            <!-- Navbar Start -->
            @include('Dashboard\layouts\Navbar')
            <!-- Navbar End -->



                {{-- thecontent --}}


                
            <!-- Footer Start -->
            @include('Dashboard\layouts\Footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->
    </div>

    {{-- js script --}}
    @include('Dashboard\layouts\JSScript')
    
</body>

</html>