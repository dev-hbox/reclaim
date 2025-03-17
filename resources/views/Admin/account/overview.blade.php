@extends('admin.account.show')

@section('content')
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Profile Details</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9">
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Name</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ ucfirst($user->profile->first_name ?? '--') }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">About</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ ucfirst($user->profile->about ?? '--') }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Interests</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span class="fw-bold text-gray-800 fs-6">
                        @if ($user->userinterest)
                            @foreach ($user->userinterest as $intrest)
                                <div class="broker-tag">
                                    <span class="fw-bold text-white ">{{ ucfirst($intrest->interest->name ?? '--') }}</span>
                                </div>
                            @endforeach
                        @else
                            <p>--</p>
                        @endif
                    </span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->


            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Email Address</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span class="fw-bold text-gray-800 fs-6">{{ $user->email ?? '--' }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Contact Phone</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span class="fw-bold text-gray-800 fs-6">{{ $user->profile->phone ?? '--' }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->



            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Date Of Birth</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span
                        class="fw-bold text-gray-800 fs-6">{{ date('F d, Y', strtotime($user->profile->date_of_birth ?? '--')) }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->




        </div>
        <!--end::Card body-->
    </div>
@endsection
