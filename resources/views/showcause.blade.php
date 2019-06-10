
<script>
    function funPrint(el) {
        var restorepage = document.body.innerHTML;
        var printcotent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcotent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
@extends('layouts.main')

@section('content')
    <div  class="box">
        <button class="prints" id="print" onclick="funPrint('printDiv')">طباعة<i class="fa fa-print"></i> </button>
        <div id = "printDiv" class="overlay">
           <div class="show">
               @if(count($cause) > 0 )

               <div  class="row">
                   <table class="table table-bordered table-striped">
                       <thead>
                          <tr>
                              <th> حصر قسم حماية الطفل</th>
                              <th>حصر الادارة العامة للتحقيقات (جُنح)</th>
                              <th>رقم الجنايات</th>
                          </tr>
                       </thead>
                       <tbody>
                          <tr>
                              <td>{{ $cause->number  }}</td>
                              <td>{{ $cause->child_id  }}</td>
                              <td>{{ $cause->prosection_id  }}</td>
                          </tr>
                       </tbody>
                   </table>
               </div>

               <div class="row">
                   <table class="table table-bordered table-striped">
                       <thead>
                       <tr>
                           <th> جهة الاحالة</th>
                           <th> التهمة </th>
                           <th>المبلغ/الشاهد</th>
                           <th>تاريخ الواقعة</th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                           <td>
                               @if( count($refferal) > 0 )
                                   {{ $refferal->name   }}
                               @endif

                           </td>
                           <td>
                               @if( count($accusation) > 0 )
                                   {{ $accusation->t_name }}
                               @endif
                           </td>

                           <td>{{ $cause->author  }}</td>
                           <td>{{ $cause->inc_date  }}</td>
                       </tr>
                       </tbody>
                   </table>
               </div>

               <div class="row">
                   <h3>بيانات المجني عليهم:</h3>
                   <table class="table table-bordered table-striped">
                       <thead>
                       <tr>
                           <th>الاسم</th>
                           <th> الرقم المدني  </th>
                           <th>الجنسية</th>
                           <th>تاريخ الميلاد </th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                           <td>
                               {{ $cause->victim_name1  }}
                               @if(!empty($cause->victim_name1)) <br> @endif

                               {{ $cause->victim_name2 }}
                               @if(!empty($cause->victim_name2)) <br> @endif

                               {{ $cause->victim_name3 }}
                               @if(!empty($cause->victim_name3)) <br> @endif

                               {{ $cause->victim_name4 }}
                               @if(!empty($cause->victim_name4)) <br> @endif

                               {!!  str_replace("\r\n", "<br>", $cause->victim_name)  !!}
                           </td>

                           <td>
                               {{ $cause->victim_id1  }}
                               @if(!empty($cause->victim_id1)) <br> @endif

                               {{ $cause->victim_id2 }}
                               @if(!empty($cause->victim_id2)) <br> @endif

                               {{ $cause->victim_id3 }}
                               @if(!empty($cause->victim_id3 )) <br> @endif

                               {{ $cause->victim_id4 }}
                               @if(!empty($cause->victim_id4)) <br> @endif

                               {!!  str_replace("\r\n", "<br>", $cause->victim_id)  !!}
                           </td>

                           <td>
                               @if(!empty($cause->victim_nationality1))
                                   @if( count($v_national1) > 0 )
                                       {{ $v_national1->name   }}
                                   @endif
                                <br>
                               @endif


                               @if(!empty($cause->victim_nationality2))
                                   @if( count($v_national2) > 0 )
                                       {{ $v_national2->name   }}
                                   @endif
                                   <br>
                               @endif

                               @if(!empty($cause->victim_nationality3 ))
                                       @if( count($v_national3) > 0 )
                                           {{ $v_national3->name   }}
                                       @endif
                                       <br>
                                @endif


                               @if(!empty($cause->victim_nationality4 ))
                                       @if( count($v_national4) > 0 )
                                           {{ $v_national4->name   }}
                                       @endif
                                       <br>
                                @endif

                               {!!  str_replace("\r\n", "<br>", $cause->victim_nationality)  !!}
                           </td>

                           <td>
                               {{ $cause->victim_birthday1  }}
                               @if(!empty($cause->victim_birthday1)) <br> @endif

                               {{ $cause->victim_birthday2}}
                               @if(!empty($cause->victim_birthday2)) <br> @endif

                               {{ $cause->victim_birthday3 }}
                               @if(!empty($cause->victim_birthday3 )) <br> @endif

                               {{ $cause->victim_birthday4}}
                               @if(!empty($cause->victim_birthday4 )) <br> @endif

                               {!!  str_replace("\r\n", "<br>", $cause->victim_birthday )  !!}
                           </td>
                       </tr>
                       </tbody>
                   </table>
               </div>

               <div class="row">
                   <h3>بيانات المتهمين:</h3>
                   <table class="table table-bordered table-striped">
                       <thead>
                       <tr>
                           <th> الاسم  </th>
                           <th> الرقم المدني   </th>
                           <th>الجنسية </th>
                           <th>تاريخ الميلاد </th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                           <td>
                               {{ $cause->accused_name1  }}
                               @if(!empty($cause->accused_name1 )) <br> @endif

                               {{ $cause->accused_name2 }}
                               @if(!empty($cause->accused_name2 )) <br> @endif

                               {{ $cause->accused_name3 }}
                               @if(!empty($cause->accused_name3 )) <br> @endif

                               {{ $cause->accused_name4 }}
                               @if(!empty($cause->accused_name4 )) <br> @endif

                               {!!  str_replace("\r\n", "<br>", $cause->accused_name)  !!}
                           </td>
                           <td>
                               {{ $cause->accused_id1  }}
                               @if(!empty($cause->accused_id1 )) <br> @endif

                               {{ $cause->accused_id2 }}
                               @if(!empty($cause->accused_id2 )) <br> @endif

                               {{ $cause->accused_id3 }}
                               @if(!empty($cause->accused_id3 )) <br> @endif

                               {{ $cause->accused_id4 }}
                               @if(!empty($cause->accused_id4 )) <br> @endif

                               {!!  str_replace("\r\n", "<br>", $cause->accused_id )  !!}
                           </td>
                           <td>
                               @if(!empty($cause->accused_nationality1 ))
                                   @if( count($a_national1) > 0 )
                                       {{ $a_national1->name   }}
                                   @endif
                                   <br>
                               @endif

                               @if(!empty($cause->accused_nationality2 ))
                                   @if( count($a_national2) > 0 )
                                       {{ $a_national2->name   }}
                                   @endif
                                 <br>
                                @endif


                               @if(!empty($cause->accused_nationality3 ))
                                   @if( count($a_national3) > 0 )
                                       {{ $a_national2->name   }}
                                   @endif
                                <br>
                               @endif

                               @if(!empty($cause->accused_nationality4 ))
                                   @if( count($a_national4) > 0 )
                                       {{ $a_national4->name   }}
                               @endif
                               <br>
                                @endif

                               {!!  str_replace("\r\n", "<br>", $cause->accused_nationality)  !!}
                           </td>
                           <td>
                               {{ $cause->accused_birthday1  }}
                               @if(!empty($cause->accused_birthday1 )) <br> @endif

                               {{ $cause->accused_birthday2 }}
                               @if(!empty($cause->accused_birthday2 )) <br> @endif

                               {{ $cause->accused_birthday3 }}
                               @if(!empty($cause->accused_birthday3 )) <br> @endif

                               {{ $cause->accused_birthday4 }}
                               @if(!empty($cause->accused_birthday4 )) <br> @endif

                               {!!  str_replace("\r\n", "<br>", $cause->accused_birthday )  !!}
                           </td>
                       </tr>
                       </tbody>
                   </table>
               </div>

               <div class="row">
                   <h3></h3>
                   <table class="table table-bordered table-striped">
                       <thead>
                       <tr>
                           <th> تاريخ التصرف</th>
                           <th> جهة التصرف </th>
                           <th>تاريخ إستلام القضية</th>
                           <th>ضابط القضية</th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                           <td>{{ $cause->act_date  }}</td>
                           <td>{{ $cause->act_place  }}</td>
                            <td>{{ $cause->officer_date  }}</td>
                           <td>
                               @if( count($officer) > 0 )
                                   {{ $officer->name }}
                               @else
                                   لا يوجد
                               @endif
                           </td>
                       </tr>
                       </tbody>
                   </table>
               </div>

               <div class="row">
                   <div class="col-sm-12">
                       <h3>الملاحظات :</h3>
                       @if(!empty($cause->description))
                       <p>{{ $cause->description  }}</p>
                       @endif
                   </div>
               </div>


             @else
               لا توجد بيانات
               @endif
           </div>
        </div>

        <div class="row">
            <div class="user">
                <div class="col-sm-6">
                    <label>تمت اضافته بواسطة :</label> <span>
                       {{  $cause->user }}
                       </span>
                </div>

                <div class="col-sm-6">
                    <label>وقت الاضافة :</label> <span>
                       {{ $cause->created_at }}
                       </span>
                </div>

            </div>
        </div>

    </div>


@endsection