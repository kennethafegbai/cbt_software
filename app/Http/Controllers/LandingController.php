<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class LandingController extends Controller
{
    public function landing(){
        return view('admin.landing');
    }

    public function update(Request $request)
    {
        $request->validate([
            'landing'=>'required',
        ]);

            $file = $request->file('landing');

            $fileName = $file->getClientOriginalName();
    
            $path = 'assets/img';
    
            $file->move($path, $fileName);

            $landing = Landing::first();

            if($landing){
                if(File::exists(public_path('assets/img/'.$landing->landing))){

                    File::delete('assets/img/'. $landing->landing);

                    $landing->landing = $fileName;

                    $landing->update();
                    
                    return back()->with('message', 'Image updated successfully');
                }    
            }else{
                Landing::create(['landing'=> $fileName]);
                return back()->with('message', 'Image added successfully');
            }
           
    }
}
