{{-- INÍCIO DO MENU LATERAL DA PÁGINA --}}
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">
                <img style="display: block; margin-left: auto;margin-right: auto;width: 80%;"
                     src="{{url('painel/images/logonova-getra.png')}}"
                     alt="logo">
                <span class="logo-name"></span>
            </a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-picture">
                <img alt="image" src="{{url('uploads/users\/') . Auth::user()->image}}">
            </div>
            <div class="sidebar-user-details">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-role">{{Auth::user()->roles[0]->label}}</div>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Acesso ao Sistema</li>
            <li>
                <a href="{{ route('system.dashboard.index') }}" class="nav-link">
                    <i data-feather="grid"></i>
                    <span>Sistema</span>
                </a>
            </li>

            <li class="menu-header">Menu (site)</li>

            @can("dashboard")
                <li @if(isset($active) && $active == 'dashboard') class='active' @endif>
                    <a class="nav-link" href="{{ route('dashboard.index') }}">
                        <i data-feather="monitor"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endcan

            @can("banner")
                <li @if(isset($active) && $active == 'banners') class='active' @endif>
                    <a class="nav-link" href="{{route('banners.index')}}">
                        <i data-feather="folder"></i>
                        <span>Banners</span>
                    </a>
                </li>
            @endcan

            @can("service")
                <li @if(isset($active) && $active == 'services') class='active' @endif>
                    <a class="nav-link" href="{{route('services.index')}}">
                        <i data-feather="folder"></i>
                        <span>Serviços</span>
                    </a>
                </li>
            @endcan

            @can("funfact")
                <li @if(isset($active) && $active == 'funfacts') class='active' @endif>
                    <a class="nav-link" href="{{route('funfacts.index')}}">
                        <i data-feather="folder"></i>
                        <span>Fatos interessantes</span>
                    </a>
                </li>
            @endcan

            @can("portfolio")
                <li @if(isset($active) && $active == 'portfolios') class='active' @endif>
                    <a class="nav-link" href="{{route('portfolios.index')}}">
                        <i data-feather="folder"></i>
                        <span>Portfolio</span>
                    </a>
                </li>
            @endcan

            @can("team")
                <li @if(isset($active) && $active == 'teams') class='active' @endif>
                    <a class="nav-link" href="{{route('teams.index')}}">
                        <i data-feather="folder"></i>
                        <span>Equipe</span>
                    </a>
                </li>
            @endcan

            @can("blog")
                <li @if(isset($active) && $active == 'blogs') class='active' @endif>
                    <a class="nav-link" href="{{route('blogs.index')}}">
                        <i data-feather="folder"></i>
                        <span>Blog</span>
                    </a>
                </li>
            @endcan

            @can("unit")
                <li @if(isset($active) && $active == 'units') class='active' @endif>
                    <a class="nav-link" href="{{route('units.index')}}">
                        <i data-feather="folder"></i>
                        <span>Unidades</span>
                    </a>
                </li>
            @endcan

            @can("company")
                <li @if(isset($active) && $active == 'companies') class='active' @endif>
                    <a class="nav-link" href="{{route('companies.index')}}">
                        <i data-feather="folder"></i>
                        <span>Empresa</span>
                    </a>
                </li>
            @endcan

            @can("trash")
                <li class="dropdown
                @if(isset($active) &&
                        ($active == 'banners.trash' || $active == 'users.trash' || $active == 'permissions.trash' ||
                        $active == 'roles.trash' || $active == 'permissions-roles.trash' || $active == 'roles-users.trash' ||
                        $active == 'services.trash' || $active == 'funfacts.trash' || $active == 'portfolios.trash' ||
                        $active == 'teams.trash' || $active == 'blogs.trash' || $active == 'companies.trash' ||
                        $active == 'units.trash'))
                    active
                @endif">
                    <a href="#" class="nav-link has-dropdown">
                        <i data-feather="trash"></i>
                        <span>Lixeira</span>
                    </a>
                    <ul class="dropdown-menu">

                        @can("banner-trash")
                            <li @if(isset($active) && $active == 'banners.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('banners.trash')}}">
                                    Banners
                                </a>
                            </li>
                        @endcan

                        @can("service-trash")
                            <li @if(isset($active) && $active == 'services.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('services.trash')}}">
                                    Serviços
                                </a>
                            </li>
                        @endcan

                        @can("funfacts-trash")
                            <li @if(isset($active) && $active == 'funfacts.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('funfacts.trash')}}">
                                    Fatos interessantes
                                </a>
                            </li>
                        @endcan

                        @can("portfolio-trash")
                            <li @if(isset($active) && $active == 'portfolios.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('portfolios.trash')}}">
                                    Portfolios
                                </a>
                            </li>
                        @endcan

                        @can("team-trash")
                            <li @if(isset($active) && $active == 'teams.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('teams.trash')}}">
                                    Equipe
                                </a>
                            </li>
                        @endcan

                        @can("blog-trash")
                            <li @if(isset($active) && $active == 'blogs.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('blogs.trash')}}">
                                    Blog
                                </a>
                            </li>
                        @endcan

                        @can("unit-trash")
                            <li @if(isset($active) && $active == 'units.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('units.trash')}}">
                                    Unidades
                                </a>
                            </li>
                        @endcan

                        @can("company-trash")
                            <li @if(isset($active) && $active == 'companies.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('companies.trash')}}">
                                    Empresa
                                </a>
                            </li>
                        @endcan

                        <br/>
                        <br/>

                    </ul>
                </li>
            @endcan
        </ul>

    </aside>
</div>
{{-- FIM DO MENU LATERAL DA PÁGINA --}}
