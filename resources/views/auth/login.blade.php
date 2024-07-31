<!DOCTYPE html>
<html lang="en">

@include('Dashboard\layouts\HeadDashboard')


<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('Dashboard\layouts\Spinner')
        <!-- Spinner End -->


        <!-- Login In Start -->
        <div class="container-fluid">
        <form method="POST"  action="{{ route('login') }}">
            @csrf
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Halaket Wasl</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <x-text-input id="floatingInput" class="form-control" type="email" placeholder="name@example.com" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            {{-- <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"> --}}
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">

                            <x-text-input id="floatingPassword" class="form-control"
                            type="password"
                            name="password"
                            placeholder="Password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />


                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">

                            <div class="form-check">
                                <label class="form-check-label" for="exampleCheck1">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                                <span >{{ __('Remember me') }}</span>
                                </label>


    

                            </div>
                            </div>


                            
            <x-primary-button class="btn btn-primary py-3 w-100 mb-4">
                {{ __('Log in') }}
            </x-primary-button>

                    </div>
                </div>
            </div>
        </form>
    </div>

        <!-- Login In End -->
    </div>

    @include('Dashboard\layouts\JSScript')

</body>

</html>