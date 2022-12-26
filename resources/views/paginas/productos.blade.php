@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none text-uppercase">inicio</a></li>
			<li class="breadcrumb-item text-uppercase active" aria-current="page">Productos</li>
		</ol>
	</div>
</div>
@isset($categories)
    <div>
        <div class="container">
            <div class="">
                @if ($categories->count())
                    <section class="producto row font-size-14 my-5">
                        @foreach ($categories as $c)
                            <div class="col-sm-12 col-md-3 mb-5">
                                @includeIf('paginas.partials.categoria', ['c' => $c])
                            </div>
                        @endforeach                
                    </section>    
                @else
                    <h2 class="text-center my-5">No tenemos categorías cargadas en la actualidad</h2>
                @endif
            </div>
        </div>
    </div>
@endisset
@isset($products)
    <div>
        <div class="container">
            <div class="">
                @if (count($products))
                    <section class="producto row font-size-14 my-5">
                        @foreach ($products as $p)
                            <div class="col-sm-12 col-md-3 mb-5">
                                @includeIf('paginas.partials.producto', ['p' => $p])
                            </div>
                        @endforeach                
                    </section>    
                @else
                    <h2 class="text-center my-5">No tenemos coincidencias</h2>
                @endif
            </div>
        </div>
    </div>
@endisset

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
