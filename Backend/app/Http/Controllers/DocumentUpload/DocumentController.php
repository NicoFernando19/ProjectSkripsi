<?php

namespace App\Http\Controllers\DocumentUpload;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller;   
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function upload(Request $request){
        $validator = Validator::make($request->all(), [
            'file' => 'required',
        ]);

        if($validator->fails()){
            $return = [
                'error'=>$validator->errors()
            ];
            return response()->json($return,400);
        }

        if($request->hasFile('file')){
            $file=$request->file('file');
            $mime = $file->getMimeType();
            $oldname = $file->getClientOriginalName();

            $name = str_replace(" ","_",microtime()).'.'.$file->getClientOriginalExtension();
            $file->move('upload', $name);

            $uploadFile= new Document();
            $uploadFile->documentName = $name;
            $uploadFile->pathUrl = URL::to('/').'/upload/'.$name;
            $uploadFile->mime=$mime;
            $uploadFile->created_by=Auth::id();
            $uploadFile->save();
            $tempArray = $uploadFile->toArray();
            $tempArray['file_name'] = $oldname;
            $uploadFile = $tempArray;
            return response()->json($uploadFile);

        }
        
    }
}
