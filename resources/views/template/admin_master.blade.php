@include('includes/admin/header')
@include('includes/admin/left_side')

@yield('content')

@include('sweetalert::alert')
@include('includes/admin/footer')