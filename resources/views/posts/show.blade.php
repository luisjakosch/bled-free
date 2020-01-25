@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-5" >
                        <img src="/storage/{{$post->user->profile->image}}" class="rounded-circle w-100" style="max-with: 100px;">
                    </div>
                    <div>
                        <h3>{{$post->user->username}}</h3>
                        <div class="font-weight-bold">
                            <a href="/profile/{{$post->user->id}}">
                                <span class="text-dark">
                                    {{$post->user->username}}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <hr>
                
                <p><span><div class="font-weight-bold">{{$post->caption}}</div></span></p>
            </div>
        </div>
    </div>

</div>
@endsection