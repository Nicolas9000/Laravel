<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function update(UpdateProfileRequest $request){
        auth()->user()->update($request->only('name', 'email'));
        if($request->input('password')){
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        return redirect()->route('profile');
    }

    public function delete(){
        auth()->user()->delete();
        return redirect()->route('dashboard');
    }
    
}
 