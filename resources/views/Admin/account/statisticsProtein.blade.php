@extends('admin.account.show')
@section('content')

<div id="kt_content_container" class="container-xxl">
  <div class="row g-5 g-xl-8">

	<!--begin::Charts Widget 2-->
   <div class="card card-xl-stretch mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bolder fs-3 mb-1">Protein Statistics</span>
        {{-- <span class="text-muted fw-bold fs-7">More than 500 new orders</span> --}}
      </h3>
     <!--begin::Toolbar-->
     <div class="card-toolbar" data-kt-buttons="true">
      <a class="btn btn-sm btn-color-muted btn-active btn-active-primary active px-4 pgraph">weekly</a>
      <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4 me-1 pgraph ">monthly</a>
      <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4 me-1 pgraph">yearly</a>
    </div>
    <!--end::Toolbar-->
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
     <script>
        var label = [];
        var protein_sum = [];
        var leucine_sum = [];
        var yaxis_maxp = {{$total_protein_yaxis}};
        var yaxis_maxl = {{$total_leucine_yaxis}};
        var i = 0
      </script>
        @foreach($xaxis_values as $values)
          <script>
            label[i] = "{{$values["label"]}}";
            protein_sum[i] = {{$values["protein_sum"]}};
            leucine_sum[i] = {{$values["leucine_sum"]}};
            i++;
          </script>
        @endforeach
        <script>
          localStorage.setItem('yaxis_maxp', JSON.stringify(yaxis_maxp));
          localStorage.setItem('yaxis_maxl', JSON.stringify(yaxis_maxl));
          localStorage.setItem('protein_sum', JSON.stringify(protein_sum));
          localStorage.setItem('leucine_sum', JSON.stringify(leucine_sum));
          localStorage.setItem('label', JSON.stringify(label));

          var initialData = {
            labels: JSON.parse(localStorage.getItem('label')),
            series: JSON.parse(localStorage.getItem('protein_sum')),
            yaxis: JSON.parse(localStorage.getItem('yaxis_maxp')),
          };

          function createChart() {
            var options = {
              chart: {
                type: 'bar',
              },
              series: [
                {
                  name: 'Protein',
                  data: initialData.series,
                },
              ],
              xaxis: {
                categories: initialData.labels,
              },
              yaxis: {
                   tickAmount: 4,
                  max: initialData.yaxis,
              }
            };
            var chart = new ApexCharts(document.getElementById('chart'), options);
            chart.render();
            return chart;
          }
          // var chart = createChart();
        </script>
      <!--begin::Chart-->
      {{-- <div id="kt_charts_widget_0_chart" style="height: 500px"></div> --}}
      <div id="chart" style="height: 500px"></div>
      {{-- <button id="updateButton">Update Chart</button> --}}
      <!--end::Chart-->
    </div>
    <!--end::Body-->
  </div>
  <!--end::Charts Widget 2-->


    </div>
  </div>

  <script>
    $('.pgraph').on('click', function() {
      var type = $(this).text();
      getGraphStatistics({{ $user->id }}, type);
    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    function getGraphStatistics(id, type) {
      // Make an Ajax request to the specified route using POST method
      $.ajax({
        url: '/admin/graph-statistics', // Provide the correct URL with the appropriate prefix
        method: 'GET',
        data: {
          id: id,
          type: type
        },
        dataType: 'json',
        success: function(data) {
          var yaxis_maxp = data.total_protein_yaxis;
          var yaxis_maxl = data.total_leucine_yaxis;

          var labels = [];
          var protein_sum = [];
          var leucine_sum = [];

          $.each(data.xaxis_values, function(index, item) {
            labels.push(item.label);
            protein_sum.push(item.protein_sum);
            leucine_sum.push(item.leucine_sum);
          });

          localStorage.setItem('yaxis_maxp', JSON.stringify(yaxis_maxp));
          localStorage.setItem('yaxis_maxl', JSON.stringify(yaxis_maxl));
          localStorage.setItem('protein_sum', JSON.stringify(protein_sum));
          localStorage.setItem('leucine_sum', JSON.stringify(leucine_sum));
          localStorage.setItem('label', JSON.stringify(labels));

          var newData = {
            labels: JSON.parse(localStorage.getItem('label')),
            series: JSON.parse(localStorage.getItem('protein_sum')),
            yaxis: parseInt(JSON.parse(localStorage.getItem('yaxis_maxp'))),
          };
          updateChart(newData);
        },
        error: function(xhr, status, error) {
          console.error('Error:', error);
        }
      });
    }

    function updateChart(newData) {
      chart.updateSeries([
        {
          name: 'Protein',
          data: newData.series,
        },
      ]);
      chart.updateOptions({
        xaxis: {
          categories: newData.labels,
        },
        yaxis: {
             tickAmount: 4,
            max: newData.yaxis,
        },
      });
    }

    var chart = createChart();

  </script>
@endsection