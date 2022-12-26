@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-1 font-size-14">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none text-uppercase">inicio</a></li>
			<li class="breadcrumb-item text-uppercase active" aria-current="page">Contacto</li>
		</ol>
	</div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.403286263723!2d-58.50295068514571!3d-34.69500676984016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcced3b75be8ab%3A0xf4ace72424817292!2sEvita%20393%2C%20Villa%20Madero%2C%20Provincia%20de%20Buenos%20Aires%2C%20Argentina!5e0!3m2!1ses!2sve!4v1643224062506!5m2!1ses!2sve" height="428" style="border:0; width:100%;" allowfullscreen="" loading="lazy" class="m-0"></iframe>
<div class="bg-light text-center py-4 text-black">Por favor, complete el siguiente formulario para que podamos contactarnos con usted a la brevedad.</div>
<div class="my-5">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>                    
        @endif
        <form action="{{ route('send-contact') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-4 font-size-14 contacto">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt d-block me-2" style="color: #2D9CD3;"></i>
                        <span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-envelope d-block me-2" style="color: #2D9CD3;"></i>
                        <a href="mailto:{{ $data->email }}" class="text-black text-decoration-none underline">{{ $data->email }}</a>                    
                    </div>
                    @php $phone1 = Str::of($data->phone1)->explode('|') @endphp
                    @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-phone-alt d-block me-2" style="color: #2D9CD3;"></i>
                        @if (count($phone1))
                            <a href="tel:{{ $phone1[0] }}" class="text-black text-decoration-none underline">{{ $phone1[1] }}</a>
                        @else
                            <a href="tel:{{ $data->phone1 }}" class="text-black text-decoration-none underline">{{ $data->phone1 }}</a>
                        @endif
                        <span class="px-1 text-black">/</span>
                        @if (count($phone2))
                            <a href="tel:{{ $phone2[0] }}" class="text-black text-decoration-none underline">{{ $phone2[1] }}</a>
                        @else
                            <a href="tel:{{ $data->phone2 }}" class="text-black text-decoration-none underline">{{ $data->phone2 }}</a>
                        @endif   
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-8">
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="nombre" placeholder="Nombre" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="apellido" placeholder="Apellido" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                <input type="text" name="empresa" placeholder="Empresa" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <textarea name="mensaje" class="form-control font-size-14" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="termino" id="termino">
                                <label class="form-check-label font-size-13" for="termino">Acepto los términos y condiciones de privacidad</label>
                              </div>
                            <div class="form-group">
                                {!! app('captcha')->display() !!}
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <button type="submit" class="text-uppercase btn text-white font-size-14 py-2 px-5 font-weight-600 mb-sm-3 mb-md-0 ancho-boton" style="background-color: #3E4646; border-radius:0">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
