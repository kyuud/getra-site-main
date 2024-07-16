{{-- INÍCIO DO MENU LATERAL DA PÁGINA --}}
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">
                <img style="display: block; margin-left: auto;margin-right: auto;width: 80%;"
                     src="{{url('Site/images/logonova-getra.png')}}" alt="logo">
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

            <li class="menu-header">Configurações do Site</li>

            <li class="">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i data-feather="globe"></i>
                    <span>Painel do Site</span>
                </a>
            </li>

            @can('system-companies')

                <li class="menu-header">Menu</li>

                @can('dashboard')
                    <li @if(isset($active) && $active == 'dashboard') class='active' @endif>
                        <a class="nav-link" href="{{ route('system.dashboard.index') }}">
                            <i data-feather="monitor"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endcan

                @can("acl")
                    <li class="dropdown
                    @if(isset($active) && ($active == 'financial' || $active == 'accountant') )
                        active
                    @endif">
                        <a href="#" class="nav-link has-dropdown">
                            <i data-feather="unlock"></i>
                            <span>Administrativo</span>
                        </a>
                        <ul class="dropdown-menu">

                            @can("financial")
                                <li @if(isset($active) && $active == 'financial') class='active' @endif>
                                    <a class="nav-link" href="{{route('financial.index')}}">
                                        <i data-feather="dollar-sign"></i>
                                        <span>Financeiro</span>
                                    </a>
                                </li>
                            @endcan
                            
                            @can("additionalexams")
                                <li @if(isset($active) && $active == 'additional-exams') class='active' @endif>
                                    <a class="nav-link" href="{{ route('additionalexams.index') }}">
                                        <i data-feather="file-text"></i>
                                        <span>Exames Adicionais</span>
                                    </a>
                                </li>
                            @endcan

                            @can("supplier")
                                <li @if(isset($active) && $active == 'supplier') class='active' @endif>
                                    <a class="nav-link" href="{{route('suppliers.index')}}">
                                        <i data-feather="pocket"></i>
                                        <span>Fornecedores</span>
                                    </a>
                                </li>
                            @endcan

                            @can("exams_list")
                            <li @if(isset($active) && $active == 'exam_list') class='active' @endif>
                                <a class="nav-link" href="{{route('exam_list.index')}}">
                                    <i data-feather="pocket"></i>
                                    <span>Lista de Exames</span>
                                </a>
                            </li>
                            @endcan

                            @can("Contadores")
                                <li @if(isset($active) && $active == 'accountant') class='active' @endif>
                                    <a class="nav-link" href="{{route('accountant.index')}}">
                                        <i data-feather="pocket"></i>
                                        <span>Contadores</span>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcan

                <li class="dropdown
                    @if(isset($active) && ($active == 'attendance' || $active == 'system-companies'||
                                           $active == 'doctors'    || $active == 'aso' ||
                                           $active == 'anamnese'   || $active == 'periodical' ||
                                           $active == 'screening'  || $active == 'employees') ) active
                    @endif">
                    <a href="#" class="nav-link has-dropdown">
                        <i data-feather="book-open"></i>
                        <span>Saúde</span>
                    </a>
                    <ul class="dropdown-menu">

                        @can("attendance")
                            <li @if(isset($active) && $active == 'attendance') class='active' @endif>
                                <a class="nav-link" href="{{route('attendance.index')}}">
                                    <i data-feather="clock"></i>
                                    Atendimento
                                </a>
                            </li>
                        @endcan

                        @can("system-companies")
                            <li @if(isset($active) && $active == 'system-companies') class='active' @endif>
                                <a class="nav-link" href="{{route('system-companies.index')}}">
                                    <i data-feather="book"></i>
                                    <span>Clientes</span>
                                </a>
                            </li>
                        @endcan

                        @can("employees")
                            <li @if(isset($active) && $active == 'employees') class='active' @endif>
                                <a class="nav-link" href="{{route('employees.index')}}">
                                    <i data-feather="user"></i>
                                    <span>Funcionários</span>
                                </a>
                            </li>
                        @endcan

                        @can("doctors")
                            <li @if(isset($active) && $active == 'doctors') class='active' @endif>
                                <a class="nav-link" href="{{route('doctors.index')}}">
                                    <i data-feather="award"></i>
                                    Médicos
                                </a>
                            </li>
                        @endcan

                        <li class="dropdown
                    @if(isset($active) && ($active == 'aso'       || $active == 'anamnese'||
                                           $active == 'screening' || $active == 'periodical') ) active
                    @endif">
                            <a href="#" class="nav-link has-dropdown">
                                <i data-feather="book-open"></i>
                                <span>Exames</span>
                            </a>
                            <ul class="dropdown-menu">

                                @can("aso")
                                    <li @if(isset($active) && $active == 'aso') class='active' @endif>
                                        <a class="nav-link" href="{{route('aso.index')}}">
                                            ASO
                                        </a>
                                    </li>
                                @endcan

                                @can("anamnese")
                                    <li @if(isset($active) && $active == 'anamnese') class='active' @endif>
                                        <a class="nav-link" href="{{route('anamnese.index')}}">
                                            Anamnese
                                        </a>
                                    </li>
                                @endcan

                                @can("screening")
                                    <li @if(isset($active) && $active == 'screening') class='active' @endif>
                                        <a class="nav-link" href="{{route('screening.index')}}">
                                            Triagem
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </li>

                    </ul>
                </li>

                @can("acl")
                    <li class="dropdown
                    @if(isset($active) && ($active == 'appraisal' || $active == 'training') )
                        active
                    @endif">
                        <a href="#" class="nav-link has-dropdown">
                            <i data-feather="unlock"></i>
                            <span>SST</span>
                        </a>
                        <ul class="dropdown-menu">

                            @can("training")
                                <li @if(isset($active) && $active == 'training') class='active' @endif>
                                    <a class="nav-link" href="{{route('training.index')}}">
                                        <i data-feather="target"></i>
                                        <span>Treinamentos</span>
                                    </a>
                                </li>
                            @endcan

                            @can("appraisal")
                                <li @if(isset($active) && $active == 'appraisal') class='active' @endif>
                                    <a class="nav-link" href="{{route('appraisal.index')}}">
                                        <i data-feather="pocket"></i>
                                        <span>Laudos</span>
                                    </a>
                                </li>
                            @endcan

                            @can("surveys")
                                <li @if(isset($active) && $active == 'surveys') class='active' @endif>
                                    <a class="nav-link" href="#">
                                        <i data-feather="pocket"></i>
                                        <span>Vistorias</span>
                                    </a>
                                </li>
                            @endcan

                            @can("Oversight")
                                <li @if(isset($active) && $active == 'Oversight') class='active' @endif>
                                    <a class="nav-link" href="#">
                                        <i data-feather="pocket"></i>
                                        <span>Fiscalização</span>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcan

            @endcan

            @can("acl")
                <li class="dropdown
                    @if(isset($active) && ($active == 'permissions'       || $active == 'roles' ||
                                           $active == 'permissions-roles' || $active == 'roles-users') )
                        active
                    @endif">
                    <a href="#" class="nav-link has-dropdown">
                        <i data-feather="unlock"></i>
                        <span>ACL</span>
                    </a>
                    <ul class="dropdown-menu">

                        @can("permission")
                            <li @if(isset($active) && $active == 'permissions') class='active' @endif>
                                <a class="nav-link" href="{{route('permissions.index')}}">
                                    Permissões
                                </a>
                            </li>
                        @endcan

                        @can("role")
                            <li @if(isset($active) && $active == 'roles') class='active' @endif>
                                <a class="nav-link" href="{{route('roles.index')}}">
                                    Papeis
                                </a>
                            </li>
                        @endcan

                        @can("permission-role")
                            <li @if(isset($active) && $active == 'permissions-roles') class='active' @endif>
                                <a class="nav-link" href="{{route('permissions-roles.index')}}">
                                    Permissões a Papeis
                                </a>
                            </li>
                        @endcan

                        @can("role-user")
                            <li @if(isset($active) && $active == 'roles-users') class='active' @endif>
                                <a class="nav-link" href="{{route('roles-users.index')}}">
                                    Papeis a Usuários
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can("user")
                <li class="dropdown @if(isset($active) && $active == 'users') active @endif">
                    <a class="nav-link" href="{{route('users.index')}}">
                        <i data-feather="users"></i>
                        <span>Usuários</span>
                    </a>
                </li>
            @endcan

            @can("log")
                <li @if(isset($active) && $active == 'logs') class='active' @endif>
                    <a class="nav-link" href="{{route('logs.index')}}">
                        <i data-feather="user-check"></i>
                        <span>Logs</span>
                    </a>
                </li>
            @endcan

            @can("trash")
                <li class="dropdown
                    @if(isset($active) &&
                            ($active == 'system-companies.trash' || $active == 'employees.trash' || $active == 'doctors.trash'   ||
                             $active == 'aso.trash' || $active == 'anamnese.trash'  || $active == 'screening.trash' ||
                             $active == 'periodical.trash' || $active == 'accountant.trash'))
                        active
                    @endif">
                    <a href="#" class="nav-link has-dropdown">
                        <i data-feather="trash"></i>
                        <span>Lixeira</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can("system-companies")
                            <li @if(isset($active) && $active == 'system-companies.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('system-companies.trash')}}">
                                    Empresas
                                </a>
                            </li>
                        @endcan

                        @can("user-trash")
                            <li @if(isset($active) && $active == 'users.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('users.trash')}}">
                                    Usuários
                                </a>
                            </li>
                        @endcan

                        @can("permission-trash")
                            <li @if(isset($active) && $active == 'permissions.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('permissions.trash')}}">
                                    Permissões
                                </a>
                            </li>
                        @endcan

                        @can("role-trash")
                            <li @if(isset($active) && $active == 'roles.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('roles.trash')}}">
                                    Papeis
                                </a>
                            </li>
                        @endcan

                        @can("permission-role-trash")
                            <li @if(isset($active) && $active == 'permissions-roles.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('permissions-roles.trash')}}">
                                    Permissões a Papeis
                                </a>
                            </li>
                        @endcan

                        @can("role-user-trash")
                            <li @if(isset($active) && $active == 'roles-users.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('roles-users.trash')}}">
                                    Papeis a Usuários
                                </a>
                            </li>
                        @endcan

                        @can("employees-trash")
                            <li @if(isset($active) && $active == 'employees.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('employees.trash')}}">
                                    Funcionários
                                </a>
                            </li>
                        @endcan

                        @can("doctors-trash")
                            <li @if(isset($active) && $active == 'doctors.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('doctors.trash')}}">
                                    Médicos
                                </a>
                            </li>
                        @endcan

                        @can("financial-trash")
                            <li @if(isset($active) && $active == 'financial.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('financial.trash')}}">
                                    Financeiro
                                </a>
                            </li>
                        @endcan

                        @can("accountant-trash")
                            <li @if(isset($active) && $active == 'accountant.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('accountant.trash')}}">
                                    Contadores
                                </a>
                            </li>
                        @endcan

                        @can("training-trash")
                            <li @if(isset($active) && $active == 'training.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('training.trash')}}">
                                    Treinamento
                                </a>
                            </li>
                        @endcan

                        @can("appraisal-trash")
                            <li @if(isset($active) && $active == 'appraisal.trash') class='active' @endif>
                                <a class="nav-link" href="{{route('appraisal.trash')}}">
                                    Laudo
                                </a>
                            </li>
                        @endcan

                        <li class="dropdown
                            @if(isset($active) && ($active == 'aso.trash'       || $active == 'anamnese.trash'||
                                                $active == 'screening.trash' || $active == 'periodical.trash') )
                                active
                            @endif">
                            <a href="#" class="nav-link has-dropdown">
                                <span>Exames</span>
                            </a>
                            <ul class="dropdown-menu">

                                @can("aso-trash")
                                    <li @if(isset($active) && $active == 'aso.trash') class='active' @endif>
                                        <a class="nav-link" href="{{route('aso.trash')}}">
                                            ASO
                                        </a>
                                    </li>
                                @endcan

                                @can("anamnese-trash")
                                    <li @if(isset($active) && $active == 'anamnese.trash') class='active' @endif>
                                        <a class="nav-link" href="{{route('anamnese.trash')}}">
                                            Anamnese
                                        </a>
                                    </li>
                                @endcan

                                @can("screening-trash")
                                    <li @if(isset($active) && $active == 'screening.trash') class='active' @endif>
                                        <a class="nav-link" href="{{route('screening.trash')}}">
                                            Triagem
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </li>

                        <br/>
                        <br/>

                    </ul>
                </li>
            @endcan

        </ul>

    </aside>
</div>
{{-- FIM DO MENU LATERAL DA PÁGINA --}}
