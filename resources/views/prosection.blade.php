
@extends('layouts.main')

@section('content')
    <div class="box">
        <div class="overlay">
    <a href="{{ route('cause.create') }}" class="btn btn-success add"><i class="fa fa-plus"></i> أضافة قضية جديدة </a>
     <h2 class="title">قضايا الجنايات</h2>
    <table id="main" class="table table-bordered table-striped text-center datatable">
        <thead>
        <tr>
            <th>الرقم المتسلسل</th>
            <th>حصر قسم حماية الطفل</th>
            <th>رقم الجنايات   </th>
            <th>اسماء المجني عليهم</th>
            <th>  اسماء المتهمين</th>
            <th>  تمت اضافته بواسطة</th>
            <th>التحكم </th>
        </tr>
        </thead>
        <tbody>
        @if(count($cause) > 0 )

           <?php $serial_no = count($cause) ; ?><!-- serial number -->

            @foreach($cause as $c)
                <tr>
                    <td> {{$serial_no -- }}</td>
                    <td> {{ $c->number }}</td>
                    <td> {{ $c->prosection_id }}</td>
                    <td>
                        {{ $c->victim_name1  }}
                        @if(!empty($c->victim_name1)) <br> @endif

                        {{ $c->victim_name2 }}
                        @if(!empty($c->victim_name2)) <br> @endif

                        {{ $c->victim_name3 }}
                        @if(!empty($c->victim_name3)) <br> @endif

                        {{ $c->victim_name4 }}
                        @if(!empty($c->victim_name4)) <br> @endif

                        {!!  str_replace("\r\n", "<br>", $c->victim_name)  !!}
                    </td>
                    <td>
                        {{ $c->accused_name1  }}
                        @if(!empty($c->accused_name1)) <br> @endif

                        {{ $c->accused_name2 }}
                        @if(!empty($c->accused_name2)) <br> @endif

                        {{ $c->accused_name3 }}
                        @if(!empty($c->accused_name3)) <br> @endif

                        {{ $c->accused_name4 }}
                        @if(!empty($c->accused_name4)) <br> @endif

                        {!!  str_replace("\r\n", "<br>", $c->accused_name)  !!}
                    </td>
                    <td> <a href="{{route('userCause', $c->user)}}"> {{ $c->user }} </a></td>
                     <td>
                         @if(!Auth::guest() && Auth::user()->status == 1)
                        <form class="pull-left" action="{{  route('cause.destroy', $c->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            &nbsp;<!--space with html-->

                            <button class="btn btn-danger btn-sm"  onclick="return confirm('هل انت متأكد من عملية الحذف')"><i class="fa fa-times " ></i> حذف</button> &nbsp;
                        </form>
                         @endif

                        <a href="{{ route('cause.edit', $c->id) }} " class="pull-left btn btn-success btn-sm"><i class="fa fa-edit"></i> تعديل</a>

                        <a href="{{ route('cause.show', $c->id) }} " class="pull-left btn btn-info btn-sm"><i class="fa fa-eye"></i> عرض </a>
                    </td>

                </tr>
            @endforeach
        </tbody>
        @else
            <tr>
                <td colspan="7">لا توجد بيانات لعرضها</td>
            </tr>

        @endif
    </table>

        </div>
    </div>
@endsection