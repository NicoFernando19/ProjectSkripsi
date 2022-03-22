<?php

namespace App\Http\Controllers\DocumentUpload;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

class FileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function upload($doc = null){

        $filePath = public_path('storage/uploads');
        if ( !File::isDirectory($filePath)) {
            File::makeDirectory($filePath, 0777, true, true);
        }

        if($doc){
            $file= $doc;
            // $mime = $file->getMimeType();
            $oldname = $file->getClientOriginalName();

            $name = str_replace(" ","_",microtime()).'.'.$file->getClientOriginalExtension();
            $file->move($filePath, $name);

            return $name;
        }
        
    }

    public function deleteFile($fileName)
    {
        $filePath = public_path('storage/uploads/'.$fileName);
        if(File::exists($filePath))
        {
            File::delete($filePath);
        }
    }
}
