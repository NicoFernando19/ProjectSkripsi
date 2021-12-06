<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{

    public function index()
    {
        $data = [
            'data' => Contract::all()
        ];

        return response()->json($data, 200);
    }

    public function showById($id)
    {
        try {
            $data = Contract::find($id);
            return response()->json($data, 200);
        } catch (Exception $err) {
            return response()->json($err, 500);
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'businessName' => 'required|string',
            'vendorName' => 'required|string',
            'workforce' => 'required|integer',
            'jobFunction' => 'required|string'
        ]);

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 400);
        }

        try{
            if($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = app('App\Http\Controllers\DocumentUpload\FileController')->upload($file);
            }
            $data = Contract::create($request->all());
            $data->document = $fileName;
            $data->save();
            // if(!is_null($request->password)){
            //     $request->password = app('hash')->make($request->password);
                // $data->document = $fileName;
                // $data->save();
            // }

            return response()->json($data, 201);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'businessName' => 'required|string',
            'vendorName' => 'required|string',
            'workforce' => 'required|integer',
            'jobFunction' => 'required|string'
        ]);

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 400);
        }

        try{
            $data = Contract::find($id);
            $data->update($request->all());
            return response()->json($data, 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function destroy($id)
    {
        try{
            $data = Contract::find($id);
            $data->delete();
            return response()->json(['success' => 'data has been deleted'], 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }
}
