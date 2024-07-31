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

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        
                        
                        <div class="bg-secondary rounded h-100 p-4">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>



                        
                </div>
            </div>


                
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