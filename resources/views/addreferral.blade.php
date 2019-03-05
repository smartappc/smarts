@extends('layouts.main')



@section('content')

    <div class="box">
        <div class="overlay">
            <h2>اضافة جهة إحالة  جديدة </h2>
            <form action="{{ route('referrals.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label> اسم جهة الاحالة </label>
                    <input type="text" class="form-control" name="name" value="{{ Request::old('name') }}">
                </div>


                <div class="form-group">
                    <button type="submit"  class="btn btn-info">حفظ البيانات</button>
                </div>

            </form>
        </div>
    </div>

@endsection