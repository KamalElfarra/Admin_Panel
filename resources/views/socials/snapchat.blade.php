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
                                    <h4 style="margin-left: 30px; top: 20%; position: absolute;">snapchat</h4>


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
                                        <th class="">icon</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($snapchat as $ta)
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
