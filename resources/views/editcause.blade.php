
@extends('layouts.main')


@section('content')
    <div style="background: none" class="box">
        <div class="overlay">
        <h2>اضافة قضية  جديد </h2>
        <form action="{{ route('cause.update', $cause->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value = "put">
            <div class="row">
                {{------------------------------------------------------}}
                <div class="col-xs-12 col-sm-2 year">
                    <div  class="form-group numbers  number-search">
                        <span>   حـصـر  قسـم حماية  الطفل : </span>
                        <?php
                        if(!empty( $cause->number))
                            $num = explode('/', $cause->number);
                        else
                            $num = null;
                        ?>
                        <input class="form-control" type="text" name="number2" min="1" lang="en" value="{{!empty($num[1]) ? $num[1] : null }}" autocomplete="off">
                        <label class="slash-add">/</label>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-2  select2 ">
                    <div class="form-group">
                        <span style="opacity: 0"> . </span>

                        <select style="background: rgba(255, 255, 255, .4);"  class="form-control select2" name="number" >
                            <option value="">....</option>
                            <?php
                            for($i = 2014; $i <= 2040 ; $i++) {  ?>
                            <option value="{{ $i }}" {{ $num[0] == $i ? 'selected' : ''  }}>{{ $i }}</option>
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
                        <?php
                        if(!empty( $cause->child_id))
                            $ch = explode('/', $cause->child_id);
                            else
                             $ch = null;
                        ?>
                        <input class="form-control" type="text" name="number3" min="1" lang="en" value="{{ !empty($ch[1]) ? $ch[1] : null }}" autocomplete="off">
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
                            <option value="{{ $i }}" {{ $ch[0] == $i ? 'selected' : ''  }}>{{ $i }}</option>
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
                        <?php
                        if(!empty( $cause->prosection_id))
                            $pr = explode('/', $cause->prosection_id);
                        else
                            $pr = null;
                        ?>
                        <input class="form-control" type="text" name="number4" min="1" lang="en" value="{{ !empty($pr[1] ) ? $pr[1] : null }}" autocomplete="off">
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
                            <option value="{{ $i }}" {{ $pr[0] == $i ? 'selected' : ''  }}>{{ $i }}</option>
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
                         <span>تاريخ الواقعة :</span> <input type="text" class="form-control myDate-picker" placeholder="yyyy-mm-dd" name="inc_date"  value="{{ $cause->inc_date }}" autocomplete="off">
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
                            <input type="text" class="form-control more myDate-picker" placeholder="yyyy-mm-dd" name="victim_birthday1" value="{{ $cause->victim_birthday1 }}" autocomplete="off">
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
                            <input type="text" class="form-control more myDate-picker" placeholder="yyyy-mm-dd" name="victim_birthday2" value="{{ $cause->victim_birthday2 }}" autocomplete="off">
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
                            <input type="text" class="form-control more myDate-picker" placeholder="yyyy-mm-dd" name="victim_birthday3" value="{{ $cause->victim_birthday3 }}" autocomplete="off">
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
                            <input type="text" class="form-control more myDate-picker" placeholder="yyyy-mm-dd" name="victim_birthday4" value="{{ $cause->victim_birthday4 }}" autocomplete="off">
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
                            <input type="text" class="form-control more myDate-picker" placeholder="yyyy-mm-dd" name="accused_birthday1" value="{{ $cause->accused_birthday1 }}" autocomplete="off">
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
                            <input type="text" class="form-control more myDate-picker" placeholder="yyyy-mm-dd" name="accused_birthday2" value="{{ $cause->accused_birthday2 }}">
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
                    <input type="text" class="form-control more myDate-picker" placeholder="yyyy-mm-dd" name="accused_birthday3" value="{{ $cause->accused_birthday3 }}">
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
                        <input type="text" class="form-control more myDate-picker" placeholder="yyyy-mm-dd" name="accused_birthday4" value="{{ $cause->accused_birthday4 }}" autocomplete="off">
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
                        <span>تاريخ استلام القضية  :</span> <input type="text" class="form-control myDate-picker" placeholder="yyyy-mm-dd" name="officer_date" value="{{ $cause->officer_date  }}" autocomplete="off">
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <span>تاريخ التصرف :</span> <input type="text" class="form-control myDate-picker" placeholder="yyyy-mm-dd" name="act_date"  value="{{ $cause->act_date  }}" autocomplete="off">
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


