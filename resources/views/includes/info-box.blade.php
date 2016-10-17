@section('style')
<!-- <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/common.css') }}"> -->
@append

@if(Session::has('fail'))
 <div>{{ Session::get('fail') }}</div>
@endif

@if(Session::has('success'))
 <div>{{ Session::get('success') }}</div>
@endif

@if(count($errors->all()>0))
  @foreach($errors->all() as $error)
    {{ $error }}
  @endforeach
@endif