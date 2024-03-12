<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
                {{-- <i class="fas fa-money-wink"></i> --}}
                <img width="50" height="50" src="https://img.icons8.com/ios/50/FFFFFF/coins--v1.png" alt="coins--v1"/>
            </div>
            <div class="sidebar-brand-text mx-3">KOOFARR</div>
        </a>

        <!-- Divider -->
        <hr <?= !(empty(session()->has('user'))) && session('user')->profile == 3 ? "" : "hidden" ?> class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active" <?= !(empty(session()->has('user'))) && session('user')->profile == 3 ? "" : "hidden" ?> >
            <a class="nav-link" href="http://127.0.0.1:8000/welcome">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Heading -->
        <div <?= !(empty(session()->has('user'))) && session('user')->profile == 3 ? "" : "hidden" ?> class="sidebar-heading">
            Menu
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li <?= !(empty(session()->has('user'))) && session('user')->profile == 3 ? "" : "hidden" ?> class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-dollar-sign fa-cog"></i>
                <span>Transfert d'argent</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                    <a class="collapse-item" href="{{route('foreigntransfert')}}">Vers un autre compte</a>
                    <a class="collapse-item" href="{{route('selftransfert')}}">Vers mon compte épargne</a>
                </div>
            </div>
        </li>

         <!-- Nav Item - Utilities Collapse Menu -->
        <li <?= !(empty(session()->has('user'))) && session('user')->profile == 3 ? "" : "hidden" ?> class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Cartes</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('newcard')}}">Nouvelle carte</a>
                    <a class="collapse-item" href="">Mes cartes</a>
                </div>
            </div>
        </li> 

        <!-- Divider -->
        {{-- <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="login.html">Login</a>
                    <a class="collapse-item" href="register.html">Register</a>
                    <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Other Pages:</h6>
                    <a class="collapse-item" href="404.html">404 Page</a>
                    <a class="collapse-item" href="blank.html">Blank Page</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block"> --}}

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


        <div class="sidebar-card d-none d-sm-flex">
            @php
                 use App\Models\AccountC;
                 $ribNumber=AccountC::where('idUser', session('user')->id)->get('ribNumber')
            @endphp
            <p class="text-center mb-2"><strong>{{$ribNumber[0]->ribNumber}}</strong> est votre numero RIB pour recevoir des dépôts</p>
        </div>

    </ul>
    <!-- End of Sidebar -->