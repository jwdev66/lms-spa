@if (count($errors) > 0)
@foreach ($errors->all() as $error)
<div class="alert alert-danger mb-0">
    {{$error}}
</div>
@endforeach
@endif


@if (session('success'))
<div class="alert alert-success mb-0">
    {{session('success')}}
</div>
@endif


@if (session('error'))
<div class="alert alert-danger mb-0">
    {{session('error')}}
</div>
@endif
