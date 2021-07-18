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
                <form method="POST" action="/socials/update/{{$edit->getObjectId()}}">
                    @csrf

                    <div class="form-group row mb-4">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" id="colFormLabel" value="{{$edit->username}}">
                        </div>
                        @error('username')
                        <small class="form-text text-danger">the username is required</small>
                        @enderror
                    </div>
                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">firstname</label>
                        <div class="col-sm-10">
                            <input type="text" name="firstname" class="form-control form-control-lg" id="colFormLabelLg" value="{{$edit->firstname}}">
                        </div>
                        @error('firstname')
                        <small class="form-text text-danger">the firstname is required</small>
                        @enderror

                    </div>
                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">lastname</label>
                        <div class="col-sm-10">
                            <input type="text" name="lastname" class="form-control form-control-lg" id="colFormLabelLg" value="{{$edit->lastname}}">
                        </div>
                        @error('lastname')
                        <small class="form-text text-danger">the lastname is required</small>
                        @enderror

                    </div>
                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">number</label>
                        <div class="col-sm-10">
                            <input type="text" name="number" class="form-control form-control-lg" id="colFormLabelLg" value="{{$edit->number}}">
                        </div>
                        @error('number')
                        <small class="form-text text-danger">the number is required</small>
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
