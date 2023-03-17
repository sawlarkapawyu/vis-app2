<div class="row">
    <div class="col-md-2 col-md-offset-6 text-right">
        <strong>Select Language: </strong>
    </div>
    <div class="col-md-4">
    <ul>
        <li><a href="{{ route(Route::currentRouteName(), 'en') }}"><img src="{{asset('user/images/flag/enf.png')}}" alt="English"></a></li>
        <li><a href="{{ route(Route::currentRouteName(), 'mm') }}"><img src="{{asset('user/images/flag/mmf.png')}}" alt="Myanmar"></a></li>
    </ul>
    </div>
</div>