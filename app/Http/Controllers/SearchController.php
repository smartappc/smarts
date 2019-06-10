<?php

namespace App\Http\Controllers;

use App\cause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function number() {
        $q = Input::get ( 'q' );
        $p = Input::get ( 'p' );
        if($q != ""){
        $user = cause::where ( 'number',  'LIKE', '%' .   $q . '/' . $p . '%' )->orderBy('number', 'DESC')->get();
        if (count ( $user ) > 0)
            return view ( 'search.number' )->withDetails ( $user )->withQuery ( $q. '/' . $p );
        else
            return view ( 'search.number' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الرقم ' );
        }
        return view ( 'search.number' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الرقم ' );
    }



    public function child() {
        $q = Input::get ( 'q' );
        $p = Input::get ( 'p' );
        if($q != ""){
        $user = cause::where ( 'child_id',  'LIKE', '%' .   $q . '/' . $p . '%' )->orderBy('number', 'DESC')->get();
        if (count ( $user ) > 0)
            return view ( 'search.child' )->withDetails ( $user )->withQuery ( $q . '/' . $p  );
        else
            return view ( 'search.child' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الرقم ' );
        }
        return view ( 'search.child' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الرقم' );
    }


    public function prosection() {
        $q = Input::get ( 'q' );
        $p = Input::get ( 'p' );
        if($q != ""){
            $user = cause::where ( 'prosection_id',  'LIKE', '%' .   $q . '/' . $p . '%' )->orderBy('number', 'DESC')->get();
        if (count ( $user ) > 0)
            return view ( 'search.prosection' )->withDetails ( $user )->withQuery ( $q . '/' . $p  );
        else
            return view ( 'search.prosection' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الرقم ' );
        }
        return view ( 'search.prosection' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الرقم ' );
    }


    public function victim() {
        $q = Input::get ( 'q' );
        if($q != ""){
        $user = cause::where ( 'victim_name', 'LIKE', '%' . $q . '%')
                    ->orWhere('victim_name1','LIKE','%'.$q.'%')
                    ->orWhere('victim_name2','LIKE','%'.$q.'%')
                    ->orWhere('victim_name3','LIKE','%'.$q.'%')
                    ->orWhere('victim_name4','LIKE','%'.$q.'%')->orderBy('number', 'DESC')->get();
        if (count ( $user ) > 0)
            return view ( 'search.victim' )->withDetails ( $user )->withQuery ( $q );
        else
            return view ( 'search.victim' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الاسم ' );
        }
        return view ( 'search.victim' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الاسم' );
    }



    public function victim_id() {
        $q = Input::get ( 'q' );
        if($q != ""){
            $user = cause::where ( 'victim_id', 'LIKE', '%' . $q . '%')
                        ->orWhere('victim_id1','LIKE','%'.$q.'%')
                        ->orWhere('victim_id2','LIKE','%'.$q.'%')
                        ->orWhere('victim_id3','LIKE','%'.$q.'%')
                        ->orWhere('victim_id4','LIKE','%'.$q.'%')->orderBy('number', 'DESC')->get();
            if (count ( $user ) > 0)
                return view ( 'search.victim_id' )->withDetails ( $user )->withQuery ( $q );
            else
                return view ( 'search.victim_id' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الرقم ' );
        }
        return view ( 'search.victim_id' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الرقم ' );
    }


    public function accused() {
        $q = Input::get ( 'q' );
        if($q != ""){
            $user = cause::where ('accused_name',  'LIKE', '%' . $q . '%')
                        ->orWhere('accused_name1','LIKE','%'.$q.'%')
                        ->orWhere('accused_name2','LIKE','%'.$q.'%')
                        ->orWhere('accused_name3','LIKE','%'.$q.'%')
                        ->orWhere('accused_name4','LIKE','%'.$q.'%')->orderBy('number', 'DESC')->get();
            if (count ( $user ) > 0)
                return view ( 'search.accused' )->withDetails ( $user )->withQuery ( $q );
            else
                return view ( 'search.accused' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الاسم ' );
        }
        return view ( 'search.accused' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الاسم' );
    }


    public function accused_id() {
        $q = Input::get ( 'q' );
        if($q != ""){
            $user = cause::where ( 'accused_id', 'LIKE', '%' . $q . '%')
                        ->orWhere('accused_id1','LIKE','%'.$q.'%')
                        ->orWhere('accused_id2','LIKE','%'.$q.'%')
                        ->orWhere('accused_id3','LIKE','%'.$q.'%')
                        ->orWhere('accused_id4','LIKE','%'.$q.'%')->orderBy('number', 'DESC')->get();
            if (count ( $user ) > 0)
                return view ( 'search.accused_id' )->withDetails ( $user )->withQuery ( $q );
            else
                return view ( 'search.accused_id' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الرقم ' );
        }
        return view ( 'search.accused_id' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الرقم ' );
    }


    public function officer() {
        $q = Input::get ( 'q' );
        if($q != ""){
            $user = cause::where ( 'officer_id', 'LIKE', '%' . $q . '%')->orderBy('number', 'DESC')->get();
            if (count ( $user ) > 0)
                return view ( 'search.officer' )->withDetails ( $user )->withQuery ( $q );
            else
                return view ( 'search.officer' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الاسم ' );
        }
        return view ( 'search.officer' )->withMessage ( 'لا توجد بيانات مطابقة لهذا الاسم ' );
    }


    public function act_date() {
        $q = Input::get ( 'q' );
        if($q != ""){
            $user = cause::where ( 'act_date', $q)->orderBy('number', 'DESC')->orderBy('number', 'DESC')->get();
            if (count ( $user ) > 0)
                return view ( 'search.act_date' )->withDetails ( $user )->withQuery ( $q );
            else
                return view ( 'search.act_date' )->withMessage ( 'لا توجد بيانات مطابقة لهذا التاريخ ' );
        }
        return view ( 'search.act_date' )->withMessage ( 'لا توجد بيانات مطابقة لهذا التاريخ ' );
    }


    public function officer_date() {
        $q = Input::get ( 'q' );
        if($q != ""){
            $user = cause::where ( 'officer_date', $q)->orderBy('number', 'DESC')->get();
            if (count ( $user ) > 0)
                return view ( 'search.officer_date' )->withDetails ( $user )->withQuery ( $q );
            else
                return view ( 'search.officer_date' )->withMessage ( 'لا توجد بيانات مطابقة لهذا التاريخ ' );
        }
        return view ( 'search.officer_date' )->withMessage ( 'لا توجد بيانات مطابقة لهذا التاريخ ' );
    }

}
