@extends('Admin.include.masterLayout')
@section('title')
Opportunites
@endsection
@section('page_title')
Opportunites List
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
                                <a href="{{ route('admin.opportunites.currentOpportunites') }}">
                                    Opportunites List
                                </a>
                                <span class="breadcrumb__seperator">
                                    <span class="la la-angle-right"></span>
                                </span>
                            </li>
                            <li class="atbd-breadcrumb__item">
                                @if(isset($CurrentOpportunites) && !empty($CurrentOpportunites)) Opportunites Edit @else Opportunites Add @endif
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
                        @if (isset($CurrentOpportunites))
                            {!! Form::open([
                                'route' => 'admin.opportunites.update',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', optional($CurrentOpportunites)->id, ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @else
                            {!! Form::open([
                                'route' => 'admin.opportunites.store',
                                'method' => 'POST',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            {!! Form::hidden('id', '', ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @endif
                        <!-- Name -->
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="name" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    position Name<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('name', isset($CurrentOpportunites->name) ? $CurrentOpportunites->name : '', [
                                    'placeholder' => 'Enter position Name',
                                    'id' => 'name',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="name_error" class="text-danger"> @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Location -->
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="location" class="col-form-label color-dark fs-14 fw-500 align-center">
                                Location<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('location', isset($CurrentOpportunites->location) ? $CurrentOpportunites->location : '', [
                                    'placeholder' => 'Enter Title',
                                    'id' => 'location',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="location_error" class="text-danger"> @error('location')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="description" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Description<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea(
                                    'description',
                                    isset($CurrentOpportunites->description) ? $CurrentOpportunites->description : '',
                                    [
                                        'placeholder' => 'Enter Description',
                                        'id' => 'description',
                                        'class' => 'form-control add-another-rest',
                                    ],
                                ) !!}
                                <div id="description_error" class="text-danger"> @error('description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="status" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Status</span>
                                </label>
                            </div>
                            <div class="col-sm-9 d-flex align-items-center">
                                <div class="custom-control custom-switch switch-primary switch-md ">
                                    <input type="checkbox" name="status" class="custom-control-input" id="switch_status" onChange="changeStatus(event.target);" {{ (isset($CurrentOpportunites->status) && $CurrentOpportunites->status == 1) || !isset($CurrentOpportunites->status) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="switch_status"></label>
                                </div>
                                @if($errors->has('status'))
                                    <div class="text-danger">{{ $errors->first('status') }}</div>
                                @endif
                                <span class="text-danger" id="errorStatus"></span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-3 label_right">
                            </div>
                            <div class="col-sm-9">
                                <div class="layout-button mt-25">
                                    <button type="submit" class="btn btn-sm btn-primary btn-add px-30" id="">
                                        @if (isset($CurrentOpportunites) && $CurrentOpportunites->count() > 0)
                                            {{ trans('label.update') }}
                                        @else
                                            {{ trans('label.save') }}
                                        @endif
                                    </button>
                                    <a class="btn btn-default btn-squared border-normal bg-normal px-30"
                                        href="{{ route('admin.opportunites.currentOpportunites') }}">{{ trans('label.cancel') }}</a>
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

            CKEDITOR.replace('description');
            var isImageUploded = $('#old_image').val() ? true : false;
            $('#form').validate({
                ignore: [],
                rules: {
                    'name': {
                        required: true,
                    },
                    'location': {
                        required: true,
                    },
                    'description': {
                        required: function() {
                            var editor = CKEDITOR.instances.description;
                            if (editor) {
                                var text = editor.getData().replace(/<[^>]*>/g, '');
                                return text.length === 0;
                            }
                            return true;
                        }
                    }
                },
                messages: {
                    'name': {
                        required: "Please enter a name"
                    },
                    'location': {
                        required: "Please enter a location"
                    },
                    'description': {
                        required: "Please enter a description"
                    }
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

        // status change
        function changeStatus(_this) {
            var status = $(_this).prop('checked') == true ? 1 : 0;
            var $collectedIsVisible = '';
            if ($('#switch_status').is(':checked')) {
                $collectedIsVisible = $('#switch_status').attr('value', 1);
            }
            else {
                $collectedIsVisible = $('#switch_status').attr('value', 0);
            }
        }
    </script>
    </script>
@endsection
