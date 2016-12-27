<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Session;

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

    /**
    * Handle the Post for set user role on admin page
    * access by admins
    *
    * @return \Illuminate\Http\Response
    */
    public function postAdminAssignRoles(Request $request)
    {
      $user = User::where('email', $request['email'])->first();
      $user->roles()->detach();
      // $roles_has = array();
      $roles_has = [];
      if ($request['role_user']) {
        $user->roles()->attach(Role::where('name', 'User')->first());
        array_push($roles_has, 'User');
      }
      if ($request['role_author']) {
        $user->roles()->attach(Role::where('name', 'Author')->first());
        array_push($roles_has, 'Author');
      }
      if ($request['role_admin']) {
        $user->roles()->attach(Role::where('name', 'Admin')->first());
        array_push($roles_has, 'Admin');
      }

      Session::flash('message', 'set roles for user:');
      Session::flash('user', $user->name);
      Session::flash('role', $roles_has);
      return redirect()->back();
    }
}
