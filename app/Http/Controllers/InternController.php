<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class InternController extends Controller
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

    /**
     * Show the intern area startpage.
     * access by admin, author
     *
     * @return \Illuminate\Http\Response
     */
    public function getIntern()
    {
        return view('intern.intern');
    }

    /**
     * Show the intern area adminpage.
     * access by admins
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdmin()
    {
        $users = User::all();
        return view('intern.admin')->withUsers($users);
    }
}
