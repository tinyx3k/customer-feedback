@extends('layouts.dashmix')
@section('style')
<link rel="stylesheet" href="{{ asset('css/anychart.css') }}">
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-12 col-md-12">
            <div class="block block-rounded block-bordered block-fx-shadow">
                <div class="block-header bg-primary">
                    <h3 class="block-title font-w700 text-white">Dominant Expression for {{ $item->name }}</h3>
                    <div class="block-options">
                        <a href="{{ route('item.index') }}" class="btn btn-sm btn-light"><i class="fa fa-chevron-left mr-1"></i>Go Back To Items List</a>
                    </div>
                </div>
                <div class="block-content text-center">
                    <h2>{{ $dominant }}</h2>
                    <h3 class="content-heading">Expression Logs</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm table-vcenter">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Expression</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($expressions as $expression)
                                <tr>
                                    <td>{{ date('Y-m-d H:i:s', strtotime($expression->created_at)+28800) }}</td>
                                    <td>{{ $expression->dominant }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="text-center">No Orders Yet!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <div class="block block-rounded block-bordered block-fx-shadow">
                <div class="block-header bg-primary">
                    <h3 class="block-title font-w700 text-white">Analytics Graph for {{ $item->name }}</h3>
                </div>
                <div class="block-content">
                    {{-- <span class="js-sparkline" data-type="line"
                          data-points="[930,860,1100,680,1300,1782,820,960]"
                          data-width="100%"
                          data-height="200px"
                          data-line-color="#43983b"
                          data-fill-color="transparent"
                          data-spot-color="transparent"
                          data-min-spot-color="transparent"
                          data-max-spot-color="transparent"
                          data-highlight-spot-color="#43983b"
                          data-highlight-line-color="#43983b"
                          data-tooltip-suffix="Sales"></span> --}}
                    <div id="sample-line" style="height: 500px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/anychart-base.min.js') }}"></script>
<script src="{{ asset('js/anychart-exports.min.js') }}"></script>
<script src="{{ asset('js/anychart-ui.min.js') }}"></script>
<script>
    $('.table').DataTable();
    anychart.onDocumentReady(function () {

        // create data
        var data = @json($formatted_graph_data);

        // create a chart
        var chart = anychart.line();

        // create a line series and set the data
        var series = chart.line(data);
        
        // set the chart title
        chart.title("Sales Analytics for {{ $item->name }}");

        // set the titles of the axes
        var xAxis = chart.xAxis();
        xAxis.title("Weeks");
        var yAxis = chart.yAxis();
        yAxis.title("Sales");

        // set the container id
        chart.container("sample-line");

        // initiate drawing the chart
        chart.draw();
    });
</script>
@stop