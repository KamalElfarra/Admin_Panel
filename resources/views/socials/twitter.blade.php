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
                                    <h4 style="margin-left: 30px; top: 20%; position: absolute;">twitter</h4>
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
                                    @foreach($twitter as $ta)
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
