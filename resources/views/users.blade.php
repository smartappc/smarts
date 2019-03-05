
@extends('layouts.main')

@section('content')
    <div class="box">
        <div class="overlay">
            <a href="{{ route('users.create') }}" class="btn btn-success add"><i class="fa fa-plus"></i> أضافة مستخدم جديد </a>
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th>الاسم </th>
                    <th> اسم المستخدم </th>
                    <th>حالة المستخدم </th>
                    <th>الصورة </th>
                    <th>التحكم </th>
                </tr>
                </thead>
                <tbody>
                @if(count($users) > 0 )

                    @foreach($users as $user)
                        <tr>
                            <td> {{ $user->full_name }}</td>
                            <td> {{ $user->name }}</td>
                            <td> {{ $user->status == 1 ? 'مدير' : 'مشرف' }}</td>
                            <td>@if($user->image != "0")
                                    <img src = "{{ asset('images/' . $user->image ) }}" width="40">
                                    @else
                                    <img src = "{{ asset('images/default.png') }}" width="40">
                                    @endif
                            </td>
                            <td class="last-td-user">
                                <a href="{{ route('SetPassword.edit', $user->id) }} " class="pull-left btn btn-info btn-sm"><i class="fa fa-lock-open"></i> تعين كلمة المرور</a>

                                <form class="pull-left" action="{{  route('users.destroy', $user->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    &nbsp;<!--space with html-->

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('هل انت متأكد من عملية الحذف')"><i class="fa fa-times "></i> حذف</button> &nbsp;
                                </form>

                                <a href="{{ route('users.edit', $user->id) }} " class="pull-left btn btn-success btn-sm"><i class="fa fa-edit"></i> تعديل</a>

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