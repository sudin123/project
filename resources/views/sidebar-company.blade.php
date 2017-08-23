<?php $categories = \App\Category::all()->toHierarchy(); ?>
<?php $cities = \App\City::all(); ?>
<div class="col-md-3 col-sm-3">
    <div class="widget widget-searchfrom widget-quick-searchfrom">
        <h2 class="widget-title">Dealers Search</h2>
        <div class="widget-entry">
            {!! Form::open(array('route' => 'dealers-search', 'method'=>'GET')) !!}
            <ul>
                <li class="form-group">
                    {!! Form::text('d', $search, array('class'=>'form-control', 'placeholder'=>'Search ads...')) !!}
                </li>
                <li>
                    {!! Form::submit('Search', array('class'=>'button big')) !!}
                </li>
            </ul>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="widget widget-ad">
        @include('googleads.sidebar-ad')
    </div>
</div>