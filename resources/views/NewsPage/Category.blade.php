
<!DOCTYPE html>
<html lang="en">


@include('NewsPage\Layouts\HeadNewsPage')


    <body >

        <!-- Brand Start -->

@include('NewsPage\Layouts\brandNewsPage')

        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="social mr-auto">
                            <a href="https://www.facebook.com/profile.php?id=61551355357222&mibextid=ZbWKwL"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/halaketwasl2023?igsh=MWRsdGgycnRxbDFvNg=="><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="navbar-nav ml-auto">

                                <a href="index.html" class="nav-item nav-link active">الصفحه الرئسية</a>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->

        <!-- Top News Start-->

        <!-- Top News End-->

        <!-- Category News Start-->
        @if ($News->currentPage()==1)

        <div class="cat-news">
            <div class="container">
                <div class="row">
                    @if (isset($SupCategory))

                    @foreach ($SupCategory as $TheSupCategory)
                    <div class="col-md-6">
                        <h2><a href="#">{{$TheSupCategory->title}}</a></h2>

                        <div class="row cn-slider">
                            {{-- @dd(TheSupCategory) --}}
                            @if (isset($TheSupCategory->News))

                            @foreach ($TheSupCategory->News as $TheNews)

                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img loading="lazy"  src="{{asset($TheNews->image_path)}}" />
                                    <div class="cn-title" >
                                        <a  href="/news/{{$TheNews->id}}">{{$TheNews->title}}</a>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            @endif
                        </div>

                    </div>

                    @endforeach
                    @endif

                </div>
            </div>
        </div>

        @endif

        <!-- Category News End-->

        <!-- Category News Start-->

        <!-- Category News End-->



        <!-- Main News Start-->
        <div  class="main-news mt-5">
            <div class="container">
                <div class="row">
                    <div  class="col-lg-12">
                    <h2  style="

                    direction:rtl;
                    color: #000000;
                    margin-bottom: 30px;
                    padding-bottom: 15px;
                    border-bottom: 3px double #000000;">الاخبار {{$category->title}}</h2>
                        <div class="row">
                            {{-- @dd($category->id) --}}
                            @if (isset($category->news))

                            @foreach ($category->news as $TheNews)

                            <div class="col-md-3 mb-4">
                                <div class="mn-img">
                                    <img loading="lazy" src="/{{$TheNews->image_path}}" />
                                        <div class="mn-title">
                                            <a href="/news/{{$TheNews->id}}">{{$TheNews->title}}</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif


                            </div>
                        </div>

                    </div>
                {{-- @if ($News->hasPages())
            <div class="pagination-wrapper" style="width:150px;	margin: auto;">
                 {{ $News->links() }}
            </div>
        @endif --}}
            </div>
        </div>
        <!-- Main News End-->

                <!-- Footer Start -->
                @include('NewsPage\Layouts\Footer')
                <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        @include('NewsPage\Layouts\JSScript')
    </body>
</html>
