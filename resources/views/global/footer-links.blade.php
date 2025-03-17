<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
        </svg>
    </span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
<!--end::Page Vendors Javascript-->
<script src="{{asset('assets/js/custom/apps/ecommerce/sales/listing.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/ecommerce/catalog/save-product.js')}}"></script>
<script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>

<script src="{{asset('assets/js/custom/apps/customers/list/export.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/customers/list/list.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/customers/add.js')}}"></script>

<!-- FOR REGISTRED USERS-->
<script src="{{asset('assets/js/custom/apps/user-management/users/list/table.js')}}"></script>

<!-- FOR Workout Plans-->
<script src="{{asset('assets/js/custom/apps/subscriptions/list/list.js')}}"></script>

<!-- FOR Equipments in excersice-->
<script src="{{asset('assets/js/custom/apps/ecommerce/catalog/products.js')}}"></script>

<!-- FOR Categories-->
<script src="{{asset('assets/js/custom/apps/ecommerce/catalog/categories.js')}}"></script>
{{-- <script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/widgets.js')}}"></script> --}}
<script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
{{-- <script src="{{asset('https://cdn.canvasjs.com/canvasjs.min.js')}}"></script>
<script src="{{asset('https://canvasjs.com/assets/script/jquery-1.11.1.min.js')}}"></script> --}}

<script>
    $(document).ready(function()
    {

        $("[data-id="+$('#progress_date').val()+"]").addClass('progress_display_block');

        $('#progress_date').on('change', function (e) {

            $(".progress_row .progress_gallery").removeClass('progress_display_block');

            for (let index = 1; index <= $('.progress_row').children().length; index++) {

                var id = $(".progress_row .progress_gallery:nth-child("+index+")").data("id");

                if(id == $(this).val())
                {
                    $("[data-id="+id+"]").addClass('progress_display_block');
                }

            }

        });

        $('.update_qty_btn').click(function()
        {
            $('.stock_id').val($(this).data("id") );
            $('.qtysold').val($(this).data("qtysold") );
            $('.qty').val($(this).data("qty") );
            $('.unit_price_update').val($(this).data("unit") );
            $('.sale_price_update').val($(this).data("sale") );

            $('#updateQty').modal('show');
        })

        $('#exercise-days').on('change', function (e) {

            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;

            if(valueSelected == 6 || valueSelected == 7)
            {
                $('#cardio-description').css('display', 'block');
                $('.daily-exercise').css('display', 'none');
                $('.daily-exercise input').removeAttr('required');
                $('.daily-exercise textarea').removeAttr('required');
            }
            else
            {
                $('#cardio-description').css('display', 'none');
                $('.daily-exercise').css('display', 'block');
                $('.daily-exercise input').attr('required', 'required');
                $('.daily-exercise textarea').attr('required', 'required');

                $(".daily-exercise input[name='exercise-reps']").removeAttr('required');
                $(".daily-exercise input[name='exercise-sets']").removeAttr('required');
            }

        });

        $("#save-attribute").click(function(){

            $(" .accordion").html('');

            var arrOption = [];
            var arrTemp = [];

            for (let index = 0; index < $('.total-attr').children().length; index++) {

                var option = $("select[name='kt_ecommerce_add_product_options["+index+"][product_option]']").val();
                var option_value = $("input[name='kt_ecommerce_add_product_options["+index+"][product_option_value]']").val();
                arrOption.push([option, option_value]);
                arrTemp.push(option);

            }

            console.log(arrOption);
            console.log(arrTemp);

            const hasDuplicates = (arr) => arr.length !== new Set(arr).size;

            if( arrTemp.every( (val, i, arrEqp) => val === arrEqp[0] ) == true )
            {
                if(arrTemp.length > 1)
                {
                    $('.single-price').removeAttr('required');
                    $('.card-header.for_one_attribute').css('display', 'none');
                    $('.card-body.pt-0.for_one_attribute').css('display', 'none');
                    for (let index = 0; index < arrTemp.length; index++) {

                        $(" .accordion").append("<div class='accordion-item'><h2 class='accordion-header' id='kt_accordion_"+index+"_header_"+index+"'><button class='accordion-button fs-4 fw-semibold collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#kt_accordion_"+index+"_body_"+index+"' aria-controls='kt_accordion_"+index+"_body_"+index+"'>Variation Item #"+(index+1)+"</button></h2></div>");

                        $("<div id='kt_accordion_"+index+"_body_"+index+"' class='accordion-collapse collapse' aria-labelledby='kt_accordion_"+index+"_header_"+index+"' data-bs-parent='#kt_accordion_1'></div>").insertAfter("h2#kt_accordion_"+index+"_header_"+index+"");

                        $("#kt_accordion_"+index+"_body_"+index+"").append("<input type='text' class='form-control mb-2 mt-2 product_option' placeholder='Attribute' name='product_option["+index+"][0]' value="+arrOption[index][1]+" readonly />");

                        $("#kt_accordion_"+index+"_body_"+index+"").append("<input type='text' name='unit_price["+index+"]' class='form-control mb-2 mt-2 product_option' placeholder='Unit Price' required />");
                        $("#kt_accordion_"+index+"_body_"+index+"").append("<input type='text' name='sale_price["+index+"]' class='form-control mb-2 mt-2 product_option' placeholder='Sale Price' required />");
                        $("#kt_accordion_"+index+"_body_"+index+"").append("<input type='number' name='qty_arr["+index+"]' class='form-control mb-2 mt-2 product_option' placeholder='Quantity' />");

                    }
                }
                else
                {
                    if( hasDuplicates(arrTemp) == false)
                    {
                        $('.card-header.for_one_attribute').css('display', 'flex');
                        $('.card-body.pt-0.for_one_attribute').css('display', 'block');
                        $('.single-price').attr('required', 'required');
                    }
                    else
                    {
                        $('.single-price').removeAttr('required');
                        $('.card-header.for_one_attribute').css('display', 'none');
                        $('.card-body.pt-0.for_one_attribute').css('display', 'none');

                        let expectedKeys = [];
                        let arrayExpected = [];

                        arrOption.reduce((acc, current) => {
                            let jsObj = {};
                            jsObj[current[0]] = current[1];
                            arrayExpected.push(jsObj);
                            let isAvailable = expectedKeys.includes(current[0]);
                            if (!isAvailable) {
                            expectedKeys.push(current[0])
                            }
                            return arrayExpected
                        }, []);

                        let jsObjs = {};
                        let arrayTest = [];
                        expectedKeys.forEach(async (item) => {
                            let currentKey = item
                            let answer = arrayExpected.filter(object => object[currentKey])
                            let result = answer.map(a => a[currentKey]);
                            arrayTest.push([...result,])
                            jsObjs[currentKey] = answer;
                        });

                        result = arrayTest.reduce((a, b) => a.reduce((r, v) => r.concat(b.map(w => [].concat(v, w))), []));

                        for (let index = 0; index < result.length; index++) {

                            $(" .accordion").append("<div class='accordion-item'><h2 class='accordion-header' id='kt_accordion_"+index+"_header_"+index+"'><button class='accordion-button fs-4 fw-semibold collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#kt_accordion_"+index+"_body_"+index+"' aria-controls='kt_accordion_"+index+"_body_"+index+"'>Variation Item #"+(index+1)+"</button></h2></div>");

                            $("<div id='kt_accordion_"+index+"_body_"+index+"' class='accordion-collapse collapse' aria-labelledby='kt_accordion_"+index+"_header_"+index+"' data-bs-parent='#kt_accordion_1'></div>").insertAfter("h2#kt_accordion_"+index+"_header_"+index+"");

                            for (let i = 0; i < arrayTest.length; i++) {

                                $("#kt_accordion_"+index+"_body_"+index+"").append("<input type='text' class='form-control mb-2 mt-2 product_option' placeholder='Attribute' name='product_option["+index+"]["+i+"]' value="+result[index][i]+" readonly />");

                            }

                            $("#kt_accordion_"+index+"_body_"+index+"").append("<input type='text' name='unit_price["+index+"]' class='form-control mb-2 mt-2 product_option' placeholder='Unit Price' required />");
                            $("#kt_accordion_"+index+"_body_"+index+"").append("<input type='text' name='sale_price["+index+"]' class='form-control mb-2 mt-2 product_option' placeholder='Sale Price' required />");
                            $("#kt_accordion_"+index+"_body_"+index+"").append("<input type='number' name='qty_arr["+index+"]' class='form-control mb-2 mt-2 product_option' placeholder='Quantity' />");

                        }
                    }
                }

            }
            else
            {
                if( hasDuplicates(arrTemp) == false)
                {
                    $('.card-header.for_one_attribute').css('display', 'flex');
                    $('.card-body.pt-0.for_one_attribute').css('display', 'block');
                    $('.single-price').attr('required', 'required');
                }
                else
                {
                    $('.single-price').removeAttr('required');
                    $('.card-header.for_one_attribute').css('display', 'none');
                    $('.card-body.pt-0.for_one_attribute').css('display', 'none');

                    let expectedKeys = [];
                    let arrayExpected = [];

                    arrOption.reduce((acc, current) => {
                        let jsObj = {};
                        jsObj[current[0]] = current[1];
                        arrayExpected.push(jsObj);
                        let isAvailable = expectedKeys.includes(current[0]);
                        if (!isAvailable) {
                        expectedKeys.push(current[0])
                        }
                        return arrayExpected
                    }, []);

                    let jsObjs = {};
                    let arrayTest = [];
                    expectedKeys.forEach(async (item) => {
                        let currentKey = item
                        let answer = arrayExpected.filter(object => object[currentKey])
                        let result = answer.map(a => a[currentKey]);
                        arrayTest.push([...result,])
                        jsObjs[currentKey] = answer;
                    });

                    result = arrayTest.reduce((a, b) => a.reduce((r, v) => r.concat(b.map(w => [].concat(v, w))), []));

                    for (let index = 0; index < result.length; index++) {

                        $(" .accordion").append("<div class='accordion-item'><h2 class='accordion-header' id='kt_accordion_"+index+"_header_"+index+"'><button class='accordion-button fs-4 fw-semibold collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#kt_accordion_"+index+"_body_"+index+"' aria-controls='kt_accordion_"+index+"_body_"+index+"'>Variation Item #"+(index+1)+"</button></h2></div>");

                        $("<div id='kt_accordion_"+index+"_body_"+index+"' class='accordion-collapse collapse' aria-labelledby='kt_accordion_"+index+"_header_"+index+"' data-bs-parent='#kt_accordion_1'></div>").insertAfter("h2#kt_accordion_"+index+"_header_"+index+"");

                        for (let i = 0; i < arrayTest.length; i++) {

                            $("#kt_accordion_"+index+"_body_"+index+"").append("<input type='text' class='form-control mb-2 mt-2 product_option' placeholder='Attribute' name='product_option["+index+"]["+i+"]' value="+result[index][i]+" readonly />");

                        }

                        $("#kt_accordion_"+index+"_body_"+index+"").append("<input type='text' name='unit_price["+index+"]' class='form-control mb-2 mt-2 product_option' placeholder='Unit Price' required />");
                        $("#kt_accordion_"+index+"_body_"+index+"").append("<input type='text' name='sale_price["+index+"]' class='form-control mb-2 mt-2 product_option' placeholder='Sale Price' required />");
                        $("#kt_accordion_"+index+"_body_"+index+"").append("<input type='number' name='qty_arr["+index+"]' class='form-control mb-2 mt-2 product_option' placeholder='Quantity' />");

                    }
                }
            }
        });


    });
    </script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>