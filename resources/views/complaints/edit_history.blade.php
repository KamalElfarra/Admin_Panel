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
                <form method="POST" action="/users/update_history/{{$SearchHistory->getObjectId()}}">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">number</label>
                        <div class="col-sm-10">
                            <input type="text" name="number" class="form-control" id="colFormLabel" value="{{$SearchHistory->number}}">
                        </div>
                        @error('number')
                        <small class="form-text text-danger">the number is required</small>
                        @enderror
                    </div>
                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control form-control-lg" id="colFormLabelLg" value="{{$SearchHistory->name}}">
                        </div>
                        @error('name')
                        <small class="form-text text-danger">the name is required</small>
                        @enderror

                    </div>

                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">searchPrefix</label>
                        <div class="col-sm-10">
                            <input type="text" name="searchPrefix" class="form-control form-control-lg" id="colFormLabelLg" value="{{$SearchHistory->searchPrefix}}">
                        </div>
                        @error('searchPrefix')
                        <small class="form-text text-danger">the searchPrefix is required</small>
                        @enderror

                    </div>

                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">userPrefix</label>
                        <div class="col-sm-10">
                            <input type="text" name="userPrefix" class="form-control form-control-lg" id="colFormLabelLg" value="{{$SearchHistory->userPrefix}}">
                        </div>
                        @error('userPrefix')
                        <small class="form-text text-danger">the userPrefix is required</small>
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
