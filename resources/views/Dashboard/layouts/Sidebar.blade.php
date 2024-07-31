<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Halaket Wasl</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{route('dashboard')}}" class="nav-item nav-link <?php if($_SERVER['REQUEST_URI']=='/'){ echo 'active';} ?>"><i class="fa fa-tachometer-alt me-2"></i>   لوحة القيادة</a>
            <div class="nav-item dropdown">
                <a href="{{route('category.index')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-laptop me-2"></i>العناوين الرئيسيه</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{route('category.create')}}" class="dropdown-item">انشاء عناوين</a>
                    <a href="{{route('category.index')}}" class="dropdown-item">عرض عناوين</a>

                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-laptop me-2"></i>العناوين الفرعيه</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{route('Sup_category.create')}}" class="dropdown-item">انشاء عناوين فرعيه</a>
                    <a href="{{route('Sup_category.index')}}" class="dropdown-item">عرض عناوين فرعيه</a>

                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="{{route('News.index')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-laptop me-2"></i>الاخبار </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{route('News.create')}}" class="dropdown-item">انشاء اخبار</a>
                    <a href="{{route('News.index')}}" class="dropdown-item">عرض اخبار</a>

                </div>
            </div>

        </div>
    </nav>
</div>
