@if (session('success'))
    <div class="alert alert-success alert-dismissable flat">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('success') }}
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success alert-dismissable flat">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4><i class="icon fa fa-check"></i> Success</h4>
        {{ session('status') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissable flat">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('error') }}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissable flat">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif