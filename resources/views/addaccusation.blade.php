@extends('layouts.main')



@section('content')

    <div class="box">
        <div class="overlay">
            <h2>اضافة تهمة جديدة </h2>
            <form action="{{ route('accusation.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label> اسم التهمة </label>
                    <input type="text" class="form-control" name="t_name" value="{{ Request::old('t_name') }}">
                </div>


                <div class="form-group">
                    <button type="submit"  class="btn btn-info">حفظ البيانات</button>
                </div>

            </form>
        </div>
    </div>

@endsection