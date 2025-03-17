@extends('admin.account.show')

@section('content')
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Today Meals</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">
        <!--begin::Row-->
        @if (!empty($goal->UserMeal))
        @foreach ($goal->UserMeal as $key => $value)
        <div class="row mb-7">
            <div class="card-title mb-3">
                <a href="#" data-key="{{$value->id}}" class="meal-link" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                    <h3 class="fw-bolder m-0">{{$value->title ?? '--'}}</h3>
                </a>
            </div>
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Protein </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bolder fs-6 text-gray-800">{{$value->protein_leftside ?? '0'}} / {{$value->protein_rightside ?? '0'}}</span>
            </div>
            <!--end::Col-->
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Leucine </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bolder fs-6 text-gray-800">{{$value->leucine_leftside ?? '0'}} / {{$value->leucine_rightside ?? '0'}}</span>
            </div>
            <!--end::Col-->
        </div>
    @endforeach
    @endif
        <!--end::Row-->
    </div>
    <!--end::Card body-->
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
				<h2 class="fw-bolder">Food Items</h2>
				<!--end::Modal title-->
				<!--begin::Close-->
				<div class="btn btn-icon btn-sm btn-active-icon-primary"  data-bs-dismiss="modal">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
					<span class="svg-icon svg-icon-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
							<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</div>
				<!--end::Close-->
			</div>
			<!--end::Modal header-->
			 <!--begin::Modal body-->
             <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="row mb-7">
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <span id="food-names" class="fw-bolder fs-6 text-gray-800"></span>
                    </div>
                    <!--end::Col-->
                </div>
            </div>
            <!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->


 <script>
 $(document).ready(function() {
    $('.meal-link').click(function(e) {
        e.preventDefault();
        var key = parseInt($(this).data('key'));

            // Get the food items for the selected meal
        var foodItems = {!! $goal && $goal->UserMeal != null && count($goal->UserMeal) > 0 ? json_encode($goal->UserMeal) : 'null' !!};

            // Find the selected meal by its key
        var selectedMeal = foodItems.find(function(meal) {
            return meal.id === key;
        });

        // Clear the previous food names
        $('#food-names').empty();

        if (selectedMeal && selectedMeal.food_item.length > 0) {
            // Create the table element
            var table = $('<table>').addClass('table');
            var thead = $('<thead>').appendTo(table);
            var tbody = $('<tbody>').appendTo(table);

            // Create the table headers
            var headers = ['No.', 'Food Name'];
            var headerRow = $('<tr>').appendTo(thead);
            headers.forEach(function(header) {
                $('<th>').text(header).appendTo(headerRow);
            });

            // Add the food items to the table body
            selectedMeal.food_item.forEach(function(foodItem, index) {
                var foodName = foodItem.food_name;

                // Create a table row for each food item
                var row = $('<tr>').appendTo(tbody);
                $('<td>').text(index + 1).appendTo(row); // Index column
                $('<td>').text(foodName).appendTo(row); // Food name column
            });

            // Append the table to the modal body
            $('#food-names').append(table);
        } else {
            // Show "Data not found" message
            var noDataMessage = $('<p>').text('Data not found');
            $('#food-names').append(noDataMessage);
        }
    });
});

  </script>
@endsection
