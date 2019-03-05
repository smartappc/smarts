
@extends('layouts.main')

@section('content')
    <div class="box">
        <div class="overlay">
            <a href="{{ route('accusation.create') }}" class="btn btn-success add"><i class="fa fa-plus"></i> أضافة تهمة جديدة </a>
            <table class="table table-bordered text-center datatable">
                <thead>
                <tr>
                    <th> اسم التهمة </th>
                    <th>التحكم </th>
                </tr>
                </thead>
                <tbody>
                @if(count($accusation) > 0 )

                    @foreach($accusation as $o)
                        <tr>
                            <td> {{ $o->t_name }}</td>
                            <td>
                                @if(!Auth::guest() && Auth::user()->status == 1)
                                <form class="pull-left" action="{{  route('accusation.destroy', $o->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    &nbsp;<!--space with html-->

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('هل انت متأكد من عملية الحذف')"><i class="fa fa-times "></i> حذف</button> &nbsp;
                                </form>
                                @endif

                                <a href="{{ route('accusation.edit', $o->id) }} " class="pull-left btn btn-success btn-sm"><i class="fa fa-edit"></i> تعديل</a>
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