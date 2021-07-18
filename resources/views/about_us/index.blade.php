@extends('layouts.app')
@section('content')

    <div class="card-body">

        <div class="form-group" style="width: 40%;">
            <label for="exampleFormControlTextarea1">About us</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{$result[0]->aboutUs}}</textarea>
        </div>

        <div class="form-group" style="width: 40%;">
            <label for="exampleFormControlTextarea1">Terms</label>
            <textarea  class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{$result[0]->terms}}</textarea>
        </div>


        <div class="form-group" style="width: 40%;">
            <label for="exampleFormControlTextarea1">PrivacyPolicy</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{$result[0]->privacyPolicy}}</textarea>
           <a href="/about/edit/{{$result[0]->getObjectId()}}"><input type="submit" class="mt-4 mb-4 btn btn-primary" value="edit"/></a>
        </div>


    </div>
@endsection
