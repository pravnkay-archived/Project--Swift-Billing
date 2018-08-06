<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\AceController\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Role;

use Auth;
use Validator;
use Session;
use Redirect;

class UsersController extends Controller
{

    public function __construct(Request $request)
    {
        $request->route()->setParameter('page-heading', 'User Management');        
        $this->middleware('auth');
        
        // $action_array = $request->route()->getAction();
		// $heading_element['page-heading'] = "User Management";
		// $new_action_array = array_merge($action_array, $heading_element);
		// $request->route()->setAction($new_action_array);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->paginate(5);

        return view('backend.users.users_list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userroles = $this->get_userroles_list();

		return view('backend.users.create_user', compact('userroles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'		=> 'required|string|max:255',
            'email'		=> 'required|string|email|max:255|unique:users',
            'password'	=> 'required|string|min:6|confirmed',
            'role'		=> 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            
            toast('Rectify errors and re-submit!','error','top-right')->autoclose(3500);

            return Redirect::to('users/create')
                ->withErrors($validator)
                ->withInput($request->input());

        } else {

			$user = User::create([
				'name' => $request->name,
				'email' => $request->email,
				'password' => Hash::make($request->password),
			]);
	
			$user->roles()->sync($request->role);
            $user->save();

            // redirect
            toast('User Created Successfully!','success','top-right')->autoclose(3500);
            return Redirect::to('users');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('roles')->find($id);

        return view('backend.users.view_user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('roles')->find($id);

        $userroles = $this->get_userroles_list();

        return view('backend.users.edit_user', compact('user', 'userroles'));
    }

    private function get_userroles_list()
    {
        $roles = Role::all();
        return $roles;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'name'      => 'required',
            'email'     => 'required|email',
            'role'      => 'required',
            'password'	=> 'nullable|string|min:6|confirmed',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            toast('Rectify errors and re-submit!','error','top-right')->autoclose(3500);

            return Redirect::to('users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));

        } else {

            $user = User::find($id);

            $user->name			= $request->name;
            $user->email		= $request->email;
            
            if($request->password == '') {

                $request->offsetUnset('password');

            } else {

                $user->password = Hash::make($request->password);

            }

            $user->roles()->sync($request->role);
            $user->save();

            // redirect
            toast('User Updated Successfully!','success','top-right')->autoclose(3500);
            return Redirect::to('users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentUser = Auth::user();
		$user = User::find($id);
		
		$currentid = $currentUser->id;
		$deleteid = $user->id;

        if ($deleteid === $currentid || $deleteid === 1) {

            toast('Error Deleting!','error','top-right')->autoclose(3500);
			return back();	
		
		} else {			

			$user->roles()->sync([]);
			$user->delete();
            
            toast('User Deleted Successfully!','success','top-right')->autoclose(3500);
            return redirect()->route('Users.users.index');

		}
    }
}
