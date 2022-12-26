<div class="card producto">
    <div class="position-relative" style="background-color: white;">  
        <a href="{{ route('producto', ['product'=> $p->id ]) }}" class="mas position-absolute">
            <img src="{{ asset('images/plus.svg') }}" class="img-fluid">
        </a>
        @if (count($p->images))
            <img src="{{ asset($p->images()->first()->image) }}" class="img-fluid img-product" >
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product">
        @endif
    </div>
    <div class="card-body">
        <p class="card-text mb-0">
            <a href="{{ route('producto', ['product'=>$p->id]) }}" 
                class="d-block font-size-15 text-uppercase fw-bold"
                style="color: {{ ($p->category->color) ? $p->category->color : 'black' }}">COD {{$p->code}}</a>
            <a href="{{ route('producto', ['product'=> $p->id ]) }}" class="font-size-20 text-uppercase" style="color:#222222">{{ Str::limit($p->name, 40) }}</a>
        </p>
    </div>
</div>

