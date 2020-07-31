
<aside class="main-sidebar" id="sidebar-wrapper" >

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(Auth::guest())

                @else
                @if (Auth::user()->photo == NULL)
                <img src="{{asset('storage/default.png')}}" alt="Image" class="responsive">
                @else
                <a href="{{route('profile.index',['name'=>Auth::user()->name??'','id'=>Auth::user()->id])}}">
                    <img src="{{asset('storage/'.Auth::user()->name.'/'.Auth::user()->photo.'/')}}" alt="Image" class="responsive" style="max-height:50px; max-width:50px;">
                </a>
                @endif
                @endif
            </div>

        </div>
        <hr>
        <div class="user-panel">
            <!-- Status -->
            <a href="/"> <i class="fas fa-home" style="font-size: 30px;"></i>&ensp;Home</a>
        </div>
        <hr>
        @if(Auth::guest())
        <div class="user-panel">
            <a href="{{ route('community.homepage')}}"><i class="fas fa-users" style="font-size: 30px;"></i> &ensp;Community</a>
        </div>
        @else
        @if(Auth::user()->role == 'manager')
        <div class="user-panel">
            <a href="{{ route('manager.community.homepage')}}"><i class="fas fa-users" style="font-size: 30px;"></i> &ensp; Community</a>
        </div>
        @elseif(Auth::user()->role =='admin')
        <div class="user-panel">
            <a href="{{ route('admin.community.homepage')}}"><i class="fas fa-users" style="font-size: 30px;"></i> &ensp; Community</a>
        </div>
        @else
        <div class="user-panel">
            <a href="{{ route('member.community.homepage')}}"><i class="fas fa-users" style="font-size: 30px;"></i> &ensp; Community</a>
        </div>
        @endif
        <hr>
        @if(Auth::user()->email_verified_at == NULL)


        @else

        @if (Auth::user()->role == "admin")
        <div class="user-panel">

            <!-- Status -->
            <a href="{{ route('admin.dashboard', ['id'=>Auth::user()->id])}}"><i class="fas fa-chart-line" style="font-size: 30px;"></i>&ensp; DashBoard</a>

        </div>
        <hr>
        <div class="user-panel">

            <!-- Status -->
            <a href="{{ route('admin.export.user')}}"><i class="fas fa-file-export" style="font-size: 30px;"></i>&ensp; Export Users list</a>

        </div>
        <hr>
        <div class="user-panel">

            <!-- Status -->
            <a href="{{ route('admin.export.thread')}}"><i class="fas fa-file-export" style="font-size: 30px;"></i>&ensp; Export threads List</a>

        </div>

        <!-- Sidebar Menu -->
        <hr>
        @else

        @endif

        <!-- /.sidebar-menu -->
        @endif
        @endif

    </section>
    <!-- /.sidebar -->
</aside>