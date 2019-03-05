

@extends('layouts.main')

@section('content')

    <div class="box">
        <div class="overlay">
            <h2>تعديل  جهات الإحالة </h2>
            <form action="{{ route('referrals.update', $referral->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                 <input type="hidden" name="_method" value = "put">

                <div class="form-group">
                    <label> اسم جهة الاحالة </label>
                    <input type="text" class="form-control" name="name" value="{{$referral->name }}">
                </div>


                <div class="form-group">
                    <button type="submit"  class="btn btn-info">حفظ البيانات</button>
                </div>

            </form>
        </div>
    </div>

@endsection