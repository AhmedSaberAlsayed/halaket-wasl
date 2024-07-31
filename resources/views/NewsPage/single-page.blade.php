<!DOCTYPE html>
<html lang="en">
    @include('NewsPage\Layouts\HeadNewsPage')


    <body>


        <!-- Brand Start -->
        @include('NewsPage\Layouts\brandNewsPage')

        <!-- Brand End -->

        <!-- Nav Bar Start -->
        @include('NewsPage\Layouts\navNewsPage')

        <!-- Nav Bar End -->

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('NewsPage.index')}}">الصفحه الرئسيه</a></li>
                    <li class="breadcrumb-item"><a href="{{route('NewsPage.index')}}">{{$news->category->title}}</a></li>
                    <li class="breadcrumb-item active">{{$news->title}}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        {{-- @dd($news->image_path) --}}
        <!-- Single News Start-->
        <div class="single-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="sn-container">
                            <div class="sn-img">
                                <img src="/{{$news->image_path}}" style="width: 600px"/>
                            </div>
                            <div class="sn-content" >
                                {{$news->content}}
                            </div>
                        </div>
                        <div class="sn-related">
                            <h2>المزيد في {{$news->category->title}}</h2>
                            <div class="row sn-slider">
                                @foreach ($AnotherNewsInThisCategory as $TheNews)

                                <div class="col-md-4">
                                    <div class="sn-img">
                                        <img src="/{{$TheNews->image_path}}" />
                                        <div class="sn-title">
                                            <a href="/news/{{$TheNews->id}}">{{$TheNews->title}}</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <h2 class="sw-title">ايضا في {{$news->category->title}}</h2>
                                <div class="news-list">
                                    @foreach ($NewsInThisCategory as $TheNews)

                                    <div class="nl-item">
                                        <div class="nl-img">
                                            {{-- @dd($TheNews) --}}
                                            <img src="/{{$TheNews->image_path}}" />
                                        </div>
                                        <div class="nl-title">
                                            <a href="/news/{{$TheNews->id}}">{{$TheNews->title}}</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>






                            <div class="sidebar-widget">
                                <h2 class="sw-title">اخبار الاقسام</h2>
                                <div class="category">
                                    <ul>

                                        @foreach ($AllCategory as $TheCategory)

                                        <li><a href="/category/{{$TheCategory->id}}">{{$TheCategory->title}}</a>
                                            {{-- <span>({{$TheCategory->News->count()}}) --}}
                                                </span></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>



                            <div class="sidebar-widget">
                                <h2 class="sw-title">Tags Cloud</h2>
                                <div class="tags">
                                    <a href="">National</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single News End-->

        <!-- Footer Start -->
        @include('NewsPage\Layouts\Footer')

        <!-- Footer End -->




        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        @include('NewsPage\Layouts\JSScript')
    </body>
</html>
