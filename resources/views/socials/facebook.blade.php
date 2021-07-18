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
                                    <br>
                                    <img style="width: 30px; height: 30px; margin-right: 50px; top: 20%; "  src="data:image/jpeg;base64,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" alt="sunil">
                                    <h4 style="margin-left: 30px; top: 10%; position: absolute;">facebook</h4>

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
                                        <th class="">username</th>
                                        <th class="">firstname</th>
                                        <th class="">lastname</th>
                                        <th class="">number</th>
                                        <th class="">Icon</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($facebook as $ta)
                                        <tr>
                                            <td class="checkbox-column">
                                                <label class="new-control new-checkbox checkbox-primary" style="height: 18px; margin: 0 auto;">
                                                    <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                                    <span class="new-control-indicator"></span>
                                                </label>
                                            </td>
                                            <td>{{$ta->username}}</td>
                                            <td>{{$ta->firstname}}</td>
                                            <td>{{$ta->lastname}}</td>
                                            <td>{{$ta->number}}</td>
                                            <td>
                                                <a href="/socials/edit/{{$ta->getObjectId()}}" data-toggle="tooltip" data-placement="top" title="reply"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                <a href="/socials/delete/{{$ta->getObjectId()}}" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
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
                                                        <a href="/complaints/index/{{$p->page_number}}?search={{$value}}&&group_list={{$displayLimit}}" aria-controls="zero-config" data-dt-idx="1" tabindex="0" class="page-link">
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
