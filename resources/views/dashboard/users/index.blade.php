@extends('layouts.main')
@section('content')
    <!-- content @s
        -->
        <div class="nk-content nk-content-fluid">
            <div class="container-xl wide-xl">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        @include('partials._response')
                        <div class="nk-block-between">

                            <div class="nk-block-head-content">

                                <h3 class="nk-block-title page-title">Users Lists </h3>
                                <div class="nk-block-des text-soft">
                                    <p>You have total  <span
                                        class="badge badge-light text-muted">{{ $users->total() }} </span> users. </p>
                                </div>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                        data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                    {{-- <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li><a href="#" class="btn btn-white btn-outline-light"><em
                                                        class="icon ni ni-download-cloud"></em><span>Export</span></a></li>
                                            <li class="nk-block-tools-opt">
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-primary"
                                                        data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><span>Add User</span></a></li>
                                                            <li><a href="#"><span>Add Team</span></a></li>
                                                            <li><a href="#"><span>Import User</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> --}}
                                </div><!-- .toggle-wrap -->
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card card-stretch">
                            <div class="card-inner-group">
                                <div class="card-inner position-relative card-tools-toggle">
                                    <div class="card-title-group">
                                        <div class="card-tools">

                                        </div><!-- .card-tools -->
                                        <div class="card-tools me-n1">
                                            <ul class="btn-toolbar gx-1">
                                                <li>
                                                    <a href="#" class="btn btn-icon search-toggle toggle-search"
                                                        data-target="search"><em class="icon ni ni-search"></em></a>
                                                </li><!-- li -->
                                                <li class="btn-toolbar-sep"></li><!-- li -->

                                            </ul><!-- .btn-toolbar -->
                                        </div><!-- .card-tools -->
                                    </div><!-- .card-title-group -->
                                    <div class="card-search search-wrap" data-search="search">
                                        <div class="card-body">
                                            <div class="search-content">
                                                <a href="#" class="search-back btn btn-icon toggle-search"
                                                    data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                <input type="text" class="form-control border-transparent form-focus-none"
                                                    placeholder="Search by user or email">
                                                <button class="search-submit btn btn-icon"><em
                                                        class="icon ni ni-search"></em></button>
                                            </div>
                                        </div>
                                    </div><!-- .card-search -->
                                </div><!-- .card-inner -->
                                <div class="card-inner p-0">
                                    <div class="nk-tb-list nk-tb-ulist">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid">
                                                    <label class="custom-control-label" for="uid"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col"><span class="sub-text">User</span></div>
                                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Gender</span></div>
                                            <div class="nk-tb-col tb-col-md"><span class="sub-text">Age</span></div>
                                            <div class="nk-tb-col tb-col-lg"><span class="sub-text">Verified</span></div>
                                            <div class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></div>
                                            <div class="nk-tb-col nk-tb-col-tools text-end">
                                                {{-- <div class="dropdown">
                                                            <a href="#" class="btn btn-xs btn-outline-light btn-icon dropdown-toggle" data-bs-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-plus"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                                <ul class="link-tidy sm no-bdr">
                                                                    <li>
                                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" checked="" id="bl">
                                                                            <label class="custom-control-label" for="bl">Balance</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" checked="" id="ph">
                                                                            <label class="custom-control-label" for="ph">Phone</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="vri">
                                                                            <label class="custom-control-label" for="vri">Verified</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="st">
                                                                            <label class="custom-control-label" for="st">Status</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div> --}}
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        @foreach ($users as $user)
                                            <div class="nk-tb-item">

                                                <div class="nk-tb-col nk-tb-col-check">
                                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                                        <input type="checkbox" class="custom-control-input" id="uid1">
                                                        <label class="custom-control-label" for="uid1"></label>
                                                    </div>
                                                </div>

                                                <div class="nk-tb-col">
                                                    <a href="{{ url('admin/user-detail/' . $user->id) }}">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-primary">
                                                                <span>
                                                                    <img src="{{ asset($user->profile->avatar ?? '') }}"
                                                                        alt="{{ $user->profile->name ?? '' }}">
                                                                </span>


                                                            </div>
                                                            <div class="user-info">
                                                                <span class="tb-lead">
                                                                    {{ $user->profile->name ?? '' }} <span
                                                                        class="dot dot-success d-md-none ms-1"></span></span>
                                                                <span>{{ $user->email ?? '' }}</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="nk-tb-col tb-col-mb">
                                                    <span>{{ ucfirst($user->profile->gender ?? '') }}</span>
                                                </div>

                                                <div class="nk-tb-col tb-col-md">
                                                    <span>{{ ucfirst($user->profile->age ?? '') }}</span>
                                                </div>


                                                <div class="nk-tb-col tb-col-lg">
                                                    <ul class="list-status">
                                                        <li>
                                                            @if ($user->otp_status == 1)
                                                                <em class="icon text-success ni ni-check-circle"></em>
                                                            @else
                                                                <em class="icon text-danger ni ni-cross-circle"></em>
                                                            @endif
                                                            <span>Email</span>
                                                        </li>
                                                        <li>
                                                            <em class="icon ni ni-alert-circle"></em>
                                                            <span>KYC</span>
                                                        </li>
                                                    </ul>
                                                </div>


                                                <div class="nk-tb-col tb-col-md">
                                                    @if ($user->status == 1)
                                                        <span class="tb-status text-success">Active</span>
                                                    @else
                                                        <span class="tb-status text-danger">Inactive</span>
                                                    @endif
                                                </div>

                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#"
                                                                    class="dropdown-toggle btn btn-icon btn-trigger"
                                                                    data-bs-toggle="dropdown"><em
                                                                        class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">

                                                                        <li><a
                                                                                href="{{ url('admin/user-detail/' . $user->id) }}"><em
                                                                                    class="icon ni ni-eye"></em><span>View
                                                                                    Details</span></a></li>

                                                                        <li>
                                                                            @if ($user->status == 1)
                                                                                <a
                                                                                    href="{{ url('admin/user-status/' . $user->id) }}">
                                                                                    <em class="icon ni ni-na"></em>
                                                                                    <span>Suspend User</span>
                                                                                </a>
                                                                            @else
                                                                                <a
                                                                                    href="{{ url('admin/user-status/' . $user->id) }}">
                                                                                    <em class="icon ni ni-check-circle"></em>
                                                                                    <span>Activate User</span>
                                                                                </a>
                                                                            @endif
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <!-- .nk-tb-item -->
                                        @endforeach

                                    </div><!-- .nk-tb-list -->
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="nk-block-between-md g-3">
                                        <div class="g">
                                            <ul class="pagination justify-content-center justify-content-md-start">
                                                {{-- Previous Page Link --}}
                                                @if ($users->onFirstPage())
                                                    <li class="page-item disabled">
                                                        <span class="page-link">Prev</span>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $users->previousPageUrl() }}">Prev</a>
                                                    </li>
                                                @endif

                                                {{-- Pagination Elements --}}
                                                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                                    <li
                                                        class="page-item {{ $users->currentPage() == $page ? 'active' : '' }}">
                                                        <a class="page-link"
                                                            href="{{ $url }}">{{ $page }}</a>
                                                    </li>
                                                @endforeach

                                                {{-- Next Page Link --}}
                                                @if ($users->hasMorePages())
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a>
                                                    </li>
                                                @else
                                                    <li class="page-item disabled">
                                                        <span class="page-link">Next</span>
                                                    </li>
                                                @endif
                                            </ul><!-- .pagination -->
                                        </div>

                                        <div class="g">
                                            <div
                                                class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                                <div>Page</div>
                                                <div>
                                                    <select class="form-select js-select2" data-search="on"
                                                        data-dropdown="xs center"
                                                        onchange="window.location.href = this.value">
                                                        @for ($i = 1; $i <= $users->lastPage(); $i++)
                                                            <option value="{{ $users->url($i) }}"
                                                                {{ $users->currentPage() == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div>OF {{ $users->lastPage() }}</div>
                                            </div>
                                        </div><!-- .pagination-goto -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .card-inner -->

                            </div><!-- .card-inner-group -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
        <!-- content @e -->
    @endsection
