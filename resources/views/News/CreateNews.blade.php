<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create News</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

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
                <h6 class="mb-4">Horizontal Form</h6>
                <div ></div>



                <form action="{{ route('News.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">العنوان</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" placeholder="title" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">المحتوي</label>
                        <div class="col-sm-10">
                            <textarea id="summernote" name="content"  class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">الكلمات الداله</label>
                        <div class="col-sm-10">
                            <input type="text" name="keyWords" placeholder="keyWords" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">timeReading</label>
                        <div class="col-sm-10">
                            <input  type="text" name="timeReading" placeholder="timeReading" class="form-control" id="inputPassword3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">اختار الصوره</label>
                        <div class="col-sm-10">
                            <input class="form-control bg-dark" name="image_path" placeholder="image_path"  type="file" id="formFile">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">اختار العنوان الرئيسي</label>
                        <div class="col-sm-10">
                            <select id="category" name="categoryID" placeholder="category" class="form-select mb-3" aria-label="Default select example">
                                <option value="" disabled selected>اختار العنوان الرئيسي</option>
                                @foreach ($categories as $Category)
                                <option value="{{$Category->id}}">{{$Category->title}}</option>
                                 @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">اختارالعنوان الفرعي</label>
                        <div class="col-sm-10">
                            <select id="SupCategory" name="supCategoryID" placeholder="supCategoryID" class="form-select mb-3" aria-label="Default select example">

                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">اضافه خبر </button>
                </form>
            </div>
    </form>
    <script>
        $('#summernote').summernote({
        placeholder: 'Write the content...',
        tabsize: 2,
        height: 100
      });
      </script>
    <script type="text/javascript">
     $(document).ready(function() {
    $('#category').on('change', function() {
        var categoryID = $(this).val(); // Corrected to get the value of the selected option
        console.log(categoryID);

        $('#SupCategory').html(''); // Clear the existing options in #SupCategory dropdown

        $.ajax({
            url: '{{ route('News.getSup_Categories') }}', // Use proper route syntax
            type: 'GET',
            data: {
                category_id: categoryID // Pass category_id as a parameter
            },
            success: function(SupCategories) {
                $('#SupCategory').html('<option value="">اختارالعنوان الفرعي</option>'); // Set initial prompt text

                // Loop through each SupCategory and append to #SupCategory dropdown
                $.each(SupCategories, function(key, value) {
                    $('#SupCategory').append('<option value="' + value.id + '">' + value.title + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error(error); // Handle any errors in the AJAX request
            }
        });
    });
});
    </script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    @include('Dashboard\layouts\Footer')
    @include('Dashboard\layouts\JSScript')
</body>
</html>
