@extends('layouts.app')
@section('content')


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        @include("include.style")

    </head>
    <body>

    <hr>
    <div class="messaging">
        <div class="inbox_msg">

            <div class="mesgs">
                <div class="msg_history">

                    <div class="incoming_msg">
                        <div class="incoming_msg_img"> <a href="/complaints/profile/{{$user[0]->getObjectId()}}"><img src="{{$user[0]->photo->getURL()  }}" > </a> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <h6>{{$user[0]->deviceName}}</h6>
                                <p>{{ $edit->reply_user }}</p>
                                <span class="time_date">
                                    {{$edit->createdAt}}
                               </span>
                            </div>
                        </div>
                    </div>

                    @foreach($replies as $re)
                        @if(isset($re->replyUser))

                            <div class="incoming_msg">

                                <div class="incoming_msg_img"> <a href="/complaints/profile/{{ $user[0]->getObjectId() }}"><img  src="{{$user[0]->photo->getUrl()}}" alt="sunil"></a>  </div>

                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <h6>{{$user[0]->deviceName}}</h6>
                                        <p>{{ $re->replyUser }}</p>
                                        <span class="time_date">

                                             {{$re->createdAt}}

                                         </span>
                                    </div>
                                </div>
                            </div>

                        @endif

                        @if(isset($re->replyAdmin))
                            <div class="outgoing_msg">
                                <div class="sent_msg">
                                    <p>{{$re->replyAdmin}}</p>
                                    <span class="time_date">
                {{ $re->createdAt }}
            </span>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <br>

                    <form method="POST" action="/complaints/store">
                        @csrf
                        <div class="type_msg">
                            <div class="input_msg_write">
                                <input type="text" class="write_msg" placeholder="reply" name="reply" />
                                <input type="hidden" class="write_msg" name="complain_id" value="{{ $edit->getObjectId() }}" />

                                <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    </body>
    </html>


@endsection
