@extends('layouts.app')
@section('content')
    <hr>

    <div class="col-lg-12 col-12 layout-spacing" style="width: 60%;">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>complaints</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area" >
                <form method="POST" action="/complaints/store" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group mb-4">
                        <label for="exampleFormControlInput2">name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput2" placeholder="enter your name">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleFormControlSelect1">address</label>
                        <input type="text" name="address" class="form-control" id="exampleFormControlInput2" placeholder="enter your address">
                    </div>

                    <div class="form-group mb-4">
                        <label for="exampleFormControlTextarea1">details</label>
                        <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-group mb-4 mt-3">
                        <label for="exampleFormControlFile1">photo</label>
                        <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <input type="submit" class="mt-4 mb-4 btn btn-primary" value="save"/>
                </form>
            </div>
        </div>
    </div>


@endsection
