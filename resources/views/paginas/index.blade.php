@extends('paginas.partials.app')
@section('content')
@isset($section1s)
	@if (count($section1s))
		<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($section1s as $k => $v)
					<div class="carousel-item @if(!$k) active @endif" style="background-image: url({{ asset($v->image) }}); background-size: 100% 100%; background-repeat: no-repeat; background-position: center center;">
						<div class="carousel-caption text-start">
							<h5 class="text-uppercase text-primary font-size-28 fw-bold">{{ $v->content_1 }}</h5>
							<h2 class="fw-bold text-dark text-uppercase font-size-52 mb-5">{{ $v->content_2 }}</h2>
							<a href="{{ route('productos') }}" class="btn bg-primary text-uppercase text-white px-5 py-2" style="border-radius: 0;">ver más</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>		
	@endif
@endisset
@if (count($categories))
	<section class="py-5">
		<h2 class="text-center fw-bold mb-5 text-uppercase font-size-32">Productos</h2>
		<div class="container row mx-auto mt-5">
			@foreach ($categories as $c)
				<div class="col-sm-12 col-md-3 mb-4">
					@includeIf('paginas.partials.categoria', ['c' => $c])
				</div>
			@endforeach
		</div>
	</section>
@endif
@isset($section2)
	<section id="section2">
		<div class="row">
			<div class="col-sm-12 col-md-6 pe-0">
				<img src="{{ asset($section2->image) }}" class="img-fluid w-100">
			</div>
			<div class="col-sm-12 col-md-6 d-flex flex-column ps-sm-2 ps-md-0 py-sm-3 py-md-0" style="background-color:#189fac05;">
				<div class="font-size-23 ps-sm-2 ps-md-5 mb-sm-2 mb-md-5" style="max-width: 600px;">
					@if (Storage::disk('custom')->exists($section2->content_2) || Storage::disk('custom')->exists($section2->content_3))
						<div class="d-sm-none d-md-block">
							@if (Storage::disk('custom')->exists($section2->content_2))
								<img src="{{ asset($section2->content_2) }}" class="img-fluid">
							@endif
							@if (Storage::disk('custom')->exists($section2->content_3))
								<img src="{{ asset($section2->content_3) }}" class="img-fluid">
							@endif
						</div>		
					@endif
					<div class="my-5" style="line-height: 30px;">{!! $section2->content_1 !!}</div>
					<a href="{{ route('empresa') }}" class="btn text-uppercase text-white py-2 px-4 font-size-18" style="background-color:#3E4646; border-radius: 0;">más información</a>
				</div>
			</div>
		</div>
	</section>	
@endisset

@if (count($products))
	<section class="py-5">
		<h2 class="text-center fw-bold mb-5 text-uppercase font-size-26 text-black">Productos destacados</h2>
		<div class="container row mx-auto mt-5">
			@foreach ($products as $p)
				<div class="col-sm-12 col-md-3 mb-3">
					@include('paginas.partials.producto', ['p' => $p])
				</div>
			@endforeach
		</div>
	</section>
@endif
@endsection