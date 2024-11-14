@extends('Admin.include.masterLayout')
@section('title') Download Visuale Ads Form List @endsection
@section('page_title') Download Visuale Ads Form List @endsection
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
                            Download Visuale Ads Form List
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
                            <th><span class="userDatatable-title">Category</span></th>
                            <th><span class="userDatatable-title">Name</span></th>
                            <th><span class="userDatatable-title ">Email</span></th>
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
       

        $(document).ready(function() {
            $('#plan-table').DataTable({
                processing: true,
                serverSide: true,
                "language": {
				    "zeroRecords": "No Data found",
			    },
                ajax: "{{ route('admin.visual_ads_form.list') }}",
                columns: [{
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
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
