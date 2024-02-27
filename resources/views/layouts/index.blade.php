@extends('layouts.app')

@section('content')
    <div class="container-fluid m-0">
        <div class="row ">
            {{-- sidebar --}}
            <div class="col-2  bg-dark ">
                <div class="container-fluid vh-100">
                    <div class="row py-3">
                        <div class="col pt-3 ">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    {{ Route::currentRouteName() }}
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="nav-link text-white p-0 {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }} height_link">
                                        <i class="fa-solid fa-tachometer-alt fa-lg fa-fw mx-1"></i>Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.projects.index') }}"
                                        class="nav-link text-white p-0 mt-3 {{ Route::currentRouteName() == 'admin.projects.index' ? 'bg-secondary' : '' }} height_link">
                                        <i class="fa-solid fa-newspaper fa-lg fa-fw mx-1"></i>Projects
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                @yield('admin')
            </div>
        </div>
    </div>
@endsection
