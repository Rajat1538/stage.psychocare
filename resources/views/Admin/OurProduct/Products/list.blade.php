@extends('Admin.include.masterLayout')
@section('title') {{ trans('label.ourproduct_list') }} @endsection
@section('page_title') {{ trans('label.ourproduct_list') }} @endsection
@section('styles')
@endsection
@section('content')
<!-- BEGIN CONTENT -->
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-main">
            <h4 class="text-capitalize breadcrumb-title"></h4>
            <div class="breadcrumb-action justify-content-center flex-wrap">
                <div class="action-btn p-2">
                    <a href="{{ route('admin.our_product.add') }}" class="btn btn-sm btn-primary btn-add">
                        <i class="la la-plus"></i> {{ trans('label.add_ourproduct') }}
                    </a>
                </div>
                <div class="action-btn p-2">
                    <a href="{{ route('admin.products.uploadImages')}}" class="btn btn-sm btn-primary btn-add">
                        <i class="la la-plus"></i> Add Product Images 
                    </a>
                </div>
                <div class="action-btn p-2">
                    <form action="{{route('admin.products.import')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="xlsx_file" accept=".xls, .xlsx, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" style="display: none;" id="xlsx_file">
                        <label for="xlsx_file" class="btn btn-sm btn-primary btn-add">
                            <i class="la la-upload"></i> Import Xlsx
                        </label>
                        <button type="submit" style="display: none;"></button>
                    </form>
                    <a href="{{ URL::asset('resources/admin-asset/xlsx/simple.xlsx') }}" download="simple.xlsx">Sample Excel File</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-horizontal card-default card-md mb-4">
            <div class="card-body">
                <div class="card card-default card-md mb-4">
                    <ul class="atbd-breadcrumb nav">
                        <li class="atbd-breadcrumb__item">
                            <a href="{{route('admin.dashboard')}}">
                                {{ trans('label.home') }}
                            </a>
                            <span class="breadcrumb__seperator">
                                <span class="la la-angle-right"></span>
                            </span>
                        </li>
                        <li class="atbd-breadcrumb__item">
                            {{ trans('label.ourproduct_list') }}
                        </li>
                    </ul>
                </div>
                @if ($message = Session::get('alert-success'))
                <div class="alert alert-success" style="display: block;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('alert-error'))
                <div class="alert alert-danger" style="display: block;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <table class="table mb-0 table-borderless" id="plan-table">
                    <thead>
                        <tr class="userDatatable-header">
                            {{-- <th><span class="userDatatable-title">{{ trans('label.image') }}</span></th> --}}
                            <th><span class="userDatatable-title">id</span></th>
                            <th><span class="userDatatable-title">Product Title</span></th>
                            <th><span class="userDatatable-title">Product Label</span></th>
                            <th><span class="userDatatable-title">Packing Type</span></th>
                            <th><span class="userDatatable-title">Packing Size</span></th>
                            <th><span class="userDatatable-title ">Status</span></th>
                            <th><span class="userDatatable-title">Action</span></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    @endsection
    @section('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	    });
        function statusOnOff(id, _this) {
            var status = $(_this).prop('checked') == true ? 1 : 0
            var url = "{{ url('admin/our_product/status-change') }}/" + id
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    status: status
                },
                success: function(result) {}
            });
        }

        $(document).ready(function() {

            $('.import-btn').on('click', function() {
        $('#xlsx_file').click();
    });

    $('form').on('change', '#xlsx_file', function() {
        $(this).closest('form').submit();
    });
    
            $('#plan-table').DataTable({
                processing: true,
                serverSide: true,
                "language": {
				    "zeroRecords": "No Our Product found",
			    },
                ajax: "{{ route('admin.our_product.list') }}",
                order: [[0, 'desc']],
                columns: [{
                        data: 'id', // ID column
                        name: 'id',
                        visible: false
                    },
                    
                    {
                        data: 'product_title',
                        name: 'product_title'
                    },
                    {
                        data: 'product_label',
                        name: 'product_label'
                    },
                    {
                        data: 'packing_type',
                        name: 'packing_type'
                    },
                    {
                        data: 'packing_size',
                        name: 'packing_size'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: true
                    }
                ],

                "drawCallback": function() {
                    $('.switch-main').each(function() {
                        $(document).on('change', this, function() {

                        })
                    });
                }

            });
        });
    </script>
    @endsection
