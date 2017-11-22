<!DOCTYPE html>
<html>

<head>
@include('layouts.admin_header')
</head>

<body class="theme-red">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
@include('layouts.admin_search_bar')
<!-- #END# Search Bar -->
<!-- Top Bar -->
@include('layouts.admin_top_bar')
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
@include('layouts.admin_user_info')
        <!-- #User Info -->
        <!-- Menu -->
@include('layouts.admin_left_side_menu')
        <!-- #Menu -->
        <!-- Footer -->
@include('layouts.admin_footer_section')
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
@include('layouts.admin_right_side_menu')
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        @yield('main_content')
    </div>
</section>
@include('layouts.admin_footer_link')

</body>

</html>