@extends('layouts.main')
@section('content')
    <!-- content @s
        -->
        <div class="nk-content nk-content-fluid">
            <div class="container-xl wide-xl">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Personal Information</h3>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card">
                            <ul class="nav nav-tabs nav-tabs-s1 px-4">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#profile-tab-pane">Profile</a>
                                </li>

                            </ul>
                            @auth
                                @if (Auth::user()->role === 'admin')
                                    <div class="card-inner">
                                        <div class="tab-content mt-0">
                                            <div class="tab-pane fade show active" id="profile-tab-pane">
                                                <div class="nk-data data-list">
                                                    <div class="data-head">
                                                        <h6 class="overline-title">Basics</h6>
                                                    </div>
                                                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                        <div class="data-col">
                                                            <span class="data-label">Full Name</span>
                                                            <span class="data-value">{{ Auth::user()->profile->name ?? 'Admin' }}</span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more"><em
                                                                    class="icon ni ni-forward-ios"></em></span></div>
                                                    </div><!-- data-item -->

                                                    <div class="data-item">
                                                        <div class="data-col">
                                                            <span class="data-label">Email</span>
                                                            <span class="data-value">{{ Auth::user()->email ?? '' }}</span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more disable"><em
                                                                    class="icon ni ni-lock-alt"></em></span></div>
                                                    </div><!-- data-item -->

                                                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                        <div class="data-col">
                                                            <span class="data-label">Phone Number</span>
                                                            <span class="data-value text-soft">
                                                                {{ Auth::user()->profile->phone ?? 'Not add yet' }}</span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more"><em
                                                                    class="icon ni ni-forward-ios"></em></span></div>
                                                    </div><!-- data-item -->

                                                </div><!-- data-list -->
                                            </div><!-- .tab-pane -->

                                        </div><!-- .tab-content -->
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
        <!-- content @e -->
    @endsection
