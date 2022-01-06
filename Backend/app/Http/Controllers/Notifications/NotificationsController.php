<?php

namespace App\Http\Controllers\Notifications;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller;   
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class NotificationsController extends Controller
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

    public function listNotif()
    {
        $data = [
            'data' => Notification::where('company_id', Auth::id())
                ->whereRaw('read_at is null')
                ->take(5)
                ->orderBy('created_at', 'Desc')
                ->get(),
            'total' => Notification::where('company_id', Auth::id())
                ->whereRaw('read_at is null')->count()
        ];

        return response()->json($data, 200);
    }

    public function listAllNotif(Request $request)
    {
        if($request->get('per_page')){
            $perpage=$request->get('per_page');
        }
        if (!empty($request->name)) {
            $value = $request->name;
            $datas = Notification::where('company_id', Auth::id())
                    ->where('data', 'LIKE', "%$value%")
                    ->orderBy('created_at', 'Desc')
                    ->paginate($perpage);
        } else {
            $datas = Notification::where('company_id', Auth::id())
                        ->orderBy('created_at', 'Desc')
                        ->paginate($perpage);
        }

        $data = [
            'data' => $datas
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request)
    {
        try {
            $data = Notification::find($request->id);
            $data->read_at = Carbon::now();
            $data->save();
            return response()->json($data, 200);
        } catch (Exception $error) {
            return response()->json($error, 500);
        }
    }
}