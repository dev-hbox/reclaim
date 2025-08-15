@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <!-- content @s
        -->
        <div class="nk-content nk-content-fluid">
            <div class="container-xl wide-xl">
                <div class="nk-content-body">
                    @include('partials._response')
                    <div class="nk-block-head nk-page-head nk-block-head-sm">
                        <div class="nk-block-head-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Welcome Back! {{ Auth::user()->profile->name ?? '' }}</h3>
                            </div>
                        </div>
                    </div><!-- .nk-page-head -->
                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-sm-6 col-xxl-3">
                                <div class="card card-full bg-primary">
                                    <div class="card-inner">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div class="fs-6 text-white text-opacity-75 mb-0">Users Available</div>
                                            <a href="{{ route('users') }}" class="link link-white">See All</a>
                                        </div>
                                        <h5 class="fs-1 text-white">{{ $users->count() }} <small class="fs-3">Users</small>
                                        </h5>

                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-sm-6 col-xxl-3">
                                <div class="card card-full bg-warning is-dark">
                                    <div class="card-inner">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div class="fs-6 text-white text-opacity-75 mb-0">Daily Affirms</div>
                                            <a href="{{ route('affirmations') }}" class="link link-white">See All</a>
                                        </div>
                                        <h5 class="fs-1 text-white">{{ $affirms->count() }} <small
                                                class="fs-3">Affirms</small></h5>

                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-sm-6 col-xxl-3">
                                <div class="card card-full bg-info is-dark">
                                    <div class="card-inner">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div class="fs-6 text-white text-opacity-75 mb-0">Total Lessons</div>
                                            <a href="{{ route('lessons') }}" class="link link-white">See All</a>
                                        </div>
                                        <h5 class="fs-1 text-white">{{ $lessons->count() }} <small
                                                class="fs-3">lessons</small></h5>

                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-sm-6 col-xxl-3">
                                <div class="card card-full bg-danger is-dark">
                                    <div class="card-inner">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div class="fs-6 text-white text-opacity-75 mb-0">Total Posts</div>
                                            <a href="{{ route('posts') }}" class="link link-white">All Posts</a>
                                        </div>
                                        <h5 class="fs-1 text-white">{{ $posts->count() }} <small class="fs-3">Posts</small>
                                        </h5>

                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .nk-block -->

                    <div class="nk-block-head">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Recent Users</h4>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{ route('users') }}" class="link"><span>See All</span> <em
                                        class="icon ni ni-chevron-right"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card">
                            <table class="table">
                                <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="did-all">
                                                <label class="custom-control-label" for="did-all"></label>
                                            </div>
                                        </th>
                                        <th class="nk-tb-col">
                                            <h6 class="overline-title">Name</h6>
                                        </th>
                                        <th class="nk-tb-col tb-col-sm">
                                            <h6 class="overline-title">Gender</h6>
                                        </th>
                                        <th class="nk-tb-col tb-col-md">
                                            <h6 class="overline-title">Registered At</h6>
                                        </th>
                                        <th class="nk-tb-col tb-col-md">
                                            <h6 class="overline-title">Status</h6>
                                        </th>
                                        <th class="nk-tb-col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="did-01">
                                                    <label class="custom-control-label" for="did-01"></label>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="caption-text">{{ $user->profile->name ?? '' }}</div>
                                            </td>
                                            <td class="nk-tb-col tb-col-sm">
                                                <div class="badge badge-dim bg-dark rounded-pill">
                                                    {{ ucfirst($user->profile->gender ?? '') }}</div>
                                            </td>



                                            <td class="nk-tb-col tb-col-md">
                                                <div class="sub-text d-inline-flex flex-wrap gx-2">

                                                    {{ \Carbon\Carbon::parse($user->created_at)->format('jS F Y') }}
                                                </div>
                                            </td>


                                            <td class="nk-tb-col tb-col-sm">
                                                <div class="badge badge-dim bg-dark rounded-pill">
                                                    @if ($user->status == 1)
                                                        <span class="tb-status text-success">Active</span>
                                                    @else
                                                        <span class="tb-status text-danger">Inactive</span>
                                                    @endif

                                            </td>
                                            <td class="nk-tb-col tb-col-end">
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-icon btn-trigger me-n1" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <em class="icon ni ni-more-h"></em>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <div class="dropdown-content">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li>
                                                                    <a href="{{ url('admin/user-detail/' . $user->id) }}"><em
                                                                            class="icon ni ni-eye"></em><span>View
                                                                            profile</span></a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr><!-- .nk-tb-item -->
                                    @endforeach


                                </tbody>
                            </table>
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
        <!-- content @e -->
    @endsection
