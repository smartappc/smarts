<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\national;
 
class NationalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['index', 'create', 'store', 'show', 'edit', 'update']);
    }


    public function index()
    {
        $nationals = national::all();
        return view('nationals')->with('nationals', $nationals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addnational');
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
            'name.required'   => 'يجب ادخال الجنسية',
        ];
        $this->validate($request, [
            'name'       => 'required',
        ], $msg);

        $national = new national();
        $national->name = $request->input('name');

        $national->save();
        return redirect(route('nationals.index'))->with('msg', 'تم حفظ البيانات بنجاح');
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
        $national = national::find($id);
        return view('editnational', $national)->with('national', $national);
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
            'name.required'   => 'يجب ادخال الجنسية',
        ];
        $this->validate($request, [
            'name'       => 'required',
        ], $msg);

        $national =  national::find($id);
        $national->name = $request->input('name');

        $national->save();
        return redirect(route('nationals.index'))->with('msg', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $national = national::find($id);
        $national->delete();
        return redirect()->back()->with('msg', 'تم حذف  الجنسية  بنجاح');
    }
}
