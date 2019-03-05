<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        //
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


    public function edit($id)
    {
        $user = User::find($id);
        return view('setpassword')->with('user', $user);
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
            'password.required'   => 'يجب  ادخال كلمة المرور  ',
        ];
        $this->validate($request, [
            'password' => 'required|min:6',
        ], $msg);

        $user = User::find($id);
        $user->password = bcrypt($request->input('password'));

        $user->save();
        return redirect(route('users.index'))->with('msg', 'تم اعادة تعيين كلمة المرور  بنجاح');
    }



    public function destroy($id)
    {
        //
    }
}
