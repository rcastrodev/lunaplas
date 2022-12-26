@extends('paginas.partials.app')
@push('head')
    <meta name="url" content="{{ route('index') }}">
@endpush
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none text-uppercase">inicio</a></li>
			<li class="breadcrumb-item text-uppercase active" aria-current="page">Calidad</li>
		</ol>
	</div>
</div>
@isset($section1)
    <div class="my-5">
        <div class="container row mx-auto">
            @if (Storage::disk('custom')->exists($section1->image))
                <div class="col-sm-12 col-md-6">
                    <img src="{{ asset($section1->image) }}" class="img-fluid">
                </div>       
            @endif
            <div class="col-sm-12 col-md-6">
                <div class="mb-5">{!! $section1->content_1 !!}</div>
                @if (Storage::disk('custom')->exists($section1->content_2))
                    <div class="d-flex justify-content-between bg-light p-2">
                        <span>Certificado de calidad</span>
                        <a href="{{ route('download-archive', ['column'=>'content_2', 'id'=>$section1->id]) }}">
                            <img src="{{ asset('images/download.svg') }}" alt="">
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endisset

@endsection