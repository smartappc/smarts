@extends('layouts.main')

@section('content')

    <div class="box">
            <div class="overlay">
        <h2>تعديل بيانات مستخدم  </h2>
        <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value = "put">

            <div class="form-group">
                <label> اسم المستخدم </label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </div>

            <!--<div class="form-group">
                <label> البريد الالكتروني  </label>
                <input type="email" class="form-control" name="email" value="">
            </div> -->


            @if(!Auth::guest() && Auth::user()->status == 1)
            <div class="form-group">
                <label> حالة المستخدم </label>
                <select class="form-control" name="status">
                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}><stronge>مدير</stronge></option>
                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>مشرف</option>
                </select>
            </div>
            @endif

            <div class="form-group">
                <p>
                    @if($user->image != "0")
                        <img class="edit-avtar" src = "{{ asset('images/' . $user->image ) }}" width="100">
                    @else
                        <img class="edit-avtar" src = "{{ asset('images/logo.png') }}" width="100">
                    @endif
                </p>
                <label> الصورة</label>
                <input type="file" class="form-control" name="image" value="{{ Request::old('image') }}">
            </div>

            <div class="form-group">
                <button type="submit"  class="btn btn-info">حفظ البيانات</button>
            </div>

        </form>
    </div>
    </div>

@endsection