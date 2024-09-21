@include('assets.Components.Dashboard.header')
@include('assets.Components.Dashboard.page_loader')
@include('assets.Components.Dashboard.navbar')
<section>
    @include('assets.Components.Dashboard.sidebar')
</section>
<section class="content">
    @yield('content')
</section>

@include('assets.Components.Dashboard.footer')