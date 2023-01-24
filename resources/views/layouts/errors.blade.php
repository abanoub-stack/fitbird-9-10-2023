@if ($errors->any())
<div class="row my-3">
    <div class="col-md-12 col-xs-12 m-auto">
        <div class="alert alert-danger text-left m-auto">
            <ul class="m-auto text-left">
                @foreach ($errors->all() as $error)
                    <li class="m-auto text-left">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endif
