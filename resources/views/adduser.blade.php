@extends('layouts.main')

@section('content')

    <div class="box">
            <div class="overlay">
        <h2>اضافة مستخدم جديد </h2>
        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label> الاسم بالكامل </label>
                <h5 style="color: red">ملاحظة : يجب ادخال الاسم صحيح حيث لا يمكن تعديل الاسم بعد الحفظ</h5>
                <input type="text" class="form-control" name="full_name" value="{{ Request::old('full_name') }}">
            </div>

            <div class="form-group">
                <label> اسم المستخدم </label>

                <input type="text" class="form-control" name="name" value="{{ Request::old('name') }}">
            </div>

            <div class="form-group">
                <label> كلمة المرور </label>
                <input type="password" class="form-control" name="password" value="{{ Request::old('password') }}">
            </div>

            <div class="form-group">
                <label> حالة المستخدم </label>
                <select class="form-control" name="status">
                    <option value=""> ... اختر الحالة ...</option>
                    <option value="1"><stronge>مدير</stronge></option>
                    <option value="0">مشرف</option>
                </select>
            </div>

            <div class="form-group">
                <label> الصورة</label>
                <div class="file-upload">
                    <input type="file" class="form-control" name="image" value="{{ Request::old('image') }}">
                </div>

            </div>

            <div class="form-group">
                <button type="submit"  class="btn btn-info">حفظ البيانات</button>
            </div>

        </form>
    </div>
    </div>

@endsection