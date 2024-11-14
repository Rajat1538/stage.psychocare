@extends('Admin.include.masterLayout')
@section('title')
    {{ trans('label.we_believe_points') }}
@endsection
@section('styles')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title"></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-horizontal card-default card-md mb-4">

                <div class="card-body py-md-30">
                    <div class="card card-default card-md mb-4">
                        <ul class="atbd-breadcrumb nav">
                            <li class="atbd-breadcrumb__item">
                                <a href="{{ route('admin.dashboard') }}">
                                    {{ trans('label.home') }}
                                </a>
                                <span class="breadcrumb__seperator">
                                    <span class="la la-angle-right"></span>
                                </span>
                            </li>
                            <li class="atbd-breadcrumb__item">
                                <a href="{{ route('admin.we_believe_points.list') }}">
                                    {{ trans('label.we_believe_points_list') }}
                                </a>
                                <span class="breadcrumb__seperator">
                                    <span class="la la-angle-right"></span>
                                </span>
                            </li>
                            <li class="atbd-breadcrumb__item">
                                @if (isset($weBelievePoint))
                                    {{ trans('label.edit_we_believe_points') }}
                                @else
                                    {{ trans('label.add_we_believe_points') }}
                                @endif
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
                    <div class="horizontal-form">
                        <!-- Form -->
                        @if (!empty($weBelievePoint))
                            {!! Form::open([
                                'route' => 'admin.we_believe_points.update',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', isset($weBelievePoint->id) ? $weBelievePoint->id : '', [
                                'class' => 'form-control',
                                'id' => 'hiddenId',
                            ]) !!}
                        @else
                            {{ Form::open(['route' => 'admin.we_believe_points.store', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal', 'id' => 'form', 'enctype' => 'multipart/form-data']) }}
                            {!! Form::hidden('id', '', ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @endif

                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="point" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Point<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('point', isset($weBelievePoint->point) ? $weBelievePoint->point : '', [
                                    'placeholder' => 'Enter Point',
                                    'id' => 'point',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="point_error" class="text-danger"> @error('point')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="status" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Status</span>
                                </label>
                            </div>
                            <div class="col-sm-9 d-flex align-items-center">
                                <div class="custom-control custom-switch switch-primary switch-md ">
                                    <input type="checkbox" name="status" class="custom-control-input" id="switch_status"
                                        onChange="changeBlogStatus(event.target);"
                                        {{ (isset($weBelievePoint->status) && $weBelievePoint->status == 1) || !isset($weBelievePoint->status) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="switch_status"></label>
                                </div>
                                <div id="status_error" class="text-danger"> @error('point')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
                            <div class="col-sm-3 label_right">
                            </div>
                            <div class="col-sm-9">
                                <div class="layout-button mt-25">
                                    <button type="submit" class="btn btn-sm btn-primary btn-add px-30"
                                        id="add_blogs_validation">
                                        @if (isset($weBelievePoint) && !empty($weBelievePoint))
                                            {{ trans('label.update') }}
                                        @else
                                            {{ trans('label.save') }}
                                        @endif
                                    </button>
                                    <a class="btn btn-default btn-squared border-normal bg-normal px-30 "
                                        href="{{ route('admin.we_believe_points.list') }}">{{ trans('label.cancel') }}</a>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')


    <script type="text/javascript">
        $(document).ready(function() {

            $('#form').validate({
                ignore: [],
                rules: {
                    'point': {
                        required: true,
                    },
                },
                messages: {
                    'point': {
                        required: "Please enter a point",
                    },
                },
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    $('#' + element.attr('name') + '_error').html(error)
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    startLoader()
form.submit();
                }
            });

        });
    </script>

    <script type="text/javascript">
        var elems = Array.prototype.slice.call(document.querySelectorAll('.switch-btn'));
        $('.switch-btn').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // status change
        function changeBlogStatus(_this) {
            var status = $(_this).prop('checked') == true ? 1 : 0;
            var $collectedIsVisible = '';
            if ($('#switch_status').is(':checked')) {
                $collectedIsVisible = $('#switch_status').attr('value', 1);
            } else {
                $collectedIsVisible = $('#switch_status').attr('value', 0);
            }
        }
    </script>
@endsection
