@extends('layouts.main')

@section('content')
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-xl">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">
                                Users /
                                <strong class="text-primary small">{{ $user->profile->name ?? '' }}</strong>
                            </h3>
                        </div>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                            <em class="icon ni ni-arrow-left"></em>
                            <span>Back</span>
                        </a>
                    </div>
                </div><!-- .nk-block-head -->

                <div class="nk-block">
                    <div class="card">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                <!-- Nav Tabs -->
                                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#tab-personal" role="tab">
                                            <em class="icon ni ni-user-circle"></em><span>Personal</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab-commitments" role="tab">
                                            <em class="icon ni ni-repeat"></em><span>Commitments</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab-lessons" role="tab">
                                            <em class="icon ni ni-file-text"></em><span>Lessons</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab-panic" role="tab">
                                            <em class="icon ni ni-bell"></em><span>Panic</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab-progress" role="tab">
                                            <em class="icon ni ni-activity"></em><span>Progress</span>
                                        </a>
                                    </li>
                                    <li class="nav-item nav-item-trigger d-xxl-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside">
                                            <em class="icon ni ni-user-list-fill"></em>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <!-- PERSONAL TAB -->
                                    <div class="tab-pane fade show active" id="tab-personal" role="tabpanel">
                                        <div class="card-inner">
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Personal Information</h5>
                                                    <p>Basic info, like your name and address, that you use on Nio Platform.
                                                    </p>
                                                </div>
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Title</span>
                                                            @if ($user->profile->gender == 'male')
                                                                <span class="profile-ud-value">Mr.</span>
                                                            @else
                                                                <span class="profile-ud-value">Ms.</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Full Name</span>
                                                            <span
                                                                class="profile-ud-value">{{ $user->profile->name ?? '' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Age</span>
                                                            <span
                                                                class="profile-ud-value">{{ $user->profile->age ?? '' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Gender</span>
                                                            <span
                                                                class="profile-ud-value">{{ ucfirst($user->profile->gender ?? '') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Email Address</span>
                                                            <span class="profile-ud-value">{{ $user->email ?? '' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="nk-block">
                                                <div class="nk-block-head nk-block-head-line">
                                                    <h6 class="title overline-title text-base">Additional Information</h6>
                                                </div>
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Joining Date</span>
                                                            <span
                                                                class="profile-ud-value">{{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y h:i A') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Reg Method</span>
                                                            <span class="profile-ud-value">Email</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Country</span>
                                                            <span class="profile-ud-value">United States</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Nationality</span>
                                                            <span class="profile-ud-value">United States</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .tab-pane -->

                                    <!-- COMMITMENTS TAB -->
                                    <div class="tab-pane fade" id="tab-commitments" role="tabpanel">
                                        <div class="card card-preview m-2">
                                            <div class="card-inner">
                                                @if ($commitments->count())
                                                    <div class="row g-3">
                                                        @foreach ($commitments as $commitment)
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class="card h-100">
                                                                    <div class="card-inner d-flex flex-column h-100">
                                                                        <h5 class="card-title my-2">
                                                                            {{ $commitment->title ?? '' }}
                                                                        </h5>
                                                                        <h6 class="card-subtitle my-2 ff-base text-muted">
                                                                            {{ $commitment->deadline }}
                                                                        </h6>
                                                                        <p class="card-text flex-grow-1 overflow-auto"
                                                                            style="max-height: 100px;">
                                                                            {{ $commitment->description ?? '' }}
                                                                        </p>
                                                                        <div class="mt-auto">
                                                                            <span class="badge rounded-pill bg-primary">
                                                                                {{ ucfirst($commitment->status ?? '') }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <p>No commitments found.</p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- pagination start  --}}
                                        <div class="card-inner">
                                            <div class="nk-block-between-md g-3">
                                                <div class="g">
                                                    <ul class="pagination justify-content-center justify-content-md-start">
                                                        {{-- Previous Page Link --}}
                                                        @if ($commitments->onFirstPage())
                                                            <li class="page-item disabled">
                                                                <span class="page-link">Prev</span>
                                                            </li>
                                                        @else
                                                            <li class="page-item">
                                                                <a class="page-link"
                                                                    href="{{ $commitments->previousPageUrl() }}">Prev</a>
                                                            </li>
                                                        @endif

                                                        {{-- Pagination Elements --}}
                                                        @foreach ($commitments->getUrlRange(1, $commitments->lastPage()) as $page => $url)
                                                            <li
                                                                class="page-item {{ $commitments->currentPage() == $page ? 'active' : '' }}">
                                                                <a class="page-link"
                                                                    href="{{ $url }}">{{ $page }}</a>
                                                            </li>
                                                        @endforeach

                                                        {{-- Next Page Link --}}
                                                        @if ($commitments->hasMorePages())
                                                            <li class="page-item">
                                                                <a class="page-link"
                                                                    href="{{ $commitments->nextPageUrl() }}">Next</a>
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
                                                                @for ($i = 1; $i <= $commitments->lastPage(); $i++)
                                                                    <option value="{{ $commitments->url($i) }}"
                                                                        {{ $commitments->currentPage() == $i ? 'selected' : '' }}>
                                                                        {{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div>OF {{ $commitments->lastPage() }}</div>
                                                    </div>
                                                </div><!-- .pagination-goto -->
                                            </div><!-- .nk-block-between -->
                                        </div><!-- .card-inner -->
                                    </div><!-- .tab-pane -->



                                    <!-- LESSONS TAB -->
                                    <div class="tab-pane fade" id="tab-lessons" role="tabpanel">
                                        <div class="card card-preview m-2">
                                            <div class="card-inner">
                                                @if ($lessons->count())
                                                    <div class="row g-3">
                                                        @foreach ($lessons as $lesson)
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class="card h-100">
                                                                    <div class="card-inner d-flex flex-column h-100">

                                                                        {{-- Media section (either video or image) --}}
                                                                        @if ($lesson->lesson->video)
                                                                            <video width="100%" height="180" controls
                                                                                class="rounded mb-2">
                                                                                <source
                                                                                    src="{{ asset($lesson->lesson->video) }}"
                                                                                    type="video/mp4">
                                                                                Your browser does not support the video tag.
                                                                            </video>
                                                                        @elseif($lesson->lesson->avatar)
                                                                            <img src="{{ asset($lesson->lesson->avatar) }}"
                                                                                class="card-img-top rounded mb-2"
                                                                                style="height: 180px; object-fit: cover;"
                                                                                alt="Lesson Image">
                                                                        @else
                                                                            <img src="{{ asset('images/slides/slide-a.jpg') }}"
                                                                                class="card-img-top rounded mb-2"
                                                                                style="height: 180px; object-fit: cover;"
                                                                                alt="Default Image">
                                                                        @endif

                                                                        {{-- Title --}}
                                                                        <h5 class="card-title my-2">
                                                                            {{ $lesson->lesson->title ?? '' }}
                                                                        </h5>

                                                                        {{-- Description --}}
                                                                        <p class="card-text flex-grow-1 overflow-auto"
                                                                            style="max-height: 100px;">
                                                                            {{ $lesson->lesson->description ?? '' }}
                                                                        </p>

                                                                        {{-- Action Buttons --}}


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    {{-- Pagination --}}
                                                    <div class="mt-3">
                                                        {{ $lessons->links() }}
                                                    </div>
                                                @else
                                                    <p>No lessons found.</p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- pagination start  --}}
                                        <div class="card-inner">
                                            <div class="nk-block-between-md g-3">
                                                <div class="g">
                                                    <ul class="pagination justify-content-center justify-content-md-start">
                                                        {{-- Previous Page Link --}}
                                                        @if ($lessons->onFirstPage())
                                                            <li class="page-item disabled">
                                                                <span class="page-link">Prev</span>
                                                            </li>
                                                        @else
                                                            <li class="page-item">
                                                                <a class="page-link"
                                                                    href="{{ $lessons->previousPageUrl() }}">Prev</a>
                                                            </li>
                                                        @endif

                                                        {{-- Pagination Elements --}}
                                                        @foreach ($lessons->getUrlRange(1, $lessons->lastPage()) as $page => $url)
                                                            <li
                                                                class="page-item {{ $lessons->currentPage() == $page ? 'active' : '' }}">
                                                                <a class="page-link"
                                                                    href="{{ $url }}">{{ $page }}</a>
                                                            </li>
                                                        @endforeach

                                                        {{-- Next Page Link --}}
                                                        @if ($lessons->hasMorePages())
                                                            <li class="page-item">
                                                                <a class="page-link"
                                                                    href="{{ $lessons->nextPageUrl() }}">Next</a>
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
                                                                @for ($i = 1; $i <= $lessons->lastPage(); $i++)
                                                                    <option value="{{ $lessons->url($i) }}"
                                                                        {{ $lessons->currentPage() == $i ? 'selected' : '' }}>
                                                                        {{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div>OF {{ $lessons->lastPage() }}</div>
                                                    </div>
                                                </div><!-- .pagination-goto -->
                                            </div><!-- .nk-block-between -->
                                        </div><!-- .card-inner -->
                                    </div><!-- .tab-pane -->



                                    <!-- PANIC TAB -->
                                    <div class="tab-pane fade" id="tab-panic" role="tabpanel">
                                        <div class="card card-preview m-2">
                                            <div class="card-inner">
                                                @if ($panicLogs->count())
                                                    <div class="row g-3">
                                                        @foreach ($panicLogs as $panicLog)
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class="card h-100">
                                                                    <div class="card-inner d-flex flex-column h-100">
                                                                        <h5 class="card-title my-2">
                                                                            {{ $panicLog->task_type ?? '' }}
                                                                        </h5>
                                                                        <h6 class="card-subtitle my-2 ff-base text-muted">
                                                                            {{ \Carbon\Carbon::parse($panicLog->completed_at)->format('d M, Y h:i A') }}
                                                                        </h6>
                                                                        <p class="card-text flex-grow-1 overflow-auto"
                                                                            style="max-height: 100px;">
                                                                            {{ $panicLog->task_description ?? '' }}
                                                                        </p>
                                                                        <div class="mt-auto">
                                                                            @if ($panicLog->is_correct == 1)
                                                                                <span
                                                                                    class="badge rounded-pill bg-success">
                                                                                    {{ $panicLog->notes ?? '' }}
                                                                                </span>
                                                                            @else
                                                                                <span class="badge rounded-pill bg-info">
                                                                                    {{ ucfirst($panicLog->notes ?? '') }}
                                                                                </span>
                                                                            @endif

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <p>No panicLogs found.</p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- pagination start  --}}
                                        <div class="card-inner">
                                            <div class="nk-block-between-md g-3">
                                                <div class="g">
                                                    <ul class="pagination justify-content-center justify-content-md-start">
                                                        {{-- Previous Page Link --}}
                                                        @if ($panicLogs->onFirstPage())
                                                            <li class="page-item disabled">
                                                                <span class="page-link">Prev</span>
                                                            </li>
                                                        @else
                                                            <li class="page-item">
                                                                <a class="page-link"
                                                                    href="{{ $panicLogs->previousPageUrl() }}">Prev</a>
                                                            </li>
                                                        @endif

                                                        {{-- Pagination Elements --}}
                                                        @foreach ($panicLogs->getUrlRange(1, $panicLogs->lastPage()) as $page => $url)
                                                            <li
                                                                class="page-item {{ $panicLogs->currentPage() == $page ? 'active' : '' }}">
                                                                <a class="page-link"
                                                                    href="{{ $url }}">{{ $page }}</a>
                                                            </li>
                                                        @endforeach

                                                        {{-- Next Page Link --}}
                                                        @if ($panicLogs->hasMorePages())
                                                            <li class="page-item">
                                                                <a class="page-link"
                                                                    href="{{ $panicLogs->nextPageUrl() }}">Next</a>
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
                                                                @for ($i = 1; $i <= $panicLogs->lastPage(); $i++)
                                                                    <option value="{{ $panicLogs->url($i) }}"
                                                                        {{ $panicLogs->currentPage() == $i ? 'selected' : '' }}>
                                                                        {{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div>OF {{ $panicLogs->lastPage() }}</div>
                                                    </div>
                                                </div><!-- .pagination-goto -->
                                            </div><!-- .nk-block-between -->
                                        </div><!-- .card-inner -->
                                    </div><!-- .tab-pane -->

                                    <!-- PROGRESS TAB -->
                                    <div class="tab-pane fade" id="tab-progress" role="tabpanel">
                                        <div class="card card-preview m-2">
                                            <div class="card-inner">
                                                <div class="gy-4">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <h6 class="text-muted">Points</h6>
                                                            <h4 class="fw-bold">{{ $user->progress->points ?? 0 }}</h4>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="text-muted">Level</h6>
                                                            <h4 class="fw-bold">{{ $user->progress->level ?? 1 }}</h4>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="text-muted">Rank</h6>
                                                            <h4 class="fw-bold">{{ $user->progress->rank ?? 'N/A' }}</h4>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="text-muted">Streak Days</h6>
                                                            <h4 class="fw-bold">{{ $user->progress->streak_days ?? 0 }}
                                                            </h4>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="text-muted">Missed Check-ins</h6>
                                                            <h4 class="fw-bold text-danger">
                                                                {{ $user->progress->missed_checkins ?? 0 }}</h4>
                                                        </div>
                                                    </div>

                                                    {{-- Optional progress bars to visualize e.g. streak --}}
                                                    <div class="mt-4">
                                                        <h6 class="text-muted mb-2">Streak Progress</h6>
                                                        <div class="progress mb-3">
                                                            <div class="progress-bar progress-bar-striped bg-success"
                                                                role="progressbar"
                                                                style="width: {{ ($user->progress->streak_days ?? 0) * 10 }}%;"
                                                                aria-valuenow="{{ ($user->progress->streak_days ?? 0) * 10 }}"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                {{ ($user->progress->streak_days ?? 0) * 10 }}%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-preview -->


                                    </div><!-- .tab-pane -->

                                </div><!-- .tab-content -->

                            </div><!-- .card-content -->

                            <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl"
                                data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true"
                                data-toggle-body="true">
                                <div class="card-inner-group" data-simplebar>
                                    <div class="card-inner">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg bg-primary">
                                                <span>
                                                    <img src="{{ asset($user->profile->avatar ?? '') }}"
                                                        alt="{{ $user->profile->name ?? '' }}">
                                                </span>
                                            </div>
                                            <div class="user-info">
                                                <div class="badge bg-outline-light rounded-pill ucap">User</div>
                                                <h5>{{ $user->profile->name ?? '' }}</h5>
                                                <span class="sub-text">{{ $user->email ?? '' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner">
                                        <h6 class="overline-title-alt mb-2">Additional</h6>
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <span class="sub-text">User ID:</span>
                                                <span>RC-{{ $user->id ?? 0 }}</span>
                                            </div>
                                            <div class="col-6">
                                                @if ($user->otp_status == 1)
                                                    <span class="sub-text">KYC Status:</span>
                                                    <span class="lead-text text-success">Approved</span>
                                                @else
                                                    <span class="sub-text">KYC Status:</span>
                                                    <span class="lead-text text-danger">Suspended</span>
                                                @endif
                                            </div>
                                            <div class="col-6">
                                                <span class="sub-text">Register At:</span>
                                                <span>{{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y h:i A') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card-inner-group -->
                            </div><!-- .card-aside -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
@endsection
