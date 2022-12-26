@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none text-uppercase">inicio</a></li>
			<li class="breadcrumb-item text-uppercase active" aria-current="page">{{ $category->name }}</li>
		</ol>
	</div>
</div>
@isset($categories)
    @if (count($categories))
        <section>
            <div class="container row py-md-5 py-sm-2 mx-auto px-0">
                <aside class="col-sm-12 col-md-3 order-sm-2 order-md-1">
                    <ul class="p-0" style="list-style: none;">
                        @foreach ($categories as $c)
                            <li class="py-2 ps-3 @if($category->id == $c->id) active @endif"> 
                                <a href="{{ route('categoria', ['id' => $c->id]) }}" class="text-decoration-none font-size-18 {{ ($c->id == $category->id) ? 'text-primary' : '' }}">{{$c->name}}</a>
                            </li>                        
                        @endforeach
                    </ul>
                </aside>
                <section class="col-sm-12 col-md-9 font-size-14 order-sm-1 order-md-2 productos">
                    <div class="row">
                        @isset($products)
                            @foreach ($products as $p)
                                <div class="col-sm-12 col-md-4 mb-3">
                                    @include('paginas.partials.producto', ['p' => $p])
                                </div>
                            @endforeach                    
                        @endisset
                    </div>

                </section>
            </div>
        </section>
    @endif
@endisset

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
