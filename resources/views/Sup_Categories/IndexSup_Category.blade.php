<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>عرض العناوين الفرعيه</title>
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
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Responsive Table</h6>
                <div class="table-responsive">
                    @if(Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان الفرعي</th>
                                <th>العنوان الرئيسي</th>
                                <th>حذف</th>
                                <th>تعديل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Sup_Categories as $Sup_category)
                            <tr>
                                <td> {{ $Sup_category->id}}</td>
                                <td> {{ $Sup_category->title}}</td>
                                <td> {{ $Sup_category->category->title}}</td>
                                <td>
                                    <form  action="{{ route('Sup_category.delete',$Sup_category->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">حذف</button>
                                    </form>
                                </td>
                                <td>
                                      <form action="{{ route('Sup_category.edit')}}" method="get">
                                        @csrf
                                         <input type="hidden" name="Sup_category" value="{{ $Sup_category->id }}">
                                        <button class="btn btn-primary" type="submit">تعديل</button>
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
