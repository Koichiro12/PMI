 <!-- Left Sidebar -->
 <aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ auth()->user()->foto != '-' ? asset('uploads/'.auth()->user()->foto) : asset('assets/images/user.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</div>
            <div class="email">{{auth()->user()->email}}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{route('profile')}}"><i class="material-icons">person</i>Profile</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="{{route('logout')}}"  class="a-confirm"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">Master Data</li>
            <li {!!url()->current() == route('dashboard') || url()->current() == route('profile')  ? 'class="active"' : ''!!}>
                <a href="{{route('dashboard')}}">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li {!!url()->current() == route('biodata.index') ? 'class="active"' : ''!!}>
                <a href="{{route('biodata.index')}}">
                    <i class="material-icons">diversity_1</i>
                    <span>Biodata</span>
                </a>
            </li>
            <li {!!url()->current() == route('pmi.index') ? 'class="active"' : ''!!}>
                <a href="{{route('pmi.index')}}">
                    <i class="material-icons">contact_page</i>
                    <span>PMI</span>
                </a>
            </li>
            <li {!!url()->current() == route('keuangan.index') ? 'class="active"' : ''!!}>
                <a href="{{route('keuangan.index')}}">
                    <i class="material-icons">payments</i>
                    <span>Keuangan</span>
                </a>
            </li>
            <li class="header">Lainnya</li>
            <li {!!url()->current() == route('pengguna.index') ? 'class="active"' : ''!!}>
                <a href="{{route('pengguna.index')}}">
                    <i class="material-icons">group</i>
                    <span>Pengguna</span>
                </a>
            </li>
            <li>
                <a href="{{route('logout')}}"  class="a-confirm">
                    <i class="material-icons">input</i>
                    <span>Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; {{date('Y')}} <a href="javascript:void(0);">PE Engine Software</a>.
        </div>
        <div class="version">
            <b>Version: </b> BETA
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->