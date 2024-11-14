@extends('Admin.include.masterLayout')
@section('title') {{ trans('label.director_list') }} @endsection
@section('page_title') {{ trans('label.director_list') }} @endsection
@section('styles')
@endsection
@section('content')
<!-- BEGIN CONTENT -->
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-main">
            <h4 class="text-capitalize breadcrumb-title"></h4>
            <div class="breadcrumb-action justify-content-center flex-wrap">
                <div class="action-btn">
                    <a href="{{ route('admin.director.add') }}" class="btn btn-sm btn-primary btn-add">
                        <i class="la la-plus"></i> {{ trans('label.add_director') }}
                    </a>
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
                            {{ trans('label.director_list') }}
                        </li>
                    </ul>
                </div>
                @if ($message = Session::get('alert-success'))
                <div class="alert alert-success" style="display: block;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <table class="table mb-0 table-borderless" id="plan-table">
                    <thead>
                        <tr class="userDatatable-header">
                            <th><span class="userDatatable-title">{{ trans('label.name') }}</span></th>
                            <th><span class="userDatatable-title">{{ trans('label.designation') }}</span></th>
                            {{-- <th><span class="userDatatable-title">{{ trans('label.date_created') }}</span></th> --}}
                            <th><span class="userDatatable-title ">{{ trans('label.status') }}</span></th>
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
            var url = "{{ url('admin/director/status-change') }}/" + id
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
            // console.log("<<<>>>"); return;
            $('#plan-table').DataTable({
                processing: true,
                serverSide: true,
                "language": {
				    "zeroRecords": "No Directors found",
			    },
                ajax: "{{ route('admin.director.list') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },

                    {
                        data: 'designation',
                        name: 'designation'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable: false,
                        className: 'align-middle',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'align-middle',
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
