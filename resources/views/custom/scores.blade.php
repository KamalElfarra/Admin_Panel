@extends('layouts.app')

@section('content')
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Score</th>
                                            <th>cheatMode</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th class="no-content"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($scores as $s)
                                        <tr>
                                            <td>{{$s->ID}}</td>
                                            <td>{{$s->playerName }}</td>
                                            <td>{{$s->score}}</td>
                                            <td>{{$s->cheatMode}}</td>
                                            <td>{{$s->cheatMode}}</td>
                                            <td>{{$s->cheatMode}}</td>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
@endsection
