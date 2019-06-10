<?php

namespace App\Http\Controllers;

use App\accusation;
use App\cause;
use App\national;
use App\officer;
use App\referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CauseController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['index', 'create', 'store', 'show', 'edit', 'update', 'prosection' , 'child']);
    }
    public function index()
    {
       $cause = cause::where('status', 1)->orderBy( 'number',  'DESC')->get();
        //$cause = DB::select('select * from causes  order by , number ASC ');
        return view('cause')->with('cause', $cause);
    }

    //رقم الجنايات
    public function prosection() {
        $cause = DB::select('select * from causes where prosection_id != ""  order by number desc ');
        return view('prosection')->with('cause', $cause);
    }

    //رقم الادارة العامة للتحقيقات
    public function child() {
        $cause = DB::select('select * from causes where child_id != "" order by number  desc ');
        return view('childs')->with('cause', $cause);
    }

    //قضايا المستخدم
    public function userCause($user) {
        $cause = cause::where('status', 1)->where('user', $user)->orderBy( 'number',  'DESC')->get();
        return view('user-cause',compact('cause', 'user'));
    }



    public function create()
    {
        $officer = officer::all();
        $referral = referral::all();
        $national = national::all();
        $accusation = accusation::all();
       return view('addcause')->with(['officer' => $officer, 'accusation' => $accusation, 'national' => $national, 'referral' => $referral]);
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
            'number.required'                      => 'يجب ادخال  حصر  قسم حماية الطفل كاملاً',
            'number2.required'                     => 'يجب ادخال  حصر  قسم حماية الطفل كاملاً',
            'number.unique'                        => 'رقم حصر قسم حماية الطفل موجود من قبل',
            "officer_id.required"                  =>  'يجب اختيار  ضابط القضية',
            "accusation.required"                  =>  'يجب اختيار  التهمة',
            "officer_date.required"                =>  'يجب كتابة تاريخ استلام القضية ',
        ];
        $this->validate($request, [
            'number'                => 'required',
            'number2'               => 'required',
            'accusation'            => 'required',
            'officer_id'            => 'required',
            'officer_date'          => 'required',
        ], $msg);

        //select number


        $cause = new cause();

       $number               =   $request->input('number') . '/' .  $request->input('number2');
       $child = !empty($request->input('number3')) ?   $request->input('child_id') .  '/' . $request->input('number3') : $request->input('child_id');
       $prosection_id = !empty($request->input('number4')) ?   $request->input('prosection_id') .  '/' . $request->input('number4') : $request->input('prosection_id');

        //check number found or not found
        $number_found = cause::where('number', $number)->get();
        if ($number_found->count() > 0) {
            return redirect(route('cause.index'))->with('error', 'عفوا رقم حصر حماية الطفل ' . $number .'  موجود من قبل');
        }

        //check child_id found or not found
        $child_id_num = $request->input('child_id') .  '/' . $request->input('number3');
        $child_id_found = cause::where('child_id', $child_id_num)->get();
        if ($child_id_found ->count() > 0) {
            return redirect(route('cause.index'))->with('error', '  عفوا رقم حصر الادارة العامة للتحقيقات ' . $child_id_num. ' موجود من قبل');
        }

        //check prosection_id found or not found
        $prosection_id_num = $request->input('prosection_id') .  '/' . $request->input('number4');
        $prosection_id_found = cause::where('prosection_id', $prosection_id_num)->get();
        if ($prosection_id_found ->count() > 0) {
            return redirect(route('cause.index'))->with('error', '  عفوا رقم الجنايات ' . $prosection_id_num. ' موجود من قبل');
        }

       $cause->number               =  $number;
       $cause->child_id             = $child;
       $cause->prosection_id        = $prosection_id;
       $cause->referral_id          = $request->input('referral_id');
       $cause->inc_date             = $request->input('inc_date');
       //start victim
       $cause->victim_name1          = $request->input('victim_name1');
       $cause->victim_id1            = $request->input('victim_id1');
       $cause->victim_nationality1   = $request->input('victim_nationality1');
       $cause->victim_birthday1      = $request->input('victim_birthday1');

       $cause->victim_name2          = $request->input('victim_name2');
       $cause->victim_id2            = $request->input('victim_id2');
       $cause->victim_nationality2   = $request->input('victim_nationality2');
       $cause->victim_birthday2      = $request->input('victim_birthday2');

       $cause->victim_name3          = $request->input('victim_name3');
       $cause->victim_id3            = $request->input('victim_id3');
       $cause->victim_nationality3   = $request->input('victim_nationality3');
       $cause->victim_birthday3      = $request->input('victim_birthday3');

       $cause->victim_name4          = $request->input('victim_name4');
       $cause->victim_id4            = $request->input('victim_id4');
       $cause->victim_nationality4   = $request->input('victim_nationality4');
       $cause->victim_birthday4      = $request->input('victim_birthday4');

       $cause->victim_name          = $request->input('victim_name');
       $cause->victim_id            = $request->input('victim_id');
       $cause->victim_nationality   = $request->input('victim_nationality');
       $cause->victim_birthday      = $request->input('victim_birthday');
       //end victim

       //start accused
       $cause->accused_name1         = $request->input('accused_name1');
       $cause->accused_id1           = $request->input('accused_id1');
       $cause->accused_nationality1  = $request->input('accused_nationality1');
       $cause->accused_birthday1     = $request->input('accused_birthday1');

       $cause->accused_name2         = $request->input('accused_name2');
       $cause->accused_id2           = $request->input('accused_id2');
       $cause->accused_nationality2  = $request->input('accused_nationality2');
       $cause->accused_birthday2     = $request->input('accused_birthday2');

       $cause->accused_name3         = $request->input('accused_name3');
       $cause->accused_id3           = $request->input('accused_id3');
       $cause->accused_nationality3  = $request->input('accused_nationality3');
       $cause->accused_birthday3     = $request->input('accused_birthday3');

       $cause->accused_name4         = $request->input('accused_name4');
       $cause->accused_id4           = $request->input('accused_id4');
       $cause->accused_nationality4  = $request->input('accused_nationality4');
       $cause->accused_birthday4     = $request->input('accused_birthday4');

       $cause->accused_name         = $request->input('accused_name');
       $cause->accused_id           = $request->input('accused_id');
       $cause->accused_nationality  = $request->input('accused_nationality');
       $cause->accused_birthday     = $request->input('accused_birthday');
       //end accused

       $cause->accusation           = $request->input('accusation');
       $cause->description          = $request->input('description');
       $cause->author               = $request->input('author');
       $cause->officer_id           = $request->input('officer_id');
       $cause->officer_date         = $request->input('officer_date');
       $cause->act_date             = $request->input('act_date');
       $cause->act_place            = $request->input('act_place');
       $cause->user                 = auth()->user()->full_name;


       $cause->save();
       return redirect(route('cause.index'))->with('msg', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $cause = cause::find($id);

         $officer = officer::find($cause->officer_id);
         $refferal = referral::find($cause->referral_id);
         $accusation = accusation::find($cause->accusation);
        //victim nationalty
        $v_national1 = national::find($cause->victim_nationality1);
        $v_national2 = national::find($cause->victim_nationality2);
        $v_national3 = national::find($cause->victim_nationality3);
        $v_national4 = national::find($cause->victim_nationality4);
        //victim nationalty
        $a_national1 = national::find($cause->accused_nationality1);
        $a_national2 = national::find($cause->accused_nationality2);
        $a_national3 = national::find($cause->accused_nationality3);
        $a_national4 = national::find($cause->accused_nationality4);

        return view('showcause')->with([
                                          'cause'         => $cause,
                                          'officer'       => $officer,
                                          'accusation'    => $accusation,
                                          'refferal'      => $refferal,
                                          'v_national1'   => $v_national1,
                                           'v_national2'  => $v_national2,
                                           'v_national3'  => $v_national3,
                                            'v_national4'  => $v_national4,
                                            'a_national1'  => $a_national1,
                                            'a_national2'  => $a_national2,
                                            'a_national3'  => $a_national3,
                                            'a_national4'  => $a_national4,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $referral = referral::all();
        $national = national::all();
        $cause = cause::find($id);
        $officer = officer::all();
        $accusation = accusation::all();
        return view('editcause')->with(['cause' => $cause,'officer' => $officer, 'accusation' => $accusation, 'national' => $national, 'referral' => $referral]);
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
            'number.required'                      => 'يجب ادخال  حصر  قسم حماية الطفل كاملاً',
            'number.unique'                        => 'رقم حصر قسم حماية الطفل موجود من قبل',
            "officer_id.required"                  =>  'يجب اختيار  ضابط القضية',
            "accusation.required"                  =>  'يجب اختيار  التهمة',
            "officer_date.required"                =>  'يجب كتابة تاريخ استلام القضية ',
        ];
        $this->validate($request, [
            'number'                => 'required',
            'accusation'            => 'required',
            'officer_id'            => 'required',
            'officer_date'          => 'required',
        ], $msg);


        $cause = cause::find($id);
        //in case empty child_id  put  ''
        $child = !empty($request->input('number3')) ?   $request->input('child_id') .  '/' . $request->input('number3') : $request->input('child_id');
        $prosection_id = !empty($request->input('number4')) ?   $request->input('prosection_id') .  '/' . $request->input('number4') : $request->input('prosection_id');

        $cause->number               = $request->input('number') . '/' .  $request->input('number2');
        $cause->child_id             = $child;
        $cause->prosection_id        = $prosection_id;
        $cause->referral_id          = $request->input('referral_id');
        $cause->inc_date             = $request->input('inc_date');

        //start victim
        $cause->victim_name1          = $request->input('victim_name1');
        $cause->victim_id1            = $request->input('victim_id1');
        $cause->victim_nationality1   = $request->input('victim_nationality1');
        $cause->victim_birthday1      = $request->input('victim_birthday1');

        $cause->victim_name2          = $request->input('victim_name2');
        $cause->victim_id2            = $request->input('victim_id2');
        $cause->victim_nationality2   = $request->input('victim_nationality2');
        $cause->victim_birthday2      = $request->input('victim_birthday2');

        $cause->victim_name3          = $request->input('victim_name3');
        $cause->victim_id3            = $request->input('victim_id3');
        $cause->victim_nationality3   = $request->input('victim_nationality3');
        $cause->victim_birthday3      = $request->input('victim_birthday3');

        $cause->victim_name4          = $request->input('victim_name4');
        $cause->victim_id4            = $request->input('victim_id4');
        $cause->victim_nationality4   = $request->input('victim_nationality4');
        $cause->victim_birthday4      = $request->input('victim_birthday4');

        $cause->victim_name          = $request->input('victim_name');
        $cause->victim_id            = $request->input('victim_id');
        $cause->victim_nationality   = $request->input('victim_nationality');
        $cause->victim_birthday      = $request->input('victim_birthday');
        //end victim

        //start accused
        $cause->accused_name1         = $request->input('accused_name1');
        $cause->accused_id1           = $request->input('accused_id1');
        $cause->accused_nationality1  = $request->input('accused_nationality1');
        $cause->accused_birthday1     = $request->input('accused_birthday1');

        $cause->accused_name2         = $request->input('accused_name2');
        $cause->accused_id2           = $request->input('accused_id2');
        $cause->accused_nationality2  = $request->input('accused_nationality2');
        $cause->accused_birthday2     = $request->input('accused_birthday2');

        $cause->accused_name3         = $request->input('accused_name3');
        $cause->accused_id3           = $request->input('accused_id3');
        $cause->accused_nationality3  = $request->input('accused_nationality3');
        $cause->accused_birthday3     = $request->input('accused_birthday3');

        $cause->accused_name4         = $request->input('accused_name4');
        $cause->accused_id4           = $request->input('accused_id4');
        $cause->accused_nationality4  = $request->input('accused_nationality4');
        $cause->accused_birthday4     = $request->input('accused_birthday4');

        $cause->accused_name         = $request->input('accused_name');
        $cause->accused_id           = $request->input('accused_id');
        $cause->accused_nationality  = $request->input('accused_nationality');
        $cause->accused_birthday     = $request->input('accused_birthday');
        //end accused

        $cause->accusation           = $request->input('accusation');
        $cause->description          = $request->input('description');
        $cause->author               = $request->input('author');
        $cause->officer_id           = $request->input('officer_id');
        $cause->officer_date         = $request->input('officer_date');
        $cause->act_date             = $request->input('act_date');
        $cause->act_place            = $request->input('act_place');


        $cause->save();
        return redirect(route('cause.index'))->with('msg', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cause = cause::find($id);
        $cause->delete();
        return redirect()->back()->with('msg', 'تم حذف القضية  بنجاح');
    }

    public  function fun_pdf($id) {

    }
}
