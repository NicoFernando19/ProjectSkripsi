<?php

namespace App\Http\Controllers\Notifications;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller;   
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Validator;

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
            'data' => Notification::where('company_id', Auth::id())->get()
        ];

        return response()->json($data, 200);
    }
}