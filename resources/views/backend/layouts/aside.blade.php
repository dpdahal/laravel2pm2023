@section('aside')
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{route('dashboard')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-admin" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>Admins</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('admin.create')}}">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.index')}}">
                            <i class="bi bi-circle"></i><span>Show</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-category" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-folder"></i><span>Category</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-category" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('admin-category.create')}}">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin-category.index')}}">
                            <i class="bi bi-circle"></i><span>Show</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-news" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-folder"></i><span>News</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-news" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('admin-news.create')}}">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin-news.index')}}">
                            <i class="bi bi-circle"></i><span>Show</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-person"></i>
                    <span>Settings</span>
                </a>
            </li><!-- End Profile Page Nav -->


        </ul>

    </aside><!-- End Sidebar-->

@endsection
