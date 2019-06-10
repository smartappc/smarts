



<div class="panel panel-info sidebar">
    <div class="panel-heading text-center">    عمليات البحث </div>
    <div class="panel-body search">
        <ul>
            <li><a href="{{ route('number') }}">  حصر قسم حماية الطفل     </a> </li>
            <hr>
            <li><a href="{{ route('child') }}"> حصر الادارة العامة للتحقيقات (جُنح)   </a> </li>
            <hr>
            <li><a href="{{ route('prosection') }}"> رقم الجنايات    </a> </li>
            <hr>
            <li  class="sub-menu"> <i  class="fa fa-plus"></i>  الاستعلام ببيانات المجني عليه
                <hr>
            <li class="sub">
                <a href="{{ route('victim') }}"> - الاسم </a>
                <a href="{{ route('victim_id') }}"> - الرقم المدني   </a>
            </li>
            <hr>
            <li  class="sub-menu">الاستعلام ببيانات  المتهم<i  class="fa fa-plus"></i>
                <hr>
            <li class="sub">
                <a href="{{ route('accused') }}"> - الاسم </a>
                <a href="{{ route('accused_id') }}">- الرقم المدني </a>
            </li>
            <hr>
            <li><a href="{{ route('officer') }}">اسم الضابط </a> </li>
            <hr>
            <li><a href="{{ route('officer_date') }}">تاريخ استلام القضية  </a> </li>
            <hr>
            <li><a href="{{ route('act_date') }}">تاريخ التصرف </a> </li>
            <hr>
        </ul>

    </div>
</div>

<div class="panel panel-info sidebar">
    <div class="panel-heading text-center">التحكم بالقضايا</div>
    <div class="panel-body main-categories">
        <ul>
            <li><a href="/smarts/cause"><i class="fa fa-control"></i> جميع القضايا  </a> </li>
            <li><a href="/smarts/child"><i class="fa fa-control"></i>قضايا الإدارة العامة للتحقيقات  </a> </li>
            <li><a href="/smarts/prosection"><i class="fa fa-control"></i> قضايا الجنايات  </a> </li>
        </ul>
    </div>
</div>


<div class="panel panel-info sidebar">
    <div class="panel-heading text-center"><i class="fas fa-cogs"></i>  الاعدادت  </div>
    <div class="panel-body main-categories">
        <ul>
            <li><a href="/smarts/officer">  ضباط القسم   </a> </li>
            <li><a href="/smarts/accusation"> تصنيف التهم  </a> </li>
            <li><a href="/smarts/referrals"> تصنيف جهات الاحالة  </a> </li>
            <li><a href="/smarts/nationals"> التحكم بالجنسيات  </a> </li>
            @if(!Auth::guest() && Auth::user()->status == 1)
            <li><a href="/smarts/users">  المستخدمين  </a> </li>
            @endif
        </ul>
    </div>
</div>


