<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">القائمة</li>
        
        <li
        class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-pen-fill"></i>
            <span>التصنيفات</span>
        </a>
        
        <ul class="submenu ">
            
            <li class="submenu-item  ">
                <a href="{{route("categories.index")}}" class="submenu-link">كل التصنيفات</a>
                
            </li>
            
            <li class="submenu-item  ">
                <a href="{{route("categories.create")}}" class="submenu-link">إضافة تصنيف</a>
                
            </li>
            
        </ul>
        

    </li>
        
        <li
            class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-pen-fill"></i>
                <span>المقالات</span>
            </a>
            
            <ul class="submenu ">
                
                <li class="submenu-item  ">
                    <a href="{{route("posts.index")}}" class="submenu-link">كل المقالات</a>
                    
                </li>
                
                <li class="submenu-item  ">
                    <a href="{{route("posts.create")}}" class="submenu-link">إضافة مقال</a>
                    
                </li>
                
            </ul>
            

        </li>
        <li
            class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="iconly-boldProfile">

                </i>
                <span>الشركاء</span>
            </a>
            
            <ul class="submenu ">
                
                <li class="submenu-item  ">
                    <a href="{{route('partners.index')}}" class="submenu-link">كل الشركاء</a>
                    
                </li>
                
                <li class="submenu-item  ">
                    <a href="{{route('partners.create')}}" class="submenu-link">اضافة شريك</a>
                    
                </li>
                
            </ul>
            

        </li>
       
        <li
            class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-chat-dots-fill"></i>
                <span>سؤال و جواب</span>
            </a>
            
            <ul class="submenu ">
                
                <li class="submenu-item  ">
                    <a href="{{route('questions.index')}}" class="submenu-link">كل الاسئلة</a>
                    
                </li>
                
                <li class="submenu-item  ">
                    <a href="{{route('questions.create')}}" class="submenu-link">اضافة سؤال</a>
                    
                </li>
                
            </ul>
            

        </li>
        <li
            class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-cash"></i>
                <span>العروض الترويجية</span>
            </a>
            
            <ul class="submenu ">
                
                <li class="submenu-item  ">
                    <a href="{{route('promotions.index')}}" class="submenu-link">كل العروض الترويجية</a>
                    
                </li>
                
                <li class="submenu-item  ">
                    <a href="{{route('promotions.create')}}" class="submenu-link">اضافة عرض ترويجي</a>
                    
                </li>
                
            </ul>
            

        </li>
        
        <li
        class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="iconly-boldProfile"></i>
            <span>الفريق</span>
        </a>
        
        <ul class="submenu ">
            
            <li class="submenu-item  ">
                <a href="{{route('teams.index')}}" class="submenu-link">كل الفريق</a>
                
            </li>
            
            <li class="submenu-item  ">
                <a href="{{route('teams.create')}}" class="submenu-link">اضافة عضو</a>
                
            </li>
            
        </ul>
        <li
        class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="iconly-boldProfile"></i>
            <span>الاقسام</span>
        </a>
        
        <ul class="submenu ">
            
            <li class="submenu-item  ">
                <a href="{{route('departments.index')}}" class="submenu-link">كل الاقسام</a>
                
            </li>
            
            <li class="submenu-item  ">
                <a href="{{route('departments.create')}}" class="submenu-link">اضافة قسم</a>
                
            </li>
            
        </ul>
        

    </li>
        <li
            class="sidebar-item  ">
            <a href="index.html" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>عرض الموقع</span>
            </a>
            

        </li>

        <li
            class="sidebar-item  ">
            <a href="{{route('change-password')}}" class='sidebar-link'>
                <i class="bi bi-person-badge-fill"></i>
                <span>تغيير كلمة المرور</span>
            </a>
            

        </li>
        <li class="sidebar-item  "> 
            
            <form action="{{route('logout')}}" method="post">
                @csrf
                {{-- <button type="submit">تسجيل الخروج</button> --}}
                
                <div class="d-flex mt-2 justify-content-center">
                    
                    
                        <button type="submit" class="btn btn-outline-danger">تسجيل الخروج</button>
                </div>
            </form>
            {{-- <a href="" class='sidebar-link'>
                
                <span>تسجيل الخروج</span>
            </a> --}}
            
{{-- //{{route('logout')}} --}}
        </li>
        
</div>
</div>
</div>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    