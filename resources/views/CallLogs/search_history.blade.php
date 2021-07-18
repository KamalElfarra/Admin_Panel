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
                                <table  class="table table-striped" style="margin-right: 100px;" >
                                    <thead>
                                    <tr>
                                        <th class="checkbox-column">
                                            <label class="new-control new-checkbox checkbox-primary" style="height: 18px; margin: 0 auto;">
                                                <input type="checkbox" class="new-control-input todochkbox" id="todoAll">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </th>
                                        {{--                                <th class="">objectId</th>--}}
                                        <th class="">number</th>
                                        <th class="">name</th>
                                        <th class="">date</th>
                                        <th class="">searchPrefix</th>
                                        <th class="">userPrefix</th>
                                        <th class="">Icons</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($history as $ta)
                                        <tr>
                                            <td class="checkbox-column">
                                                <label class="new-control new-checkbox checkbox-primary" style="height: 18px; margin: 0 auto;">
                                                    <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                                    <span class="new-control-indicator"></span>
                                                </label>
                                            </td>
                                            <td>{{$ta->number}}</td>
                                            <td>{{$ta->name}}</td>
                                            <td>{{$ta->date}}</td>
                                            <td>{{$ta->searchPrefix}}</td>
                                            <td>{{$ta->userPrefix}}</td>
                                            <td>
                                                <a href="/users/history/{{$ta->getObjectId()}}" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                <a href="/users/history/{{$ta->getObjectId()}}" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
                                                <a href="/users/history/{{$ta->getObjectId()}}" data-toggle="tooltip" data-placement="top" title="info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-diamond-fill" viewBox="0 0 16 16"><path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg></a></li>

                                            </td>
                                        </tr>
                                    @endforeach

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
                                                        <a href="/users/history/{{$p->page_number}}?search={{$value}}&&group_list={{$displayLimit}}" aria-controls="zero-config" data-dt-idx="1" tabindex="0" class="page-link">
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
