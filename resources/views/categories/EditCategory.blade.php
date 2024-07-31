<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('Dashboard\layouts\HeadDashboard')

</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">

        {{-- @dd($categories) --}}
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
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">تسجيل  العناوين الرئيسيه </h6>
            <form action="{{  route('category.update') }}" method="post">
                @csrf
                <input type="hidden" name="category_id"  value="{{ $category->id }}" >
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">اعديل عنوان رئيسي</label>
                    <input type="text" name="title" value="{{ $category->title }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button type="submit"  class="btn btn-primary">تعديل عنوان رئيسي</button>
            </form>
        </div>
    </div>
@include('Dashboard\layouts\Footer')
@include('Dashboard\layouts\JSScript')
</body>
</html>
