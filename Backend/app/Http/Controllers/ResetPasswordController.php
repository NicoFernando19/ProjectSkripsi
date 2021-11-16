<?php 

namespace App\Http\Controllers;

use App\Additional\ResetPasswords;

class ResetPasswordController extends Controller
{
    use ResetPasswords;

    public function __construct()
    {
        $this->broker = 'users';
    }
}
