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
                <form method="POST" action="/users/update_callLogs/{{$call->getObjectId()}}">
                    @csrf

                    <div class="form-group row mb-4">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">number</label>
                        <div class="col-sm-10">
                            <input type="text" name="number" class="form-control" id="colFormLabel" value="{{$call->number}}">
                        </div>
                        @error('number')
                        <small class="form-text text-danger">the number is required</small>
                        @enderror
                    </div>

                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control form-control-lg" id="colFormLabelLg" value="{{$call->name}}">
                        </div>
                        @error('name')
                        <small class="form-text text-danger">the name is required</small>
                        @enderror

                    </div>


                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">type</label>
                        <div class="col-sm-10">
                            <input type="text" name="type" class="form-control form-control-lg" id="colFormLabelLg" value="{{$call->type}}">
                        </div>
                        @error('type')
                        <small class="form-text text-danger">the type is required</small>
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
