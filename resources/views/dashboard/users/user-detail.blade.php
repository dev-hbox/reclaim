@extends('layouts.main')
@section('content')
    <!-- content @s
        -->
        <div class="nk-content nk-content-fluid">
            <div class="container-xl wide-xl">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Users / <strong
                                        class="text-primary small">{{ $user->profile->name ?? '' }}</strong></h3>

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
                                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#"><em
                                                    class="icon ni ni-user-circle"></em><span>Personal</span></a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" href="#"><em
                                                    class="icon ni ni-repeat"></em><span>Transactions</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><em
                                                    class="icon ni ni-file-text"></em><span>Documents</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><em
                                                    class="icon ni ni-bell"></em><span>Notifications</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><em
                                                    class="icon ni ni-activity"></em><span>Activities</span></a>
                                        </li>
                                        <li class="nav-item nav-item-trigger d-xxl-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger"
                                                data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
                                        </li> --}}
                                    </ul><!-- .nav-tabs -->
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="nk-block-head">
                                                <h5 class="title">Personal Information</h5>
                                                <p>Basic info, like your name and address, that you use on Nio Platform.</p>
                                            </div><!-- .nk-block-head -->
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
                                                        <span class="profile-ud-value">{{ $user->profile->name ?? '' }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Age</span>
                                                        <span class="profile-ud-value">{{ $user->profile->age ?? '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Mobile Number</span>
                                                        <span class="profile-ud-value">{{ $user->profile->phone ?? '' }}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Email Address</span>
                                                        <span class="profile-ud-value">{{ $user->email ?? '' }}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                        <div class="nk-block">
                                            <div class="nk-block-head nk-block-head-line">
                                                <h6 class="title overline-title text-base">Additional Information</h6>
                                            </div><!-- .nk-block-head -->
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
                                                        <span class="profile-ud-value">United State</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Nationality</span>
                                                        <span class="profile-ud-value">United State</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->

                                    </div><!-- .card-inner -->
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
                                                    <h5> {{ $user->profile->name ?? '' }}</h5>
                                                    <span class="sub-text">{{ $user->email ?? '' }}</span>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->


                                        {{-- <div class="card-inner">
                                            <div class="row text-center">
                                                <div class="col-4">
                                                    <div class="profile-stats">
                                                        <span class="amount">23</span>
                                                        <span class="sub-text">Total Order</span>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="profile-stats">
                                                        <span class="amount">20</span>
                                                        <span class="sub-text">Complete</span>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="profile-stats">
                                                        <span class="amount">3</span>
                                                        <span class="sub-text">Progress</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <!-- .card-inner -->

                                        <div class="card-inner">
                                            <h6 class="overline-title-alt mb-2">Additional</h6>
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <span class="sub-text">User ID:</span>
                                                    <span>{{ $user->id ?? 0 }}</span>
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
                                        <!-- .card-inner -->

                                        {{-- <div class="card-inner">
                                            <h6 class="overline-title-alt mb-3">Groups</h6>
                                            <ul class="g-1">
                                                <li class="btn-group">
                                                    <a class="btn btn-xs btn-light btn-dim" href="#">investor</a>
                                                    <a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em
                                                            class="icon ni ni-cross"></em></a>
                                                </li>
                                                <li class="btn-group">
                                                    <a class="btn btn-xs btn-light btn-dim" href="#">support</a>
                                                    <a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em
                                                            class="icon ni ni-cross"></em></a>
                                                </li>
                                                <li class="btn-group">
                                                    <a class="btn btn-xs btn-light btn-dim" href="#">another tag</a>
                                                    <a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em
                                                            class="icon ni ni-cross"></em></a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                        <!-- .card-inner -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card-aside -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
        <!-- content @e -->
    @endsection
