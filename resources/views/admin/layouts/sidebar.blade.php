<aside class="main-sidebar">
    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name}}</p>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li @if(substr(Request::route()->getName(), 0, strpos(Request::route()->getName(), ".")) == 'rooms-management') class="active"  @endif ><a href="{{ url('rooms-management') }}"><i class="fa fa-link"></i> <span>{{__('Rooms')}}</span></a></li>
            <li @if(substr(Request::route()->getName(), 0, strpos(Request::route()->getName(), ".")) == 'hotels-management') class="active"  @endif><a href="{{ url('hotels-management') }}"><i class="fa fa-link"></i> <span>{{__('Hotels')}}</span></a></li>
            {{--<li @if(substr(Request::route()->getName(), 0, strpos(Request::route()->getName(), ".")) == 'services-management') class="active"  @endif><a href="{{ url('services-management') }}"><i class="fa fa-link"></i> <span>{{__('Services')}}</span></a></li>--}}
            {{--<li @if(substr(Request::route()->getName(), 0, strpos(Request::route()->getName(), ".")) == 'about-management') class="active"  @endif><a href="{{ url('about-management') }}"><i class="fa fa-link"></i> <span>{{__('About')}}</span></a></li>--}}
            {{--<li @if(substr(Request::route()->getName(), 0, strpos(Request::route()->getName(), ".")) == 'orders-management') class="active"  @endif><a href="{{ url('orders-management') }}"><i class="fa fa-link"></i> <span>{{__('Order')}}</span></a></li>--}}




        </ul>

    </section>
</aside>
