@extends('Admin.include.masterLayout')
@section('title')
    Contact Us Form View
@endsection
@section('page_title')
    Contact Us Form View
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
                                <a href="{{ route('admin.contactusform.list') }}">
                                    Contact Us Form List
                                </a>
                                <span class="breadcrumb__seperator">
                                    <span class="la la-angle-right"></span>
                                </span>
                            </li>
                            <li class="atbd-breadcrumb__item">
                                Contact Us Form View
                            </li>
                        </ul>
                    </div>
                    <div class="horizontal-form">
                        <!-- Form -->

                        {{ Form::open([]) }}
                        <!-- Image Upload -->


                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="name" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Name
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('name', isset($contactusformview->name) ? $contactusformview->name : '', [
                                    'class' => 'form-control add-another-rest',
                                    'readonly' => 'readonly',
                                    'disabled' => 'disabled',
                                ]) !!}
                                
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="number" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Number
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('number', isset($contactusformview->number) ? $contactusformview->number : '', [
                                    'class' => 'form-control add-another-rest',
                                    'readonly' => 'readonly',
                                    'disabled' => 'disabled',
                                ]) !!}
                                
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="division" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Division
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('division', isset($divisionname->title) ? strip_tags($divisionname->title) : '', [
                                    'class' => 'form-control add-another-rest',
                                    'readonly' => 'readonly',
                                    'disabled' => 'disabled',
                                ]) !!}
                                
                            </div>
                        </div>

                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="email" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Email
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::text('email', isset($contactusformview->email) ? $contactusformview->email : '', [
                                    'class' => 'form-control add-another-rest',
                                    'readonly' => 'readonly',
                                    'disabled' => 'disabled',
                                ]) !!}
                                
                            </div>
                        </div>
                        <div class="form-group row mb-25">
                            <div class="col-sm-3 d-flex justify-content-end">
                                <label for="message" class="col-form-label color-dark fs-14 fw-500 align-center">
                                    Message
                                </label>
                            </div>
                            <div class="col-sm-9">
                                {!! Form::textarea('message', isset($contactusformview->message) ? $contactusformview->message : '', [
                                    'readonly' => 'readonly',
                                    'disabled' => 'disabled',
                                    'class' => 'form-control add-another-rest',
                                ]) !!}
                                
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
                            <div class="col-sm-3 label_right">
                            </div>
                            <div class="col-sm-9">
                                <div class="layout-button mt-25">
                                    <a class="btn btn-default btn-squared border-normal bg-normal px-30"
                                        href="{{ route('admin.contactusform.list') }}">Go Back</a>
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
