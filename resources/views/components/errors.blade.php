@if(session()->has('errors'))
<div class="alert alert-danger text-center">
    <ul class="m-0 p-0 px-3 list-unstyled">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
