<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadFileRequest;
use Illuminate\Support\Facades\Storage;



class UploadFileController extends Controller
{
    function uploadFile()
    {
        return view('upload-file.index');
    }

    function postUploadFile(Request $request)
    {
      /*  $request->validate
        ([
            'file'=>'required|image'
           // 'file'=>'required|image|dimensions:min_width=500,min_height=500|max:10'
        ]);*/

        // here we have privacy
       $filename= $request->file->store("images");

       //store for everyone
       //$filename= $request->file->store("public");
       //$filename= $request->file->store("public/images");

       //Storage::putFile('images', $request->file('images'));
       //dd($filename);
       session()->flash("msg","s: Uploaded Successfully");
        return view('upload-file.index');
    }

    function getSecureFile()
    {
        return Storage::download("images/7KoAB8YBLZEOLrMKj0WLGe4f5w4EuCPTi1KyKtPP.png",'x.jpg');
    }
}
