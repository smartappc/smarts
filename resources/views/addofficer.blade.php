@extends('layouts.main')



@section('content')

    <div class="box">
            <div class="overlay">
        <h2>اضافة ضابط جديد </h2>
        <form action="{{ route('officer.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label> اسم الضابط </label>
                <input type="text" class="form-control" name="name" value="{{ Request::old('name') }}">
            </div>

            <div class="form-group">
                <label> رتبة الضابط </label>
                <select class="form-control" name="rank">
                    <option value=""> ... اختر رتبة الضابط ...</option>
                    <option value="ملازم"><stronge>ملازم</stronge></option>
                    <option value="ملازم اول">ملازم اول</option>
                    <option value="نقيب">نقيب</option>
                    <option value="رائد">رائد</option>
                    <option value="مقدم">مقدم</option>
                    <option value="عقيد">عقيد</option>
                    <option value="عميد">عميد</option>
                    <option value="لواء">لواء</option>
                    <option value="فريق">فريق</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit"  class="btn btn-info">حفظ البيانات</button>
            </div>

        </form>
    </div>
    </div>

@endsection