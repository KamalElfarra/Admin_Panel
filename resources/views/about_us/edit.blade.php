@extends('layouts.app')
@section('content')

    <div class="card-body">

        <form method="POST" action="/about/save">
            @csrf
            <div class="form-group" style="width: 40%;">
                <label for="exampleFormControlTextarea1">about us</label>
                <textarea name="about" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$edit->aboutUs}}</textarea>
            </div>

            <div class="form-group" style="width: 40%;">
                <label for="exampleFormControlTextarea1">terms</label>
                <textarea name="term" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$edit->terms}}</textarea>
            </div>

            <div class="form-group" style="width: 40%;">
                <label for="exampleFormControlTextarea1">privacy_policy</label>
                <textarea name="privacy" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$edit->privacyPolicy}}</textarea>
            </div>

            <input type="submit" class="mt-4 mb-4 btn btn-primary" value="edit"/>

        </form>
    </div>

@endsection
