<?php

namespace App\Http\Controllers\Notifications;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller;   
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listNotif($id)
    {
        $data = [
            'data' => Notification::where('user_id', $id)->get()
        ];

        return response()->json($data, 200);
    }
}