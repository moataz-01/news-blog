<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.')}}"><i class="icon-speedometer"></i> {{__('words.dashboard')}}</a>
            </li>
            @can('view', $setting)
                <hr style="color:white;background:white;">

                <li class="nav-title">
                {{__('words.users')}}
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard.users.create')}}"><i class="icon-user-follow"></i>{{__('words.addUser')}}</a>
                    <a class="nav-link" href="{{route('dashboard.users.index')}}"><i class="icon-people"></i>{{__('words.users')}}</a>
                </li>
            
            @endcan
            
            <hr style="color:white;background:white;">

            <li class="nav-title">
                {{__('words.categories')}}
             </li>
            <li class="nav-item">
                @can('view', $setting)
                <a class="nav-link" href="{{route('dashboard.category.create')}}"><i class="icon-user-follow"></i>{{__('words.addCategory')}}</a>

                @endcan
                <a class="nav-link" href="{{route('dashboard.category.index')}}"><i class="icon-people"></i>{{__('words.categories')}}</a>
            </li>
            <hr style="color:white;background:white;">

            <li class="nav-title">
                {{__('words.posts')}}
             </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.posts.create')}}"><i class="icon-user-follow"></i>{{__('words.addPost')}}</a>
                <a class="nav-link" href="{{route('dashboard.posts.index')}}"><i class="icon-people"></i>{{__('words.posts')}}</a>
            </li>

            
           @can('view', $setting)
            <hr style="color:white;background:white;">
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.settings')}}"><i class="icon-people"></i> {{__('words.settings')}}</a>
            </li>

           @endcan
        </ul>
    </nav>
</div>