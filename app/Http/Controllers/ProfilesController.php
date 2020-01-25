<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user=User::findOrFail($user);
        //dd($user);
        return view('profiles.index',[
            'user'=>$user,
        ]);
    }

    public function edit(\App\User $user){

        $this->authorize('update',$user->profile);

        return view('profiles.edit',compact('user'));
    }

    public function update(User $user){

        $this->authorize('update',$user->profile);

        $data=request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'',
        ]);

        //dd($data);

        

        if(request('image')){
            $imagePath = request('image')->store('profile','public');

            $image=Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        //dd($data);

        //dd(array_merge(
        //    $data,
        //    ['image',$imagePath],
        //));

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
            //['image',$imagePath]
        ));

        return redirect("/profile/{$user->id}");
    }
}
