<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>العنواوين الرئيسيه</title>
    @include('Dashboard\layouts\HeadDashboard')

</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">


        @include('Dashboard\layouts\Spinner')
        @include('Dashboard\layouts\Sidebar')

        <div class="content">

            @include('Dashboard\layouts\Navbar')

<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">العنواوين الرئيسيه</h6>
    @if(Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}</p>
@endif
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>العنوان الرئيسي</th>
                    <th>تعديل</th>
                    <th>حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td> {{ $category->id}}</td>
                        <td> {{ $category->title}}</td>
                        <td>
                            <form  action="{{ route('category.delete',$category->id) }}" method="POST">
                                @csrf
                                {{-- <input type="hidden" name="category_id" value="{{ $category->id }}"> --}}
                                <button class="btn btn-primary"  type="submit">حذف</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('category.edit')}}" method="get">
                                    @csrf
                                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                                    <button class="btn btn-primary"  type="submit">تعديل</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('Dashboard\layouts\Footer')

@include('Dashboard\layouts\JSScript')
</body>
</html>
