<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

        public function index()
    {
        $User = Auth::User();
        return view('cms.hostel.User_index',compact('User'));
    }

    public function create( )
    {

        return view('cms.hostel.profile_create', compact('Users'));
    }


    public function edit($id)
    {
        if ($id && ctype_digit($id))
        {
            $Users = User::find($id);

            // if the object is exist
            if ($Users && $Users instanceof User){

                return view('cms.hostel.Owner_profile_create', compact('Users'))->with('success', 'مشخصات خود را واریش کرده میتوانید');
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
