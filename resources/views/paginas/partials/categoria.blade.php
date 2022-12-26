<div class="card producto">
    <div class="position-relative" style="background-color: white;">  
        <a href="{{ route('categoria', ['id'=> $c->id ]) }}" class="mas position-absolute">
            <img src="{{ asset('images/plus.svg') }}" class="img-fluid">
        </a>
        @if ($c->image)
            <img src="{{ asset($c->image) }}" class="img-fluid img-product" style="">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product" style="">
        @endif
    </div>
    <div class="card-body" style="background-color: {{ $c->color }}">
        <p class="card-text mb-0 text-center">
            <a href="{{ route('categoria', ['id'=> $c->id ]) }}" class="font-size-20 text-white">{{ Str::limit($c->name, 40) }}</a>
        </p>
    </div>
</div>

