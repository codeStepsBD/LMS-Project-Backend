<?php


namespace App\Services;
use Illuminate\Http\Request;

class FileUploades
{
    public static function fileUpload(Request $request,$file_name){
        if ($request->hasFile($file_name)) {
            $picName = $request->file($file_name)->getClientOriginalName();
            $picName = url('/uploads/files') .'/'. uniqid() . $picName;
            $destinationPath = "uploads/files";
            $request->file($file_name)->move($destinationPath, $picName);
            return $picName;
        }
    }

}
