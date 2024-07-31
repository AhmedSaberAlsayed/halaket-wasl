<!DOCTYPE html>
<html lang="en">

@include('Dashboard\layouts\HeadDashboard')

<body>
        <!-- Spinner Start -->
        @include('Dashboard\layouts\Spinner')
        <!-- Spinner End -->

            <!-- 404 Start -->
                <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center p-4">
                        <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                        <h1 class="display-1 fw-bold">404</h1>
                        <h1 class="mb-4">الصفحه غير موجوده</h1>

                        <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('dashboard')}}">العوده الي الصفحة الرئسيه</a>
                    </div>
                </div>
            <!-- 404 End -->


            @include('Dashboard\layouts\JSScript')

</body>

</html>