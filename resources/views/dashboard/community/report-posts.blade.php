@extends('layouts.main')
@section('title', 'Reported Posts')
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

                                <h3 class="nk-block-title page-title">Reported Posts </h3>
                                <div class="nk-block-des text-soft">
                                    <p>You have total <span class="badge badge-light text-muted">{{ $reports->total() }} </span>
                                        reports. </p>
                                </div>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                        data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>

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
                                                    placeholder="Search by report or email">
                                                <button class="search-submit btn btn-icon"><em
                                                        class="icon ni ni-search"></em></button>
                                            </div>
                                        </div>
                                    </div><!-- .card-search -->
                                </div><!-- .card-inner -->
                                <div class="card-inner p-0">
                                    <div class="nk-tb-list nk-tb-ulist">
                                        <div class="nk-tb-item nk-tb-head">

                                            <div class="nk-tb-col"><span class="sub-text">Reported By</span></div>
                                            <div class="nk-tb-col"><span class="sub-text">Reason</span></div>
                                            <div class="nk-tb-col"><span class="sub-text">Reported Post</span></div>
                                            <div class="nk-tb-col"><span class="sub-text">Post Owner</span></div>
                                            <div class="nk-tb-col"><span class="sub-text">Status</span></div>
                                            <div class="nk-tb-col"><span class="sub-text">Reported At</span></div>
                                            <div class="nk-tb-col nk-tb-col-tools text-end">Action</div>
                                        </div><!-- .nk-tb-item -->

                                        @foreach ($reports as $report)
                                            <div class="nk-tb-item">


                                                <!-- Reported By -->

                                                <div class="nk-tb-col">
                                                    <a href="{{ url('admin/user-detail/' . $report['reported_by']['id']) }}">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-primary">
                                                                <span>
                                                                    <img src="{{ asset($report['reported_by']['profile']['avatar'] ?? 'uploads/profile/user-default.png') }}"
                                                                        alt="{{ $report['reported_by']['profile']['name'] ?? '' }}">
                                                                </span>


                                                            </div>
                                                            <div class="user-info">
                                                                <span class="tb-lead">
                                                                    {{ $report['reported_by']['profile']['name'] ?? '' }} <span
                                                                        class="dot dot-success d-md-none ms-1"></span></span>
                                                                <span> {{ $report['reported_by']['email'] ?? '' }}</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>



                                                <!-- Reason -->
                                                <div class="nk-tb-col">
                                                    <span>{{ $report['reason'] ?? '-' }}</span>
                                                </div>

                                                <!-- Reported Post -->
                                                <div class="nk-tb-col">
                                                    <span>
                                                        <a href="{{ url('admin/posts') }}#post-{{ $report['post']['id'] }}">
                                                            {{ $report['post']['title'] ?? '' }}
                                                        </a>
                                                    </span>
                                                </div>

                                                <!-- Post Owner -->
                                                <div class="nk-tb-col">
                                                    <a
                                                        href="{{ url('admin/user-detail/' . $report['post']['created_by']['id']) }}">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-primary">
                                                                <span>
                                                                    <img src="{{ asset($report['post']['created_by']['profile']['avatar'] ?? 'uploads/profile/user-default.png') }}"
                                                                        alt="{{ $report['post']['created_by']['profile']['name'] ?? '' }}">
                                                                </span>


                                                            </div>
                                                            <div class="user-info">
                                                                <span class="tb-lead">
                                                                    {{ $report['post']['created_by']['profile']['name'] ?? '' }}
                                                                    <span class="dot dot-success d-md-none ms-1"></span></span>
                                                                <span>
                                                                    {{ $report['post']['created_by']['email'] ?? '' }}</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>


                                                <!-- Report Status -->
                                                <div class="nk-tb-col">
                                                    @if ($report['status'] === 'pending')
                                                        <span class="tb-status text-warning">Pending</span>
                                                    @elseif($report['status'] === 'resolved')
                                                        <span class="tb-status text-success">Resolved</span>
                                                    @else
                                                        <span
                                                            class="tb-status text-danger">{{ ucfirst($report['status']) }}</span>
                                                    @endif
                                                </div>

                                                <!-- Created At -->
                                                <div class="nk-tb-col">
                                                    <span>{{ \Carbon\Carbon::parse($report['created_at'])->diffForHumans() }}</span>
                                                </div>

                                                <!-- Actions -->
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#"
                                                                    class="dropdown-toggle btn btn-icon btn-trigger"
                                                                    data-bs-toggle="dropdown">
                                                                    <em class="icon ni ni-more-h"></em>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li>
                                                                            <a href="{{ url('admin/report-status/' . $report['report_id'] . '/approve') }}"
                                                                                onclick="return confirm('Approve this report and delete the post?');">
                                                                                <em class="icon ni ni-check-circle"></em>
                                                                                <span>Approve Request</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="{{ url('admin/report-status/' . $report['report_id'] . '/reject') }}"
                                                                                onclick="return confirm('Reject this report?');">
                                                                                <em class="icon ni ni-cross-circle"></em>
                                                                                <span>Reject Request</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .nk-tb-item -->
                                        @endforeach

                                    </div><!-- .nk-tb-list -->

                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="nk-block-between-md g-3">
                                        <div class="g">
                                            <ul class="pagination justify-content-center justify-content-md-start">
                                                {{-- Previous Page Link --}}
                                                @if ($reports->onFirstPage())
                                                    <li class="page-item disabled">
                                                        <span class="page-link">Prev</span>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $reports->previousPageUrl() }}">Prev</a>
                                                    </li>
                                                @endif

                                                {{-- Pagination Elements --}}
                                                @foreach ($reports->getUrlRange(1, $reports->lastPage()) as $page => $url)
                                                    <li
                                                        class="page-item {{ $reports->currentPage() == $page ? 'active' : '' }}">
                                                        <a class="page-link"
                                                            href="{{ $url }}">{{ $page }}</a>
                                                    </li>
                                                @endforeach

                                                {{-- Next Page Link --}}
                                                @if ($reports->hasMorePages())
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $reports->nextPageUrl() }}">Next</a>
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
                                                        @for ($i = 1; $i <= $reports->lastPage(); $i++)
                                                            <option value="{{ $reports->url($i) }}"
                                                                {{ $reports->currentPage() == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div>OF {{ $reports->lastPage() }}</div>
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
