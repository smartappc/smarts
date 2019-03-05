

@extends('layouts.main')


@section('content')

    <div class="box">
            <div class="overlay">
        <h2>اضافة ضابط جديد </h2>
        <form action="{{ route('officer.update', $officer->id ) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="hidden" name="_method" value = "put">

            <div class="form-group">
                <label> اسم الضابط </label>
                <input type="text" class="form-control" name="name" value="{{ $officer->name }}">
            </div>

            <div class="form-group">
                <button type="submit"  class="btn btn-info">حفظ البيانات</button>
            </div>

        </form>
    </div>
    </div>

@endsection