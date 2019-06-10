
@extends('layouts.main')

@section('content')
    <div style="background: none" class="box">
        <div class="overlay">
        <h2>اضافة قضية  جديدة </h2>
        <form action="{{ route('cause.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">


            {{------------------------------------------------------}}
                <div class="col-xs-12 col-sm-2 year">
                    <div  class="form-group numbers  number-search">
                        <span>   حـصـر  قسـم حماية  الطفل : </span>
                        <input class="form-control" type="number" name="number2" min="1" lang="en" autocomplete="off">
                    <label class="slash-add">/</label>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-2  select2 ">
                    <div class="form-group">
                        <span style="opacity: 0"> . </span>
                        <select style="background: rgba(255, 255, 255, .4);"  class="form-control select2" name="number">
                            <option value="">....</option>
                            <?php
                            for($i = 2014; $i <= 2040 ; $i++) {  ?>
                            <option value="{{ $i }}">{{ $i }}</option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                {{------------------------------------------------------}}

                {{------------------------------------------------------}}
                <div class="col-xs-12 col-sm-2 year">
                    <div  class="form-group numbers">
                        <span> حصر الادارة العامة للتحقيقات</span>
                        <input class="form-control" type="number" name="number3" min="1" lang="en" autocomplete="off">
                        <label class="slash-add2">/</label>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-2">
                    <div class="form-group numbers">
                        <span style="opacity: 0"> . </span>
                        <select style="background: rgba(255, 255, 255, .4);"  class="form-control select2" name="child_id">
                            <option value="">....</option>
                            <?php
                            for($i = 2014; $i <= 2040 ; $i++) {  ?>
                            <option value="{{ $i }}" value="{{ Request::old('child_id') }}">{{ $i }}</option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                {{------------------------------------------------------}}

                {{------------------------------------------------------}}
                <div class="col-xs-12 col-sm-2 year">
                    <div  class="form-group numbers">
                        <span>رقم الجنايات  :</span>
                        <input class="form-control" type="number" name="number4" min="1" lang="en" autocomplete="off">
                        <label class="slash-add3">/</label>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-2 ">
                    <div class="form-group numbers">
                        <span style="opacity: 0"> . </span>
                        <select style="background: rgba(255, 255, 255, .4);"  class="form-control select2" name="prosection_id">
                            <option value="">....</option>
                            <?php
                            for($i = 2014; $i <= 2040 ; $i++) {  ?>
                            <option value="{{ $i }}" value="{{ Request::old('prosection_id') }}">{{ $i }}</option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                {{------------------------------------------------------}}
            </div>


             <div class="row">
                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <span>اختر جهة الاحالة :</span> <select  class="form-control" name="referral_id">
                            <option value="">......</option>
                            @foreach($referral as $r)
                                <option value="{{$r->id}}" {{ Request::old('referral_id') }}>{{ $r->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                 <div class="col-xs-12 col-md-3">
                     <div class="form-group">
                         <span>المبلغ/الشاهد :</span> <input type="text" class="form-control" name="author" value="{{ Request::old('author') }}">
                     </div>
                 </div>

                 <div class="col-xs-12 col-md-3">
                     <div class="form-group">
                         <span>التهمة :</span> <select  class="form-control" name="accusation">
                             <option value="">......</option>
                             @foreach($accusation as $a)
                                 <option value="{{$a->id}}">{{ $a->t_name }}</option>
                             @endforeach
                         </select>
                     </div>
                 </div>

                 <div class="col-xs-12 col-md-3">
                     <div class="form-group">
                         <span>تاريخ الواقعة :</span> <input type="text"  class="form-control myDate-picker" placeholder="yyyy-mm-dd" name="inc_date" value="{{ Request::old('inc_date') }}" autocomplete="off">
                     </div>
                 </div>
             </div>

            <!-- start victims -->
            <h3 class="victim-heading"> بيانات المجني عليهم:</h3>
            <div class="victim">
                <div class="row">
                    <!-- -----------------------------------start 1----------------------------------------->
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span> الاسم :</span>
                            <input type="text" class="form-control more" name="victim_name1" value="{{ Request::old('victim_name1') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>الرقم المدني :</span>
                            <input type="text" class="form-control more" name="victim_id1" value="{{ Request::old('victim_id1') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>الجنسية :</span> <select  class="form-control" name="victim_nationality1" >
                                @foreach($national as $n)
                                    <option value="{{$n->id}}" {{ $n->id == 1 ? 'selected' : ''  }}>{{ $n->name }}</option>
                                @endforeach
                                    <option value="">.......</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>تاريخ الميلاد:</span>
                            <input type="text" class="form-control more myDate-picker" placeholder="yyyy-mm-dd" name="victim_birthday1" value="{{ Request::old('victim_birthday1') }}" autocomplete="off">
                        </div>
                    </div>
                </div>
            <!-- ------------------------------------end 1---------------------------------------->
            <div class="other-victim">  اضافة اسماء اخرى <i class="fa fa-plus"></i> </div>
            <div class="add-other-victim">
            <!-- -----------------------------------start 2----------------------------------------->
             <div class="row">
                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <span> الاسم :</span>
                        <input type="text" class="form-control more" name="victim_name2" value="{{ Request::old('victim_name2') }}" autocomplete="off">
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <span>الرقم المدني :</span>
                        <input type="text" class="form-control more" name="victim_id2" value="{{ Request::old('victim_id2') }}" autocomplete="off">
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <span>الجنسية :</span>
                        <select  class="form-control" name="victim_nationality2" >
                            <option value="">.......</option>
                            @foreach($national as $n)
                                <option value="{{$n->id}}">{{ $n->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <span>تاريخ الميلاد:</span>
                        <input type="text" class="form-control more myDate-picker" name="victim_birthday2" placeholder="yyyy-mm-dd" value="{{ Request::old('victim_birthday2') }}" autocomplete="off">
                    </div>
                </div>
            </div>
            <!-- ------------------------------------end 2---------------------------------------->

             <!-- -----------------------------------start 3----------------------------------------->
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">

                            <input type="text" class="form-control more" name="victim_name3" value="{{ Request::old('victim_name3') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">

                            <input type="text" class="form-control more" name="victim_id3" value="{{ Request::old('victim_id3') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <select  class="form-control" name="victim_nationality3" >
                                <option value="">.......</option>
                                @foreach($national as $n)
                                    <option value="{{$n->id}}">{{ $n->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control more myDate-picker" name="victim_birthday3" placeholder="yyyy-mm-dd" value="{{ Request::old('victim_birthday3') }}" autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------end 3------------------------------------------>

                <!-- -----------------------------------start 4----------------------------------------->
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control more" name="victim_name4" value="{{ Request::old('victim_name4') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control more" name="victim_id4" value="{{ Request::old('victim_id4') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <select  class="form-control" name="victim_nationality4" >
                                <option value="">.......</option>
                                @foreach($national as $n)
                                    <option value="{{$n->id}}">{{ $n->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control more myDate-picker" name="victim_birthday4" placeholder="yyyy-mm-dd" value="{{ Request::old('victim_birthday4') }}" autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------end 4---------------------------------------->
                <!-- ---------------------------------------------------------------------------->
              <div class="row">
                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <textarea type="text" class="form-control more" name="victim_name" >{{ Request::old('victim_name') }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <textarea type="text" class="form-control more" name="victim_id" >{{ Request::old('victim_id') }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <textarea type="text" class="form-control more" name="victim_nationality" >{{ Request::old('victim_nationality') }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <textarea type="text" class="form-control more"  name="victim_birthday" >{{ Request::old('victim_birthday') }}</textarea>
                    </div>
                </div>
            </div>

            </div><!--end add other victim -->
            <!-- ---------------------------------------------------------------------------->
            </div><!-- end victims -->

           <!-- start accused -->
            <h3 class="victim-heading">   بيانات المتهمين : </h3>
            <div class="victim">
                <div class="row">
                    <!-- -----------------------------------start 1----------------------------------------->
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span> الاسم :</span>
                            <input type="text" class="form-control more" name="accused_name1" value="{{ Request::old('accused_name1') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>الرقم المدني :</span>
                            <input type="text" class="form-control more" name="accused_id1" value="{{ Request::old('accused_id1') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>الجنسية :</span> <select  class="form-control" name="accused_nationality1" >
                                @foreach($national as $n)
                                    <option value="{{$n->id}}">{{ $n->name }}</option>
                                @endforeach
                                    <option value="">.......</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>تاريخ الميلاد:</span>
                            <input type="text" class="form-control more myDate-picker" placeholder="yyyy-mm-dd" name="accused_birthday1" value="{{ Request::old('accused_birthday1') }}" autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------end 1---------------------------------------->
                <div class="other-victim"> اضافة اسماء اخرى <i class="fa fa-plus"></i>   </div>
                <div class="add-other-victim">
                <!-- -----------------------------------start 2----------------------------------------->
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span> الاسم :</span>
                            <input type="text" class="form-control more"  name="accused_name2" value="{{ Request::old('accused_name2') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>الرقم المدني :</span>
                            <input type="text" class="form-control more" name="accused_id2" value="{{ Request::old('accused_id2') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>الجنسية :</span>
                            <select  class="form-control" name="accused_nationality2" >
                                <option value="">.......</option>
                                @foreach($national as $n)
                                    <option value="{{$n->id}}">{{ $n->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <span>تاريخ الميلاد:</span>
                            <input type="text" class="form-control more myDate-picker" placeholder="yyyy-mm-dd" name="accused_birthday2" value="{{ Request::old('accused_birthday2') }}" autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------end 2---------------------------------------->
                <!-- ------------------------------------start 3---------------------------------------->
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control more" name="accused_name3" value="{{ Request::old('accused_name3') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control more" name="accused_id3" value="{{ Request::old('accused_id3') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <select  class="form-control" name="accused_nationality3" >
                                <option value="">.......</option>
                                @foreach($national as $n)
                                    <option value="{{$n->id}}">{{ $n->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control more myDate-picker" placeholder="yyyy-mm-dd" name="accused_birthday3" value="{{ Request::old('accused_birthday3') }}" autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------end 3---------------------------------------->
                <!-- ------------------------------------Start 4---------------------------------------->
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control more" name="accused_name4" value="{{ Request::old('accused_name4') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control more" name="accused_id4" value="{{ Request::old('accused_id4') }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <select  class="form-control" name="accused_nationality4" >
                                <option value="">.......</option>
                                @foreach($national as $n)
                                    <option value="{{$n->id}}">{{ $n->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control more myDate-picker" placeholder="yyyy-mm-dd" name="accused_birthday4" value="{{ Request::old('accused_birthday4') }}" autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------end 4---------------------------------------->
                <!-- ---------------------------------------------------------------------------->
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <textarea type="text" class="form-control more" name="accused_name" >{{ Request::old('accused_name') }}</textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <textarea type="text" class="form-control more" name="accused_id" >{{ Request::old('accused_id') }}</textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <textarea type="text" class="form-control more" name="accused_nationality" >{{ Request::old('accused_nationality') }}</textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <textarea type="text" class="form-control more" name="accused_birthday" >{{ Request::old('accused_birthday') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
                <!-- ---------------------------------------------------------------------------->

            </div>
            <!-- end accused -->


            <div class="row">

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <span>تاريخ استلام القضية  :</span> <input type="text" class="form-control myDate-picker" placeholder="yyyy-mm-dd" name="officer_date" value="{{ Request::old('officer_date') }}" autocomplete="off">
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <span>تاريخ التصرف :</span> <input type="text" class="form-control myDate-picker" placeholder="yyyy-mm-dd" name="act_date" value="{{ Request::old('act_date') }}" autocomplete="off">
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <div class="form-group">
                            <span>جهة  التصرف :</span> <input type="text" class="form-control" name="act_place" value="{{ Request::old('act_place') }}" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <span> ضابط القضية :</span> <select  class="form-control" name="officer_id" >
                            <option value="">.......</option>
                            @foreach($officer as $f)
                                <option value="{{$f->id}}">{{ $f->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <div class="form-group">
                            <span>ملاحظات :</span> <textarea type="text" class="form-control" name="description" >{{ Request::old('description') }}</textarea>
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


