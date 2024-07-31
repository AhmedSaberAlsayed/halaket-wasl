<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sup_category.update</title>
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
            <div class="col-sm-12 col-xl-6">

                {{-- <div class="bg-secondary rounded h-100 p-4"> --}}

                    <form action="{{  route('Sup_category.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="Sup_category"  value="{{ $Sup_Category->id }}" >
                        <input  type="text" name="title" placeholder="ادخال العنوان الفرعي " value="{{ $Sup_Category->title }}" class="form-control" id="exampleInputEmail1" aria-describedby="sup_category">
                        <select name="categoryID" placeholder="category" class="form-select mb-3" aria-label="Default select example">
                                <option value="" disabled selected>Choose a category</option>
                            @foreach ($categories as $Category)
                                <option value="{{$Category->id}}">{{$Category->title}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">تعديل</button>
                    </form>
                {{-- </div> --}}
            </div>


@include('Dashboard\layouts\Footer')


@include('Dashboard\layouts\JSScript')
    {{-- <form action="{{  route('Sup_category.update') }}" method="post">
        @csrf
        <input type="hidden" name="Sup_category"  value="{{ $Sup_Category->id }}" >
        <input type="text" name="title" value="{{ $Sup_Category->title }}" >
        <input type="text" name="categoryID" value="{{ $Sup_Category->categoryID }}" >
        <input type="submit" value="update">
    </form> --}}
</body>
</html>
