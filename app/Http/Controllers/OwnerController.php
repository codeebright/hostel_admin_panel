<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{

//    public function index()
//    {
//        $Users = DB::select('select * from users WHERE id = "1" ');
//        return view('cms.hostel.profile',compact('Users'));
//    }

//    public function send_to_user_profile($id)
//    {
//        $Users = User::find($id);
//        return view('layouts.partials._topbar-user-profile',compact('Users'));
//    }

    public function create( )
    {

        return view('cms.hostel.profile_create' , compact('Users'));
        //
//        $this->validate($request, [
//            'phone' => 'required|max:10',
//            'password' => 'required|min:8'
//        ]);
//
//        if (Auth::attempt(['phone' => $request['phone'], 'password' => $request['password']])){
//            return redirect()->route('adminUser');
//        }
//        return redirect()->back();
    }
//
//    // Login function
//    public function login(LoginRequest $request)
//    {
//        $phone_no = $request->phone;
//        $password = $request->password;
//
//        return $phone_no;
//
//    }


    public function store(Request $request)
    {

        //
//        $this->validate($request, [
//            'name' => 'required|max:120',
//            'phone' => 'required|max:10',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|min:8',
//            'password_confirm' => 'required|same:password'
//        ],[
//            'name.required' => 'نام خود را وارید نکردید',
//            'password.required' => 'رمز عبور خود را وارید نکردید',
//            'password.min' => 'رمز عبور حدالقل 8 کرکتر باشد',
//            'password_confirm.required' => 'تاید رمز عبور خود را وارید نکردید',
//            'password_confirm.same' => 'رمز عبور تان مطابقت ندارد',
//        ]);
        //Pushed

//        $name = $request['name'];
//        $phone = $request['phone'];
//        $email = $request['email'];
//        $password = bcrypt($request['password']);
//        $password_confirm = bcrypt($request['password_confirm']);
//
//        $user = new User();
//        $user->name = $name;
//        $user->phone = $phone;
//        $user->email = $email;
//        $user->password = $password;
//        $user->password_confirm = $password;
//
//        $user->save();
//
//        return redirect()->route('adminUser');


        $User = new User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone_number = $request->phone_number;

        $User->save();
        return redirect()->back();

    }

    public function show(User $User)
    {
        //
    }


    public function edit($id)
    {
        if ($id && ctype_digit($id))
        {
            $Users = User::find($id);

            // if the object is exist
            if ($Users && $Users instanceof User){

                return view('cms/hostel/User_profile_create', compact('Users'))->with('success', 'مشخصات خود را واریش کرده میتوانید');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {

        $User = User::find($id);
        $User->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delet the account ... ramazan
        if ($id && ctype_digit($id)){
            $User = User::find($id);
            // if the object is exist
            if ($User && $User instanceof User){
                $User->delete();
                return redirect()->route('User.index')->with('success', 'اکانت شما حذف گردید');
            }
        }
    }
}
