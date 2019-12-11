<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class UploadController extends Controller
{
    public function upload(){
        return view('form');
    }

    public function uploadPost(Request $request){
        Log::error($request->all());
        //dd($request->all());
        if ($request->hasFile('image'))
        {
            $file      = $request->file('image');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture   = date('His').'-'.$filename;
           // $file->move(public_path('img'), $picture);
            if($file->isValid()){
               $file->storeAs('profile', $picture);
            }
            return response()->json(["message" => "Image Uploaded Succesfully", "url" => "https://fidioteste.s3.amazonaws.com/profile/".$picture]);
        }
        else
        {
            return response()->json(["message" => "Select image first."]);
        }
//
//        if ($request->hasFile('image')){
//            Log::error($request->file('image'));
//            $file = $request->file('image');
//            if($file->isValid()){
//                $file->storeAs('profile', 'lampada.jpeg');
//            }
//            dd("Imagem enviada com sucesso!");
//        }


    }
}
