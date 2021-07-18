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
                                    <h4 style="margin-left: 30px; top: 20%; position: absolute;">whatsapp</h4>
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
                                    @foreach($whatsapp as $ta)
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
