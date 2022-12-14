<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu item Elements-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                <div class="pull-left"><i class="ti-blackboard">
                    </i><span class="right-nav-text">{{trans('main_trans.Grades')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Grades.index')}}">{{trans('main_trans.Grades_list')}}</a></li>

            </ul>
        </li>
        </li>
        <!-- menu item calendar-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                <div class="pull-left"><i class="fa fa-building"></i><span
                        class="right-nav-text">{{trans('main_trans.classes')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Classrooms.index')}}">{{trans('main_trans.List_classes')}}</a> </li>
            </ul>
        </li>
        <!-- menu item todo-->
        <li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                    <div class="pull-left"><i class="ti-list"></i></i><span
                            class="right-nav-text">{{trans('main_trans.sections')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('Sections.index')}}">{{trans('main_trans.List_sections')}}</a></li>
                </ul>
        </li>
        <!-- menu item chat-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                <div class="pull-left"><i class="ti-user"></i><span
                        class="right-nav-text">{{trans('main_trans.Parents')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{url('add_parent')}}">{{trans('main_trans.List_Parents')}}</a> </li>
            </ul>
        </li>
        <!-- menu item mailbox-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                <div class="pull-left"><i class="ti-star"></i></i><span
                        class="right-nav-text">{{trans('main_trans.Teachers')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Teachers.index')}}">{{trans('main_trans.List_Teachers')}}</a> </li>
            </ul>
        </li>
        <!-- menu item Charts-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i class="ti-book"></i>{{trans('main_trans.students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
            <ul id="students-menu" class="collapse">
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">{{trans('main_trans.Student_information')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                    <ul id="Student_information" class="collapse">
                        <li> <a href="{{route('Students.create')}}">{{trans('main_trans.add_student')}}</a></li>
                        <li> <a href="{{route('Students.index')}}">{{trans('main_trans.list_students')}}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_upgrade">{{trans('main_trans.Students_Promotions')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                    <ul id="Students_upgrade" class="collapse">
                        <li> <a href="{{route('Promotion.index')}}">{{trans('main_trans.add_Promotion')}}</a></li>
                        <li> <a href="{{route('Promotion.create')}}">{{trans('main_trans.list_Promotions')}}</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Graduate students">{{trans('main_trans.Graduate_students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                    <ul id="Graduate students" class="collapse">
                        <li> <a href="{{route('Graduated.create')}}">{{trans('main_trans.add_Graduate')}}</a> </li>
                        <li> <a href="{{route('Graduated.index')}}">{{trans('main_trans.list_Graduate')}}</a> </li>
                    </ul>
                </li>
            </ul>
        </li>

        <!-- menu font icon-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                <div class="pull-left"><i class="ti-id-badge"></i><span
                        class="right-nav-text">{{trans('main_trans.Accounts')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Fees.index')}}">???????????? ????????????????</a> </li>
                <li> <a href="{{route('Fees_Invoices.index')}}">????????????????</a> </li>
                <li> <a href="{{route('receipt_students.index')}}">?????????? ??????????</a> </li>
                <li> <a href="{{route('ProcessingFee.index')}}">?????????????? ????????</a> </li>
                <li> <a href="{{route('Payment_students.index')}}">???????? ??????????</a> </li>
            </ul>
        </li>
        <!-- Online calsses-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ShowOnlineClasses-icon">
        <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{trans('main_trans.Onlineclasses')}}</span></div>
        <div class="pull-right"><i class="ti-plus"></i></div>
        <div class="clearfix"></div>
    </a>
    <ul id="ShowOnlineClasses-icon" class="collapse" data-parent="#sidebarnav">
        <li> <a href="{{route('online_classes.index')}}">{{__('main_trans.ShowOnlineClasses') }} </a> </li>
    </ul>
</li>
<!-- Attendance-->
<li>
<a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
    <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{trans('main_trans.Attendance')}}</span></div>
    <div class="pull-right"><i class="ti-plus"></i></div>
    <div class="clearfix"></div>
</a>
<ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
    <li> <a href="{{route('Attendance.index')}}">?????????? ????????????</a> </li>
</ul>
</li>

<!-- Subjects-->
<li>
<a href="javascript:void(0);" data-toggle="collapse" data-target="#Subjects">
    <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">???????????? ????????????????</span></div>
    <div class="pull-right"><i class="ti-plus"></i></div>
    <div class="clearfix"></div>
</a>
<ul id="Subjects" class="collapse" data-parent="#sidebarnav">
    <li> <a href="{{route('subjects.index')}}">?????????? ????????????</a> </li>
</ul>
</li>

<!-- Quizzes-->
<li>
<a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
    <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">????????????????????</span></div>
    <div class="pull-right"><i class="ti-plus"></i></div>
    <div class="clearfix"></div>
</a>
<ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
    <li> <a href="{{route('Quizzes.index')}}">?????????? ????????????????????</a> </li>
    <li> <a href="{{route('questions.index')}}">?????????? ??????????????</a> </li>
</ul>
</li>
        <!-- menu item Widgets-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">{{trans('main_trans.library')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('library.index')}}">?????????? ??????????</a> </li>
            </ul>
        </li>
        <!-- menu item Form-->
        <li>
            <a href="{{route('settings.index')}}"><i class="fas fa-cogs"></i><span class="right-nav-text">{{trans('main_trans.Settings')}} </span></a>

        </li>

    </ul>
</div>
