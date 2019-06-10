<?php

namespace App\Http\Controllers;

use App\accusation;
use Illuminate\Http\Request;

class AccusationController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['index', 'create', 'store', 'show', 'edit', 'update']);
    }

    public function index()
    {
        $accusation = accusation::all();
        return view('accusation')->with('accusation', $accusation);
    }


    public function create()
    {
        return view('addaccusation');
    }


    public function store(Request $request)
    {
        $msg = [
            't_name.required'   => 'يجب ادخال اسم التهمة',
        ];
        $this->validate($request, [
            't_name'       => 'required',
        ], $msg);

        $accusation = new accusation();
        $accusation->t_name = $request->input('t_name');

        $accusation->save();
        return redirect(route('accusation.index'))->with('msg', 'تم حفظ البيانات بنجاح');
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
        $accusation = accusation::find($id);
        return view('editaccusation', $accusation)->with('accusation', $accusation);
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
            't_name.required'   => 'يجب ادخال اسم التهمة',
        ];
        $this->validate($request, [
            't_name'       => 'required',
        ], $msg);

        $accusation = accusation::find($id);
        $accusation->t_name = $request->input('t_name');

        $accusation->save();
        return redirect(route('accusation.index'))->with('msg', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accusation = accusation::find($id);
        $accusation->delete();
        return redirect()->back()->with('msg', 'تم حذف التهمة بنجاح');
    }
}
