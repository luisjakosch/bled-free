@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/svg/SSA.JPG" class="rounded-circle" style="height: 170px;">
            <img src="/storage/{{$user->profile->image}}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">

            <div class="d-flex justify-content-between align-items-baseline">
                <h1>Bled-BREZIE!!! {{ $user->username}} </h1>

                 @can ('update',$user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan

                
            </div>

            @can ('update',$user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan

                <div class="d-flex">
                    <div class="pr-5"><strong>{{$user->posts->count()}}</strong> Rosary</div>
                    <div class="pr-5"><strong>717 </strong> Via Dolorosa</div>
                    <div class="pr-5"><strong>999 </strong> GLORIA!!!</div>
                </div> 

                <div class="pt-4 font-weight-bold">Gloria a Dios!!! {{ $user->profile->title}} </div>   
                <div>Ave Maria, Gratia Plena, Ora pro nobis, pecatoribus! {{ $user->profile->description}} </div>
                <div><a href="#">www.bled-brezie.org {{ $user->profile->url}} </a></div>            
           </div>
    </div>
    <div class="row pt-5">
        <div class="col-4 pb-4">
            <img src="/svg/DANY.jpg" class="w-100">
        </div>
        <div class="col-4 pb-4">
            <img src="/svg/MARY1.jpg" class="w-100">
        </div>
        <div class="col-4 pb-4">
            <img src="/svg/MARY2.jpg" class="w-100">
        </div>
        @foreach($user->posts as $post)
             <div class="col-4 pb-4">
                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{$post->image}}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
