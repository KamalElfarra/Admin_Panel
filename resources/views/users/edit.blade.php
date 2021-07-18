@extends('layouts.app')

@section('content')
    <hr>
    <div class="col-lg-12 col-12  layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>updating data </h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form method="POST" action="/users/update/{{$edit->getObjectId()}}">
                    @csrf

                    <div class="form-group row mb-4">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">androidSerial</label>
                        <div class="col-sm-10">
                            <input type="text" name="androidSerial" class="form-control" id="colFormLabel" value="{{$edit->androidSerial}}">
                        </div>
                        @error('androidSerial')
                        <small class="form-text text-danger">the androidSerial is required</small>
                        @enderror
                    </div>
                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">fullVersion</label>
                        <div class="col-sm-10">
                            <input type="text" name="fullVersion" class="form-control form-control-lg" id="colFormLabelLg" value="{{$edit->fullVersion}}">
                        </div>
                        @error('fullVersion')
                        <small class="form-text text-danger">the fullVersion is required</small>
                        @enderror

                    </div>
                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">host</label>
                        <div class="col-sm-10">
                            <input type="text" name="host" class="form-control form-control-lg" id="colFormLabelLg" value="{{$edit->host}}">
                        </div>
                        @error('host')
                        <small class="form-text text-danger">the host is required</small>
                        @enderror

                    </div>
                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">company</label>
                        <div class="col-sm-10">
                            <input type="text" name="company" class="form-control form-control-lg" id="colFormLabelLg" value="{{$edit->company}}">
                        </div>
                        @error('company')
                        <small class="form-text text-danger">the company is required</small>
                        @enderror

                    </div>

                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">model</label>
                        <div class="col-sm-10">
                            <input type="text" name="model" class="form-control form-control-lg" id="colFormLabelLg" value="{{$edit->model}}">
                        </div>
                        @error('model')
                        <small class="form-text text-danger">the model is required</small>
                        @enderror

                    </div>

                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">deviceName</label>
                        <div class="col-sm-10">
                            <input type="text" name="deviceName" class="form-control form-control-lg" id="colFormLabelLg" value="{{$edit->deviceName}}">
                        </div>
                        @error('deviceName')
                        <small class="form-text text-danger">the deviceName is required</small>
                        @enderror

                    </div>

                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">version</label>
                        <div class="col-sm-10">
                            <input type="text" name="version" class="form-control form-control-lg" id="colFormLabelLg" value="{{$edit->version}}">
                        </div>
                        @error('version')
                        <small class="form-text text-danger">the version is required</small>
                        @enderror

                    </div>

                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control form-control-lg" id="colFormLabelLg" value="{{$edit->email}}">
                        </div>
                        @error('email')
                        <small class="form-text text-danger">the email is required</small>
                        @enderror

                    </div>

                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">country</label>
                        <div class="col-sm-10">
                            <input type="text" name="country" class="form-control form-control-lg" id="colFormLabelLg" value="{{$edit->country}}">
                        </div>
                        @error('country')
                        <small class="form-text text-danger">the country is required</small>
                        @enderror

                    </div>

                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">active</label>
                        <div class="col-sm-10">
                            <input type="text" name="active" class="form-control form-control-lg" id="colFormLabelLg" value="{{$edit->active}}">
                        </div>
                        @error('active')
                        <small class="form-text text-danger">the active is required</small>
                        @enderror

                    </div>

                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">free</label>
                        <div class="col-sm-10">
                            <input type="text" name="free" class="form-control form-control-lg" id="colFormLabelLg" value="{{$edit->free}}">
                        </div>
                        @error('free')
                        <small class="form-text text-danger">the free is required</small>
                        @enderror

                    </div>

                    <input type="submit" class="btn btn-primary" value="save"/>

                </form>

                <div class="code-section-container">

                    <button class="btn toggle-code-snippet"><span>Code</span></button>

                    <div class="code-section text-left">


                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
