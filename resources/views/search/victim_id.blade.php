
@extends('layouts.main')


@section('content')
    <div class="box">
        <div class="overlay">
            <h2>البحث بالرقم المدني للمجني عليه  </h2>

            <!--start form -->
            <div class="search">
                <form action="{{ route('victim_id') }}" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="ادخل الرقم المدني للمجني عليه !">

                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                        </span>
                    </div>
                </form>
            </div>
            <!--end form -->

            <!--start content -->
            @if(isset($details))
                <p> نتائج البحث للاستعلام الخاص بــ  <b> {{ $query }} </b>   هي :</p>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>حصر قسم حماية الطفل</th>
                        <th>حصر الادارة العامة للتحقيقات </th>
                        <th>رقم الجنايات   </th>
                        <th>اسم/اسماء المجني عليهم</th>
                        <th>  اسم/ اسماء المتهمين</th>
                        <th>  تمت اضافته بواسطة</th>
                        <th>التحكم </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($details as $user)
                        <tr>
                            <td>{{ $user->number }} </td>
                            <td>{{ $user->child_id}} </td>
                            <td>{{ $user->prosection_id }}</td>
                            <td>
                                {{ $user->victim_name1  }}
                                @if(!empty($user->victim_name1)) <br> @endif

                                {{ $user->victim_name2 }}
                                @if(!empty($user->victim_name2)) <br> @endif

                                {{ $user->victim_name3 }}
                                @if(!empty($user->victim_name3)) <br> @endif

                                {{ $user->victim_name4 }}
                                @if(!empty($user->victim_name4)) <br> @endif

                                {!!  str_replace("\r\n", "<br>", $user->victim_name)  !!}
                            </td>
                            <td>
                                {{ $user->accused_name1  }}
                                @if(!empty($user->accused_name1)) <br> @endif

                                {{ $user->accused_name2 }}
                                @if(!empty($user->accused_name2)) <br> @endif

                                {{ $user->accused_name3 }}
                                @if(!empty($user->accused_name3)) <br> @endif

                                {{ $user->accused_name4 }}
                                @if(!empty($user->accused_name4)) <br> @endif

                                {!!  str_replace("\r\n", "<br>", $user->accused_name)  !!}
                            </td>
                            <td> {{ $user->user }}</td>
                            <td>

                                @if(!Auth::guest() && Auth::user()->status == 1)
                                <form class="pull-left" action="{{  route('cause.destroy', $user->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    &nbsp;<!--space with html-->

                                    <button class="btn btn-danger btn-sm " onclick="return confirm('هل انت متأكد من عملية الحذف')"><i class="fa fa-times "></i> حذف</button> &nbsp;
                                </form>
                                @endif
                                <a href="{{ route('cause.edit', $user->id) }} " class="pull-left btn btn-success btn-sm"><i class="fa fa-edit"></i> تعديل</a>

                                <a href="{{ route('cause.show', $user->id) }} " class="pull-left btn btn-info btn-sm"><i class="fa fa-eye"></i> عرض </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @elseif(isset($message))
                <p>{{ $message }}</p>
        @endif
            <!--end content -->

        </div>
    </div>
@endsection


