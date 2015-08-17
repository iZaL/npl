<?php

namespace App\Http\Controllers;

use App\Src\Educator\Educator;
use Illuminate\Support\Facades\Auth;

class EducatorController extends Controller
{

    /**
     */
    public function __construct()
    {
    }

    public function index()
    {
        $educator = false;

        Auth::loginUsingId(3);
        if (Auth::check()) {
            $user = Auth::user();
            if (is_a($user->getType(), Educator::class)) {
                $educator = true;
            }
        }

        return view('modules.educator.index', compact('educator'));

    }

}
