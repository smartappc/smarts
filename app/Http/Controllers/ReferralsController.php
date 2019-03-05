<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\referral;

class ReferralsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['index', 'create', 'store', 'show', 'edit', 'update']);
    }

    public function index()
    {
        $referrals = referral::all();
        return view('referrals')->with('referrals', $referrals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addreferral');
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
            'name.required'   => 'يجب ادخال اسم جهة الاحالة',
        ];
        $this->validate($request, [
            'name'       => 'required',
        ], $msg);

        $referrals = new referral();
        $referrals->name = $request->input('name');

        $referrals->save();
        return redirect(route('referrals.index'))->with('msg', 'تم حفظ البيانات بنجاح');
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
        $referral = referral::find($id);
        return view('editreferral', $referral)->with('referral', $referral);
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
            'name.required'   => 'يجب ادخال اسم جهة الاحالة',
        ];
        $this->validate($request, [
            'name'       => 'required',
        ], $msg);

        $referral = referral::find($id);
        $referral->name = $request->input('name');

        $referral->save();
        return redirect(route('referrals.index'))->with('msg', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $referral = referral::find($id);
        $referral->delete();
        return redirect()->back()->with('msg', 'تم حذف جهة الاحالة بنجاح');
    }
}
