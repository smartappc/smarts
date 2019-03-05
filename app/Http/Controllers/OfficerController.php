<?php

namespace App\Http\Controllers;

use App\officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['index', 'create', 'store', 'show', 'edit', 'update']);
    }

    public function index()
    {
        $officer = officer::all();
        return view('officer')->with('officer', $officer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addofficer');
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
            'name.required'   => 'يجب ادخال اسم الضابط',
            'rank.required'   => 'يجب  اختيار رتبة الضابط'
        ];
        $this->validate($request, [
            'name'       => 'required',
            'rank'       => 'required',
        ], $msg);

        $officer = new officer();
        $officer->name = $request->input('rank') . '/ ' . $request->input('name');
        //$officer->rank = $request->input('rank');

        $officer->save();
        return redirect(route('officer.index'))->with('msg', 'تم حفظ البيانات بنجاح');
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
        $officer = officer::find($id);
        return view('editofficer')->with('officer', $officer);
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
            'name.required'   => 'يجب ادخال اسم الضابط',
           
        ];
        $this->validate($request, [
            'name'       => 'required',
          
        ], $msg);

        $officer = officer::find($id);
        $officer->name = $request->input('name');

        $officer->save();
        return redirect(route('officer.index'))->with('msg', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $officer = officer::find($id);
        $officer->delete();
        return redirect()->back()->with('msg', 'تم حذف الضابط بنجاح');
    }
}
