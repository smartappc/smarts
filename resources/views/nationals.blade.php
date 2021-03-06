
@extends('layouts.main')

@section('content')
    <div class="box">
        <div class="overlay">
            <a href="{{ route('nationals.create') }}" class="btn btn-success add"><i class="fa fa-plus"></i> أضافة جنسية جديدة </a>
            <table class="table table-bordered text-center datatable">
                <thead>
                <tr>
                    <th> الجنسية </th>
                    <th>التحكم </th>
                </tr>
                </thead>
                <tbody>
                @if(count($nationals) > 0 )

                    @foreach($nationals as $s)
                        <tr>
                            <td> {{ $s->name }}</td>
                            <td>
                                @if(!Auth::guest() && Auth::user()->status == 1)
                                <form class="pull-left" action="{{  route('nationals.destroy', $s->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    &nbsp;<!--space with html-->

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('هل انت متأكد من عملية الحذف')"><i class="fa fa-times "></i> حذف</button> &nbsp;
                                </form>
                                 @endif

                                <a href="{{ route('nationals.edit', $s->id) }} " class="pull-left btn btn-success btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                @else
                    <tr>
                        <td colspan="6">لا توجد بيانات لعرضها</td>
                    </tr>

                @endif
            </table>
        </div>
    </div>
@endsection