<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>createSup_category</title>
        @include('Dashboard\layouts\HeadDashboard')
</head>
<body>
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
            <div class="col-sm-12 col-xl-6">
                    <form action="{{  route('Sup_category.store') }}" method="post">
                        @csrf
                        {{-- <input type="text" name="title" placeholder="sup"> --}}
                        <input  type="text" name="title" placeholder="ادخال العنوان الفرعي "  class="form-control" id="exampleInputEmail1" aria-describedby="sup_category">
                        {{-- <input type="text" name="categoryID"> --}}
                        <select name="categoryID" placeholder="category" class="form-select mb-3" aria-label="Default select example">
                            <option value="" disabled selected>اختيار العنوان الرئيسي </option>
                            @foreach ($categories as $Category)
                            <option value="{{$Category->id}}">{{$Category->title}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary"> اضافه عنوان فرعي </button>
                    </form>                
            </div>
        </div>
        @include('Dashboard\layouts\Footer')
     @include('Dashboard\layouts\JSScript')
</body>
</html>