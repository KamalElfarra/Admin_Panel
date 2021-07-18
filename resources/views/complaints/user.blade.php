@extends('layouts.app')
@section('content')

    <style>

        body{
            background: #f7f7ff;
            margin-top:20px;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }
        .me-2 {
            margin-right: .5rem!important;
        }

    </style>

    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">

                                @if(isset($query->photo))
                                   <img src="{{$query->photo->getUrl()}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                @else
                                   <img src="data:image/png;base64,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" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                @endif

                                @if(isset($query))

                                <div class="mt-3">
                                    <h4>{{ $query->deviceName }}</h4>
                                    <p class="text-secondary mb-1">{{ $query->active }}</p>
                                    {{--  <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                    <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button>  --}}
                                </div>
                                @else

                                    <div class="mt-3">
                                        <h4>there is no user !!</h4>
                                        <p class="text-secondary mb-1"></p>
                                        {{--  <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                        <button class="btn btn-primary">Follow</button>
                                        <button class="btn btn-outline-primary">Message</button>  --}}
                                    </div>

                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">

                    @if(isset($query))
                    <div class="card" style="width: 500px; ">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">deviceName</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{ $query->deviceName }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">androidSerial</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{ $query->androidSerial }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">active</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{ $query->active }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">host</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{ $query->host }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">model</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{ $query->model }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">country</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{ $query->country }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="card" style="width: 500px; ">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-5">
                                        <h6 class="mb-0">deviceName</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-5">
                                        <h6 class="mb-0">androidSerial</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-5">
                                        <h6 class="mb-0">active</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-5">
                                        <h6 class="mb-0">host</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-5">
                                        <h6 class="mb-0">model</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <h6 class="mb-0">country</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(isset($query))

                    <div class="col-sm-12" style="position: absolute; top: 20px; margin-left: 110%;" >
                        <div class="widget widget-five">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>total count search of {{ $query->deviceName }}</h6>
                                        <p class="meta-date">Nov 2019</p>
                                    </div>

                                </div>

                                <div class="w-content">
                                    <div class="">
                                        <p class="task-left">{{ $query->total_search }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    @else
                            <div class="col-sm-12" style="position: absolute; top: 20px; margin-left: 110%;" >
                                <div class="widget widget-five">
                                    <div class="widget-content">

                                        <div class="header">
                                            <div class="header-body">
                                                <h6>total count search of the user</h6>
                                                <p class="meta-date">Nov 2019</p>
                                            </div>

                                        </div>

                                        <div class="w-content">
                                            <div class="">
                                                <p class="task-left"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                    @endif

                    <div class="table-responsive" style="position: absolute; top: 270px; margin-left: 115%;">
                        @if($query)
                            <h6>the search history of {{ $query->deviceName }}</h6>
                            <a href="/complaints/history/1/{{$query->getObjectId()}}" style="color: #1b55e2; width: 100px;" target="_blank">see_all</a>
                            <br><br>
                        @else
                            <h6>the search history of the user</h6>
                            <a href="" style="color: #1b55e2; width: 100px;" target="_blank">see_all</a>
                            <br><br>
                        @endif

                        @if(isset($history))
                        <div class="card">
                               <table  class="table table-hover table-white mb-4">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach ($history as $s )
                                <tr>
                                    <td class="text-center"><?php echo $i++; ?></td>
                                    <td>{{ $s->name }}</td>
                                    <td>{{ $s->number }}</td>
                                    <td>{{ $s->date }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                        @else
                                <table  class="table table-hover table-white mb-4">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                        @endif
                    </div>

                        <br><br>
                        <hr>

                        <div class="table-responsive-md" style="position: absolute; top: 110%; margin-right: 100%;">

                            @if(isset($query))
                                <h6>the callLog of {{ $query->deviceName }}</h6>
                                <a href="/users/callLogs/1/{{$query->getObjectId()}}" style="color: #1b55e2; width: 100px;" target="_blank">see_all</a>
                                <br><br>
                            @else
                                <h6>the search history of the user</h6>
                                <a href="" style="color: #1b55e2; width: 100px;" target="_blank">see_all</a>
                                <br><br>
                            @endif
                            <div class="card">
                                <table  class="table table-hover table-white mb-4" >
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; ?>
                                    @foreach ($callLog as $s )
                                        <tr>
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td>{{ $s->name }}</td>
                                            <td>{{ $s->number }}</td>
                                            <td>{{ $s->date }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <br><br>

                        <div class="table-responsive" style="position: absolute; top: 110%; margin-left: 100%;">

                            @if(isset($query))
                                <h6>the contacts of {{ $query->deviceName }}</h6>
                                <a href="/users/contacts/1/{{$query->getObjectId()}}" style="color: #1b55e2; width: 100px;" target="_blank">see_all</a>
                                <br><br>
                            @else
                                <h6>the search history of the user</h6>
                                <a href="" style="color: #1b55e2; width: 100px;" target="_blank">see_all</a>
                                <br><br>
                            @endif
                            <div class="card">
                                <table  class="table table-hover table-white mb-4">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; ?>
                                    @foreach ($contact as $s )
                                        <tr>
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td>{{ $s->name }}</td>
                                            <td>{{ $s->number }}</td>
                                            <td>{{ $s->email }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>



                </div>
            </div>
        </div>
    </div>

@endsection
