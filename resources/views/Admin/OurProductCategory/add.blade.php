@extends('Admin.include.masterLayout')
@section('title')
    {{ trans('label.ourProductCategory') }}
@endsection
@section('page_title')
    {{ trans('label.ourProductCategory') }}
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
                                @if (isset($companyProfile) && !empty($companyProfile))
                                Edit Our Product Category 
                                @else
                                Add Our Product Category 
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="horizontal-form">
                        <!-- Form -->
                        @if (isset($companyProfile))
                            {!! Form::open([
                                'route' => 'admin.ourproductscategory.update',
                                'method' => 'POST',
                                'class' => 'form-horizontal',
                                'id' => 'form',
                            ]) !!}
                            {!! Form::hidden('id', isset($companyProfile->id) ? $companyProfile->id : '', [
                                'class' => 'form-control',
                                'id' => 'hiddenId',
                            ]) !!}
                        @else
                            {{ Form::open(['route' => 'admin.ourproductscategory.store', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'form']) }}
                            {!! Form::hidden('id', '', ['class' => 'form-control', 'id' => 'hiddenId']) !!}
                        @endif


                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="category_name" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Category Name<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('category_name', isset($companyProfile->category_name) ? $companyProfile->category_name : '', [
                                    'placeholder' => 'Enter Category name',
                                    'id' => 'category_name',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                <div id="category_name_error" class="text-danger"> @error('category_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row pb-2">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="division" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Division<span style="color:red" class="required">*</span>
                                </label>
                            </div>
                            <div class="col-sm-9">
                                
                                {{-- {!! Form::select(
                                    'division',
                                  $option,
                                    isset($corporateOfficeTourImage->category) ? $corporateOfficeTourImage->category : '',
                                    ['id' => 'division', 'class' => 'form-control add-another-rest'],
                                ) !!} --}}
                                <select name="division" id="division" class="form-control add-another-rest">
                                    @foreach ($data as $item)
                                        <option {{ (isset($companyProfile->division) && $companyProfile->division == $item->id) ? 'selected' : ''}} value="{{ $item->id }}">{!! $item->title !!}</option>
                                    @endforeach
                                </select>
                                <div id="division_error" class="text-danger"> @error('division')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Status -->
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="status" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Status</span>
                                </label>
                            </div>
                            <div class="col-sm-9 d-flex align-items-center">
                                <div class="custom-control custom-switch switch-primary switch-md ">
                                    <input type="checkbox" name="status" class="custom-control-input" id="switch_status"
                                        onChange="changeBlogStatus(event.target);"
                                        {{ (isset($companyProfile->status) && $companyProfile->status == 1) || !isset($companyProfile->status) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="switch_status"></label>
                                </div>
                                @if ($errors->has('status'))
                                    <div class="text-danger">{{ $errors->first('status') }}</div>
                                @endif
                                <span class="text-danger" id="errorStatus"></span>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
                            <div class="col-sm-3 label_right">
                            </div>
                            <div class="col-sm-9">
                                <div class="layout-button mt-25">
                                    <button type="submit" class="btn btn-sm btn-primary btn-add px-30" id="">
                                        @if (isset($companyProfile) && $companyProfile->count() > 0)
                                            {{ trans('label.update') }}
                                        @else
                                            {{ trans('label.save') }}
                                        @endif
                                    </button>
                                    <a class="btn btn-default btn-squared border-normal bg-normal px-30"
                                        href="{{ route('admin.ourproductscategory.list') }}">{{ trans('label.cancel') }}</a>
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
                    'category_name': {
                        required: true,
                        minlength: 2,
                    },
                    'division':{
                        required: true,
                    },
                },
                messages: {
                    'category_name': {
                        required: "Please enter a Product Category ",
                        minlength: "Product Category must be at least 2 characters",
                    },
                    'division': {
                        required: "Please enter a Division",
                    },
                },
                errorPlacement: function(error, element) {
                    console.log(element.val());
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
