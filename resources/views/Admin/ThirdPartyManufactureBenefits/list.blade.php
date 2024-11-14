@extends('Admin.include.masterLayout')
@section('title') {{ trans('label.third_party_benefits_list') }} @endsection
@section('page_title') {{ trans('label.third_party_benefits_list') }} @endsection
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
                    <a href="{{ route('admin.third_party_manufacturing_benefits.add') }}" class="btn btn-sm btn-primary btn-add">
                        <i class="la la-plus"></i> {{ trans('label.add_third_party_benefits') }}
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
                            {{ trans('label.third_party_benefits_list') }}
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
                            <th><span class="userDatatable-title">Images</span></th>
                            <th><span class="userDatatable-title">Title</span></th>
                            <th><span class="userDatatable-title">Description</span></th>
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
            var url = "{{ url('admin/third_party_manufacturing_benefits/status-change') }}/" + id
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
				    "zeroRecords": "No Third Party Manufacturing Benefits",
			    },
                ajax: "{{ route('admin.third_party_manufacturing_benefits.list') }}",
                columns: [
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, full, meta) {
                            if (type === 'display') {
                                return '<img class="bg-dark" src="' + data + '" alt="Image" width="50" height="50">';
                            }
                            return data;
                        }
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data : 'description',
                        name : 'description'
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
