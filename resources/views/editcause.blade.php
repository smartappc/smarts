
@extends('layouts.main')


@section('content')
    <div style="background: none" class="box">
        <div class="overlay">
        <h2>اضافة قضية  جديد </h2>
        <form action="{{ route('cause.update', $cause->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value = "put">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <span> حصر قسم حماية الطفل :</span> <input type="text" class="form-control" name="number" value="{{ $cause->number }}">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <span>حصر الادارة العامة للتحقيقات(جُنح) :</span> <input type="text" class="form-control" name="child_id" value="{{ $cause->child_id  }}">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <span>رقم الجنايات (النيابة العامة) :</span> <input type="text" class="form-control" name="prosection_id" value="{{ $cause->prosection_id }}">
                    </div>
                </div>
            </div>


             <div class="row">
                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <span>اختر جهة الاحالة :</span> <select  class="form-control" name="referral_id">
                            <option value="">......</option>
                            @foreach($referral as $r)
                                <option value="{{$r->id}}" {{ $r->id == $cause->referral_id ? 'selected' : '' }}>{{ $r->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                 <div class="col-xs-12 col-md-3">
                     <div class="form-group">
                         <span>المبلغ/الشاهد :</span> <input type="text" class="form-control" name="author" value="{{ $cause->author  }}">
                     </div>
                 </div>

                 <div class="col-xs-12 col-md-3">
                     <div class="form-group">
                         <span>التهمة :</span> <select  class="form-control" name="accusation" >
                             <option value="">.....</option>
                             @foreach($accusation as $a)
                                 <option value="{{$a->id}}" {{ $a->id == $cause->accusation ? 'selected' : '' }}>{{ $a->t_name }}</option>
                             @endforeach
                         </select>
                     </div>
                 </div>

                 <div class="col-xs-12 col-md-3">
                     <div class="form-group">
                         <span>تاريخ الواقعة :</span> <input type="date" class="form-control" name="inc_date"  value="{{ $cause->inc_date }}">
                     </div>
                 </div>
             </div>

            <!-- start victims -->
            <h3 class="victim-heading">بيانات المجني عليهم:</h3>
            <div class="victim">
                <div class="row">
                    <!-- -----------------------------------start 1----------------------------------------->
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span> الاسم :</span>
                            <input type="text" class="form-control more" name="victim_name1" value="{{ $cause->victim_name1 }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>الرقم المدني :</span>
                            <input type="text" class="form-control more" name="victim_id1" value="{{ $cause->victim_id1 }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>الجنسية :</span> <select  class="form-control" name="victim_nationality1" >
                                <option value="">.......</option>
                                @foreach($national as $n)
                                    <option value="{{$n->id}}" {{ $n->id == $cause->victim_nationality1 ? 'selected' : '' }}>{{ $n->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>تاريخ الميلاد:</span>
                            <input type="date" class="form-control more" name="victim_birthday1" value="{{ $cause->victim_birthday1 }}">
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------end 1---------------------------------------->
                <div class="other-victim">   اسماء اخرى <i class="fa fa-plus"></i> </div>
                <div class="add-other-victim">
                <!-- -----------------------------------start 2----------------------------------------->
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span> الاسم :</span>
                            <input type="text" class="form-control more" name="victim_name2" value="{{ $cause->victim_name2 }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>الرقم المدني :</span>
                            <input type="text" class="form-control more" name="victim_id2" value="{{ $cause->victim_id2 }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>الجنسية :</span>
                            <select  class="form-control" name="victim_nationality2" >
                                <option value="">.......</option>
                                @foreach($national as $n)
                                    <option value="{{$n->id}}" {{ $n->id == $cause->victim_nationality2 ? 'selected' : '' }}>{{ $n->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>تاريخ الميلاد:</span>
                            <input type="date" class="form-control more" name="victim_birthday2" value="{{ $cause->victim_birthday2 }}">
                        </div>
                    </div>
                 </div>
            <!-- ------------------------------------end 2---------------------------------------->
             <!-- -----------------------------------start 3----------------------------------------->
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control more" name="victim_name3" value="{{ $cause->victim_name3 }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control more" name="victim_id3" value="{{ $cause->victim_id3 }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <select  class="form-control" name="victim_nationality3" >
                                <option value="">.......</option>
                                @foreach($national as $n)
                                    <option value="{{$n->id}}" {{ $n->id == $cause->victim_nationality3 ? 'selected' : '' }}>{{ $n->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="date" class="form-control more" name="victim_birthday3" value="{{ $cause->victim_birthday3 }}">
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------end 3---------------------------------------->
                <!-- -----------------------------------start 4----------------------------------------->
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control more" name="victim_name4" value="{{ $cause->victim_name4 }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control more" name="victim_id4" value="{{ $cause->victim_id4 }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <select  class="form-control" name="victim_nationality4" >
                                <option value="">.......</option>
                                @foreach($national as $n)
                                    <option value="{{$n->id}}" {{ $n->id == $cause->victim_nationality4 ? 'selected' : '' }}>{{ $n->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="date" class="form-control more" name="victim_birthday4" value="{{ $cause->victim_birthday4 }}">
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------end 4---------------------------------------->
                <!-- ---------------------------------------------------------------------------------->
             <div class="row">
                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <textarea type="text" class="form-control more" name="victim_name" > {{  str_replace("\r\n", "\n", $cause->victim_name)  }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <textarea type="text" class="form-control more" name="victim_id"> {{  str_replace("\r\n", "\n", $cause->victim_id)  }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <textarea type="text" class="form-control more" name="victim_nationality"> {{  str_replace("\r\n", "\n", $cause->victim_nationality)  }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <textarea type="text" class="form-control more" name="victim_birthday"> {{  str_replace("\r\n", "\n", $cause->victim_birthday)  }}</textarea>
                    </div>
                </div>
            </div>
           </div><!--end add other victim -->
                <!-- --------------------------------------------------------------------------->
            </div>
            <!-- end victim ----->

            <!-- start accused ----->
            <h3 class="victim-heading">بيانات المتهمين:</h3>
            <div class="victim">
                <div class="row">
                    <!-- -----------------------------------start 1----------------------------------------->
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span> الاسم :</span>
                            <input type="text" class="form-control more" name="accused_name1" value="{{ $cause->accused_name1 }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>الرقم المدني :</span>
                            <input type="text" class="form-control more" name="accused_id1" value="{{ $cause->accused_id1 }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>الجنسية :</span> <select  class="form-control" name="accused_nationality1" >
                                <option value="">.......</option>
                                @foreach($national as $n)
                                    <option value="{{$n->id}}" {{ $n->id == $cause->accused_nationality1 ? 'selected' : '' }}>{{ $n->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>تاريخ الميلاد:</span>
                            <input type="date" class="form-control more" name="accused_birthday1" value="{{ $cause->accused_birthday1 }}">
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------end 1---------------------------------------->
                <div class="other-victim">   اسماء اخرى <i class="fa fa-plus"></i> </div>
                <div class="add-other-victim">
                <!-- -----------------------------------start 2----------------------------------------->
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span> الاسم :</span>
                            <input type="text" class="form-control more" name="accused_name2" value="{{ $cause->accused_name2 }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>الرقم المدني :</span>
                            <input type="text" class="form-control more" name="accused_id2" value="{{ $cause->accused_id2 }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>الجنسية :</span>
                            <select  class="form-control" name="accused_nationality2" >
                                <option value="">.......</option>
                                @foreach($national as $n)
                                    <option value="{{$n->id}}" {{ $n->id == $cause->accused_nationality2 ? 'selected' : '' }}>{{ $n->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>تاريخ الميلاد:</span>
                            <input type="date" class="form-control more" name="accused_birthday2" value="{{ $cause->accused_birthday2 }}">
                        </div>
                    </div>
            </div>
            <!-- ------------------------------------end 2---------------------------------------->
            <!-- -----------------------------------start 3----------------------------------------->
            <div class="row">
              <div class="col-xs-12 col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control more" name="accused_name3" value="{{ $cause->accused_name3 }}" autocomplete="off">
                </div>
            </div>

            <div class="col-xs-12 col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control more" name="accused_id3" value="{{ $cause->accused_id3 }}" autocomplete="off">
                </div>
            </div>

            <div class="col-xs-12 col-md-3">
                <div class="form-group">
                    <select  class="form-control" name="accused_nationality3" >
                        <option value="">.......</option>
                        @foreach($national as $n)
                            <option value="{{$n->id}}" {{ $n->id == $cause->accused_nationality3 ? 'selected' : '' }}>{{ $n->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-md-3">
                <div class="form-group">
                    <input type="date" class="form-control more" name="accused_birthday3" value="{{ $cause->accused_birthday3 }}">
                </div>
            </div>
        </div>
        <!-- ------------------------------------end 3---------------------------------------->
         <!-- -----------------------------------start 4----------------------------------------->
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control more" name="accused_name4" value="{{ $cause->accused_name4 }}" autocomplete="off">
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control more" name="accused_id4" value="{{ $cause->accused_id4 }}" autocomplete="off">
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                       <select  class="form-control" name="accused_nationality4" >
                            <option value="">.......</option>
                            @foreach($national as $n)
                                <option value="{{$n->id}}" {{ $n->id == $cause->accused_nationality4 ? 'selected' : '' }}>{{ $n->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <input type="date" class="form-control more" name="accused_birthday4" value="{{ $cause->accused_birthday4 }}">
                    </div>
                </div>
            </div>
            <!-- ------------------------------------end 4---------------------------------------->

           <!-- ---------------------------------------------------------------------->
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <textarea type="text" class="form-control more" name="accused_name"> {{  str_replace("\r\n", "\n", $cause->accused_name )  }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <textarea type="text" class="form-control more" name="accused_id"> {{  str_replace("\r\n", "\n", $cause->accused_id )  }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <textarea type="text" class="form-control more" name="accused_nationality"> {{  str_replace("\r\n", "\n", $cause->accused_nationality )  }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <textarea type="text" class="form-control more" name="accused_birthday"> {{  str_replace("\r\n", "\n", $cause->accused_birthday )  }}</textarea>
                    </div>
                </div>
            </div>
           </div><!--end add other victim -->
                <!-- ---------------------------------------------------------------------->
            </div>
            <!-- end accused------->

            <div class="row">

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <span>تاريخ استلام القضية  :</span> <input type="date" class="form-control" name="officer_date" value="{{ $cause->officer_date  }}">
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <span>تاريخ التصرف :</span> <input type="date" class="form-control" name="act_date"  value="{{ $cause->act_date  }}">
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <div class="form-group">
                            <span>جهة  التصرف :</span> <input type="text" class="form-control" name="act_place" value="{{ $cause->act_place }} ">
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <span> ضابط القضية :</span> <select  class="form-control" name="officer_id" >
                            <option value="">.....</option>
                            @foreach($officer as $f)
                                <option value="{{$f->id}}" {{ $f->id == $cause->officer_id? 'selected' : '' }}>{{ $f->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <div class="form-group">
                            <span>ملاحظات :</span> <textarea type="text" class="form-control" name="description" >{{ $cause->description }} </textarea>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <button type="submit"  class="btn btn-info">حفظ البيانات</button>
            </div>

        </form>
        </div>
    </div>
@endsection


