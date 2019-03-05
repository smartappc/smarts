<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","كلمة المرور الحالية لا تتطابق مع كلمة المرور التي قدمتها. حاول مرة اخرى.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","لا يمكن أن تكون كلمة المرور الجديدة مماثلة لكلمة مرورك الحالية. يرجى اختيار كلمة مرور مختلفة.");
        }
        $msg = [
            'new-password.confirmed'  =>  'كلمتا المرور لا تتطابقان',
        ];

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ], $msg);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","تم تغيير كلمة المرور بنجاح !");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->id != $id) { //no edit  anther user
            return redirect()->back();
        }

        $user = User::find($id);
        return view('editprofile')->with('user', $user);

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
        $msg = [
            'name.required'   => 'يجب ادخال اسم الستخدم',
        ];
        $this->validate($request, [
            'name'    => 'required',
            'image' => 'image|mimes:jpg,jpeg,gif,png',
        ], $msg);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        //upload image
        if($request->hasFile('image')) {
            $imageExt = $request->File('image')->getClientOriginalExtension();
            $imageName = time() . 'thumniul.' . $imageExt;
            //$location = public_path('storage/user/');
            $request->file('image')->move('images/', $imageName);

            if(file_exists('images/' . $user->image)) {
                if($user->image != 'default.png') {
                    unlink('images/' . $user->image);//delete old image
                }
            }
        } else {
            $imageName = $user->image;
        }

        $user->image = $imageName;
        $user->save();
        return redirect()->back()->with('msg', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }


}
