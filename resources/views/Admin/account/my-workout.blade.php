@extends('admin.account.show')

@section('content')
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">My Workout</h3>
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-25px">ID</th>
                        <th class="min-w-125px">Avatar</th>
                        <th class="min-w-125px">Title</th>
                        <th class="min-w-125px">Goal</th>
                        <th class="min-w-125px">Level</th>
                        <th class="min-w-125px">Created Date</th>
                        <th class="text-end min-w-100px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->

                <tbody class="text-gray-600 fw-bold">
                    @foreach ($myworkouts as $workout)
                        <tr>
                            <!--begin::Checkbox-->
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <!--end::Checkbox-->

                            <!--begin::Checkbox-->
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    {{ $workout->id ?? '--' }}
                                </div>
                            </td>
                            <!--end::Checkbox-->

                            <!--begin::User=-->
                            <td class="d-flex align-items-center">
                                <!--begin:: Avatar -->
                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                    <div class="symbol-label">
                                        <img src="{{ $workout->avatar ?? asset('/uploads/profile/user-default.png') }}"
                                            alt="" class="w-100" />
                                    </div>
                                </div>
                                <!--end::Avatar-->
                            </td>
                            <!--end::User=-->

                            <!--begin::User=-->
                            <td>
                                <!--begin::User details-->
                                {{ ucfirst($workout->title ?? '--') }}
                                <!--begin::User details-->
                            </td>
                            <!--end::User=-->

                            <td>
                                {{ $workout->goal ?? '--' }}
                            </td>
                            <!--end::Last login=-->

                            <!--begin::Two step=-->
                            <td> {{ $workout->level ?? '--' }}
                            </td>
                            <!--end::Two step=-->
                            <td>
                                {{ date('F d, Y', strtotime($workout->created_at)) }}
                            </td>
                            <!--begin::Action=-->
                            <td class="text-end">
                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{ $workout->id }}" class="workout-id menu-link px-3"
                                            data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">View</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                            <!--end::Action=-->
                        </tr>
                    @endforeach
                    <!--end::Table row-->
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    </div>
    </div>


    <!--begin::Modal - Add task-->
    <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-750px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Workout Exercises</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">

                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Add task-->


    <script>
        // $(document).ready(function() {
        //     var abc = {!! json_encode($myworkouts) !!};

        //     $(".workout-id").click(function() {
        //         var WorkoutId = $(this).attr("href");
        //         $.each(abc, function(key, value) {
        //             $.each(value.user_exercise, function(innerKey, innerValue) {
        //                 console.log(innerValue);
        //             });
        //         });


        //     });
        // });









        $(document).ready(function() {
            var abc = {!! json_encode($myworkouts) !!};

            $(".workout-id").click(function() {
                var WorkoutId = $(this).attr("href");

                // Find the workout data based on WorkoutId
                var workoutData = abc.find(function(workout) {
                    return workout.id == WorkoutId;
                });

                if (workoutData) {
                    // Clear existing content in modal body
                    $("#kt_modal_add_user .modal-body").empty();

                    // Create a table structure

                    var tableHtml = '<table class="table">';
                    // tableHtml += '<thead><tr><th>Exercise Title</th></tr></thead>';
                    tableHtml += '<tbody>';

                    // Populate table with exercise titles
                    $.each(workoutData.user_exercise, function(innerKey, innerValue) {
                        tableHtml += '<tr ><td class="cls-exercise">' + innerValue.exercises.title +
                            '</td></tr>';
                    });

                    tableHtml += '</tbody></table>';

                    // Append table to modal body
                    $("#kt_modal_add_user .modal-body").append(tableHtml);

                    // Show the modal
                    $("#kt_modal_add_user").modal("show");
                }
            });
        });
    </script>
@endsection
