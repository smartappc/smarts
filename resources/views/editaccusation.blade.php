

@extends('layouts.main')

@section('content')

    <div class="box">
        <div class="overlay">
            <h2>تعديل التهمة  </h2>
            <form action="{{ route('accusation.update', $accusation->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value = "put">

                <div class="form-group">
                    <label> اسم التهمة </label>
                    <input type="text" class="form-control" name="t_name" value="{{ $accusation->t_name }}">
                </div>


                <div class="form-group">
                    <button type="submit"  class="btn btn-info">حفظ البيانات</button>
                </div>

            </form>
        </div>
    </div>

@endsection