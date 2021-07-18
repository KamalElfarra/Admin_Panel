@extends('layouts.app')
@section('content')
    <hr>

    <div class="card-header">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </div>
    <div class="row layout-top-spacing">
        <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">


            <div class="card-body">
                <div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Table View</h4>
                                    {{--                            <a href="/tables/create" class="btn btn-danger " style="align-content: center">store</a>--}}


                                </div>
                            </div>
                        </div>


                        <div class="widget-content widget-content-area">

                            @yield('content')


                            <form method="get" class="example" style="text-align: right;">
                                <div class="d-flex justify-content-between">
                                    <div >
                                        <label>
                                            <select onchange="this.form.submit()" name="group_list" aria-controls="zero-config" class="form-control">
                                                @for($i=20; $i<=100;$i=$i+20)
                                                    <option value="{{$i}}" @if($i == $displayLimit) selected  @endif>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </label>
                                    </div>
                                    <div >
                                        <input   type="text" value="{{$value}}" placeholder="Search.." name="search">
                                        <button  class="search" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>


                            </form>

                            <div class="table-responsive">
                                <table class="table table-striped" style="margin-right: 100px;" >
                                    <thead>
                                    <tr>
                                        <th class="checkbox-column">
                                            <label class="new-control new-checkbox checkbox-primary" style="height: 18px; margin: 0 auto;">
                                                <input type="checkbox" class="new-control-input todochkbox" id="todoAll">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </th>
                                        {{--                                <th class="">objectId</th>--}}
                                        <th class="">reply_user</th>
                                        <th class="">name</th>

                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                    @foreach($complain as $ta)--}}
                                        <tr>
                                            <td class="checkbox-column">
                                                <label class="new-control new-checkbox checkbox-primary" style="height: 18px; margin: 0 auto;">
                                                    <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                                    <span class="new-control-indicator"></span>
                                                </label>
                                            </td>
                                            <td>{{$complain->reply_user}}</td>
                                            <td>{{$complain->name}}</td>
                                        </tr>
{{--                                    @endforeach--}}

                                    </tbody>

                                </table>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="zero-config_info" role="status" aria-live="polite">
                                            Showing records {{$from}} to {{ $to }}  of {{$total}}
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="zero-config_paginate">
                                            <ul class="pagination">


                                                <!--                                        --><?php //$i=1;?>
                                                @foreach($pages as $p)
                                                    <li class="paginate_button page-item {{ $p->active }}  {{ $p->disabled }} " >
                                                        <a href="/users/complains/{{$p->page_number}}/{{$users[0]->getObjectId()}}?search={{$value}}&&group_list={{$displayLimit}}" aria-controls="zero-config" data-dt-idx="1" tabindex="0" class="page-link">
                                                            {{$p->text}}
                                                        </a>
                                                    </li>
                                                @endforeach


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
