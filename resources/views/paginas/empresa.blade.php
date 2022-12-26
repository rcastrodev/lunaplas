@extends('paginas.partials.app')
@section('content')
@isset($sliders)
	@if (count($sliders))
		<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($sliders as $k => $v)
					<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($sliders as $k => $v)
					<div class="carousel-item @if(!$k) active @endif" style="background-image: url({{ asset($v->image) }}); background-size: 100% 100%; background-repeat: no-repeat; background-position: center center;">
						<div class="carousel-caption text-start" style="min-width: 100%; left:0; top:35%;">
							<h1 class="position-absolute text-white font-size-52 text-center" style="right: 0; left:0;">{{ $v->content_1 }}</h1>
						</div> 
					</div>
				@endforeach
			</div>
		</div>		
	@endif
@endisset
@if ($company)
	<div class="pt-3 pb-5">
		<div class="container">
			<div class="row mb-5">
				<div class="col-sm-12 col-md-6">
					<div class="mb-3 font-size-19 fw-bold text-black mb-5">{{ $company->content_1 }}</div>
					<div class="font-size-16">{!! $company->content_2 !!}</div>
					
				</div>
				@if (Storage::disk('custom')->exists($company->image))
					<div class="col-sm-12 col-md-6">
						<img src="{{ asset($company->image) }}" class="img-fluid">
					</div>       
				@endif
			</div>
			<div class="row text-center">
				<div class="col-sm-12 col-md-3 mb-4">
					<div class="bg-light d-flex flex-column align-items-center justify-content-center" style="min-height: 202px;">
						<strong class="font-size-49" style="color: #D8222A;">{{ $section3->content_1 }}</strong>
						<span class="font-size-21">De planta industrial</span>
					</div>
				</div>
				<div class="col-sm-12 col-md-3 mb-4">
					<div class="bg-light d-flex flex-column align-items-center justify-content-center" style="min-height: 202px;">
						<strong class="font-size-49" style="color: #EE972D;">{{ $section3->content_2 }}</strong>
						<span class="font-size-21">Máquinas inyectores</span>
					</div>
				</div>
				<div class="col-sm-12 col-md-3 mb-4">
					<div class="bg-light d-flex flex-column align-items-center justify-content-center" style="min-height: 202px;">
						<strong class="font-size-49" style="color: #8EBC23;">{{ $section3->content_3 }}</strong>
						<span class="font-size-21">Sopladoras</span>
					</div>
				</div>
				<div class="col-sm-12 col-md-3 mb-4">
					<div class="bg-light d-flex flex-column align-items-center justify-content-center" style="min-height: 202px;">
						<strong class="font-size-49" style="color: #564394;">{{ $section3->content_4 }}</strong>
						<span class="font-size-21">Horno para material tipo plastisol</span>
					</div>
				</div>
			</div>
		</div>
	</div>	
@endif
@endsection