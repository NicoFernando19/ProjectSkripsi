<?php

namespace App\Http\Controllers\DocumentUpload;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Document;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
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

    public function uploadFile(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'file' => 'required',
        ]);

        if($validator->fails()){
            $return = [
                'error'=>$validator->errors()
            ];
            return response()->json($return,400);
        }

        $filePath = public_path('storage/uploads');
        if ( !File::isDirectory($filePath)) {
            File::makeDirectory($filePath, 0777, true, true);
        }

        if($request->hasFile('file')){
            $file=$request->file('file');
            $mime = $file->getMimeType();
            $oldname = $file->getClientOriginalName();

            $name = str_replace(" ","_",microtime()).'.'.$file->getClientOriginalExtension();
            $file->move($filePath, $name);

            $uploadFile= new Document();
            $uploadFile->company_interest_id = $id;
            $uploadFile->documentName = $name;
            $uploadFile->pathUrl = URL::to('/').'/storage/uploads/'.$name;
            $uploadFile->mime=$mime;
            $uploadFile->documentType=$mime;
            $uploadFile->save();
            $tempArray = $uploadFile->toArray();
            $tempArray['file_name'] = $oldname;
            $uploadFile = $tempArray;
            return response()->json($uploadFile);

        }
        
    }
}
