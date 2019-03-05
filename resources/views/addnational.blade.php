

@extends('layouts.main')



@section('content')

    <div class="box">
        <div class="overlay">
            <h2>اضافة جنسية  جديدة </h2>
            <form action="{{ route('nationals.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label> الجنسية </label>
                    <input type="text" class="form-control" name="name" value="{{ Request::old('name') }}">
                </div>


                <div class="form-group">
                    <button type="submit"  class="btn btn-info">حفظ البيانات</button>
                </div>

            </form>
        </div>
    </div>

@endsection