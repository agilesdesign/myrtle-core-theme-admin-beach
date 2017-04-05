<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/public/assets/themes/admin/beach/css/app.css">
        <style>
            .tab-content .tab-pane span.select2 {
                width: 100% !important;
            }
        </style>

        <title>{{ Config::get('app.name') }}</title>

    </head>
    <body>
        <main id="main">
            <aside class="hidden-md-down">
                <div id="sidebar">
                    <div class="header">
                        <div class="pt-1 pb-1">
                            <h4 id="logo" class="text-xs-center">
                                <a href="{{ route('admin.frontpage') }}">
                                    <span class="brand">Myrtle</span>
                                    <span class="product tag tag-warning">WMS</span>
                                </a>
                            </h4>
                        </div>
                    </div>
                    @include('admin::blocks.menus.sidebar.index')
                </div>
            </aside>
            <section id="app">
                <header id="utility-header">
                    <nav class="navbar navbar-light">
                        <div class="container-fluid"></div>
                        <div class="row">
                            <div class="col-xs-7" style="display: flex; align-items: center;">
                                @yield('search')
                            </div>
                            <div class="col-xs-5">
                                <ul class="user-utilities nav navbar-nav pull-right">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <span class="fa-stack notification{!! Auth::user()->notifications->isNotEmpty() ?? ' has-badge' !!}">
                                                <i class="fa fa-stack-1x fa-bell"></i>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="hidden-sm-up">
                                                <i class="fa fa-fw fa-user"></i>
                                            </span>
                                            <div class="hidden-xs-" style="display: inline-flex;">
                                                <div class="avatar circle">
                                                    <span class="initials">{{ Auth::user()->name->firstInitial }}</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('admin.users.show', Auth::user()) }}" class="dropdown-item">
                                                <i class="fa fa-fw fa-user"></i>
                                                Account
                                            </a>
                                            <a href="{{ route('logout') }}" class="dropdown-item">
                                                <i class="fa fa-fw fa-sign-out"></i>
                                                Logout
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
                <article id="app-main">
                    <header id="main-header" class="bg-faded">
                        <div class="navbar navbar-light">
                            <div class="row">
                                <div class="col-xs-5">
                                    <h2 id="page-title">
                                        @yield('page-title')
                                    </h2>
                                    <h6 id="page-description">
                                        @yield('page-description')
                                    </h6>
                                </div>
                                <div class="col-xs-7">
                                    @yield('main-header-support')
                                </div>
                            </div>
                        </div>
                    </header>
                    <header id="support-header" class="bg-faded">
                        <div class="navbar navbar-light">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    @hasSection('breadcrumbs')
                                        <nav class="breadcrumb">
                                            <a href="{{ route('admin.frontpage') }}" class="breadcrumb-item"><i class="fa fa-fw fa-home"></i></a>
                                            @yield('breadcrumbs')
                                        </nav>
                                    @endHasSection
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 text-md-right">
                                    <div id="toolbar" class="btn-group btn-group btn-group-sm mt-0">
                                        @yield('toolbar')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div id="dock" class="container-fluid mt-2 mb-2">
                        <div class="row">
                            <div class="col-xs-12">
                                @yield('dock')
                            </div>
                        </div>
                    </div>
                    <div id="app-pagination">
                        @yield('pagination')
                    </div>

                    <div id="debug">
                        @include('admin::blocks.debug.index')
                    </div>
                </article>
                <footer>
                </footer>
            </section>
        </main>

        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDTkfGgisVi5xHDauWZvTFKv2h2MmnaUXc&libraries=places"></script>
        <script src="/public/assets/themes/admin/beach/js/app.js"></script>

        <script>
            $(function(){
                $('.select2').select2();
                $('[data-toggle="tooltip"]').tooltip();

                @foreach($alerts->messages() as $level => $alert)
                    @foreach($alert as $message)
                         notie.alert(
                            "@if($level == 'danger'){{ 'error' }}@else{{ $level }}@endif",
                            "{{ $message }}",
                            2
                        );
                    @endforeach
                @endforeach
            });

        </script>

        @stack('scripts')
    </body>
</html>
