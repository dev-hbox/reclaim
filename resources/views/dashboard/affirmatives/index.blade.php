@extends('layouts.main')

@section('content')
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-xl">
            <div class="nk-content-body">
                <div class="components-preview wide-xl mx-auto">
                    @include('partials._response')
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-between my-5">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Daily Affirmatives </h3>

                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">

                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                        data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt">
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-primary"
                                                        data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#modalForm"><span>Add
                                                                        Affitmatives</span></a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- .toggle-wrap -->
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->

                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="row">
                                    @foreach ($affirmations as $affirm)
                                        <div class="col-lg-4 mb-2 d-flex">
                                            <div class="card h-100 w-100" style="height: 300px;">
                                                <div class="card-inner d-flex flex-column h-100">
                                                    <h5 class="card-title mb-1">
                                                        @php
                                                            $isLongTitle = strlen($affirm->title ?? '') > 80;
                                                        @endphp

                                                        <span class="title-text  {{ $isLongTitle ? 'expandable' : '' }}"
                                                            onclick="toggleTitle(this)">
                                                            {{ $affirm->title }}
                                                        </span>

                                                        @if ($isLongTitle)
                                                            <small class="text-primary" style="cursor:pointer;"
                                                                onclick="toggleTitle(this.previousElementSibling)">

                                                            </small>
                                                        @endif
                                                    </h5>

                                                    <h6 class="card-subtitle my-2 ff-base">
                                                        {{ $affirm->show_date ? \Carbon\Carbon::parse($affirm->show_date)->diffForHumans() : '' }}
                                                    </h6>
                                                    <p class="card-text flex-grow-1 overflow-auto"
                                                        style="max-height: 100px;">
                                                        {{ $affirm->description ?? '' }}
                                                    </p>
                                                    <div class="mt-auto">
                                                        <a href="{{ url('admin/affirm-delete/' . $affirm->id) }}"
                                                            class="card-link text-danger mt-auto">Delete</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>



                            </div>
                        </div><!-- .card-preview -->

                    </div>
                </div>


                <!-- Modal Form -->
                <div class="modal fade" id="modalForm">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Customer Info</h5>
                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                            <div class="modal-body">
                                <form action="#" class="form-validate is-alter">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Full Name</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="full-name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email-address">Email address</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="email-address" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no">Phone No</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="phone-no">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Communication</label>
                                        <ul class="custom-control-group g-3 align-center">
                                            <li>
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="com-email">
                                                    <label class="custom-control-label" for="com-email">Email</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="com-sms">
                                                    <label class="custom-control-label" for="com-sms">SMS</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="com-phone">
                                                    <label class="custom-control-label" for="com-phone">Phone</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="pay-amount">Amount</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="pay-amount">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer bg-light">
                                <span class="sub-text">Modal Footer Text</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
