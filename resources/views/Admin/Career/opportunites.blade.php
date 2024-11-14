@extends('Admin.include.masterLayout')
@section('title') CurrentOpportunites List @endsection
@section('page_title') CurrentOpportunites @endsection
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
                        <a href="{{ route('admin.opportunites.addOpportunites') }}" class="btn btn-sm btn-primary btn-add">
                            <i class="la la-plus"></i> Add Opportunites
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
                            Opportunites List
                            </li>
                        </ul>
                    </div>
                    @if ($message = Session::get('alert-success'))
                    <div class="alert alert-success" style="display: block;">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <table class="table mb-0 table-borderless" id="opportunites-table">
                        <thead>
                            <tr class="userDatatable-header">
                                <th><span class="userDatatable-title">Title</span></th>
                                <th><span class="userDatatable-title">Status</span></th>
                                <th><span class="userDatatable-title">Action</span></th>
                            </tr>
                        </thead>
                    </table>
                </div>
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
            var url = "{{ url('admin/opportunites/opportunitesstatus-change') }}/" + id
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
            $('#opportunites-table').DataTable({
                processing: true,
                serverSide: true,
                "language": {
                    "zeroRecords": "No Current Opportunites found",
                },
                ajax: "{{ route('admin.opportunites.currentOpportunites') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable: false,
                        className: 'align-middle'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'align-middle'
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
