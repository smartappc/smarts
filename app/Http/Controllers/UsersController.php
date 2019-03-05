<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['signout', 'edit' , 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msg = [
            'full_name.required'   => 'يجب ادخال الاسم ',
            'name.required'      => 'يجب ادخال اسم الستخدم',
            'password.required'   => 'يجب  ادخال كلمة المرور  ',
            'status.required'   => 'يجب  اختيار حالة المستخدم ',

        ];
        $this->validate($request, [
            'full_name'    => 'required',
            'name'    => 'required',
            'password' => 'required|min:6',
            'status'  => 'required',
            'image' => 'image|mimes:jpg,jpeg,gif,png',
        ], $msg);

        $user = new User();
        $user->full_name = $request->input('full_name');
        $user->name = $request->input('name');
        //$user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->status = $request->input('status');

        //upload image
        if($request->hasFile('image')) {
            $imageExt = $request->File('image')->getClientOriginalExtension();
            $imageName = time() . 'thumniul.' . $imageExt;
            //$location = public_path('images/');
            $request->file('image')->move('images/', $imageName);

            $user->image = $imageName;
        }
        $user->save();
        return redirect(route('users.index'))->with('msg', 'تم اضافة المستخدم بنجاح');
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
        $user = User::find($id);
        return view('edituser')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $msg = [
            'name.required'   => 'يجب ادخال اسم الستخدم',
        ];
        $this->validate($request, [
            'name'    => 'required',
            'email'  => 'required|email',
            //'password' => 'required|min:6',
            'image' => 'image|mimes:jpg,jpeg,gif,png',
        ], $msg);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->status = $request->input('status');
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
        return redirect(route('users.index'))->with('msg', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if($user->delete()) {
            if(file_exists('images/' . $user->image)) {
                if($user->image != 'default.png') {
                    unlink('images/' . $user->image);//delete old image
                }
            }
        }
        return redirect(route('users.index'))->with('msg', 'تم حذف المستخدم بنجاح');
    }

    public function signout()
    {
        auth()->logout();
        return redirect('/login');
    }

}
