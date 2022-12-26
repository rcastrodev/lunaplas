<footer class="py-sm-2 py-md-5 font-size-14 text-sm-center text-md-start bg-light">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-2 d-sm-none d-md-block">
                <a href="{{ route('index') }}"><img src="{{ asset($data->logo_footer) }}" alt="" class="d-block mx-auto img-fluid"></a>
                <div class="d-flex justify-content-center pt-4 mt-2" style="border-top: 2px solid #c4c4c4a6;">
                    <a href="{{$data->facebook}}" class="px-1" target="_blank"><i class="fab fa-facebook-f text-primary"></i></a>
                    <a href="{{$data->instagram}}" class="px-1" target="_blank"><i class="fab fa-instagram text-primary"></i></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 d-sm-none d-md-block">
                <h6 class="text-uppercase font-weight-600 text-dark mb-4">secciones</h6>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('productos') }}" class="d-block text-uppercase text-decoration-none underline text-dark">Productos</a>
                        <a href="{{ route('calidad') }}" class="d-block text-uppercase text-decoration-none underline text-dark">Calidad</a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('empresa') }}" class="d-block text-uppercase text-decoration-none underline text-dark">Quienes somos</a>
                        <a href="{{ route('contacto') }}" class="d-block text-uppercase text-decoration-none underline text-dark">Contacto</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 text-dark mb-sm-4 mb-md-0">
                <div class="row">
                    <div class="col-sm-12 newsletter">
                        <h6 class="text-uppercase text-dark font-weight-600 mb-4">SUSCRIBITE AL NEWSLETTER</h6>
                        <form action="{{ route('newsletter.store') }}" id="formNewsletter">
                            @csrf
                            <div class="">
                                <label class="visually-hidden" for="">Username</label>
                                <div class="input-group font-size-12">
                                    <input type="email" name="email" autocomplete="off" class="form-control font-size-12" placeholder="Ingresa tu email" style="background-color: #f9f9f9;">
                                    <button type="submit" id="" class="input-group-text" style="background-color: #D8222A;">
                                        <img src="{{ asset('images/arrow.svg') }}" class="img-fluid">
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 font-size-13 mb-sm-4 mb-md-0">
                <div class="row">
                    <h6 class="text-uppercase text-dark font-weight-600 mb-4">contacto</h6>
                    <div class="d-flex text-dark align-items-center mb-3">
                        <i class="fas fa-map-marker-alt text-primary d-block me-2"></i>
                        <span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex text-dark align-items-center mb-3">
                        <i class="fas fa-envelope text-primary d-block me-2"></i>
                        <a href="mailto:{{ $data->email }}" class="text-dark text-decoration-none underline">{{ $data->email }}</a>
                    </div>
                    @php $phone1 = Str::of($data->phone1)->explode('|') @endphp
                    @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                    <div class="d-flex text-dark align-items-center mb-3">
                        <i class="fas fa-phone-alt text-primary d-block me-2"></i>
                        @if(count($phone1) == 2)
                            <a href="tel:{{$phone1[0]}}" class="text-dark text-decoration-none underline">{{$phone1[1]}}</a> 
                        @else                            
                            <a href="tel:{{ $data->phone1}}" class="text-dark text-decoration-none underline">{{ $data->phone1 }}</a>  
                        @endif 
                        @if(count($phone2) == 2)
                            <span class="text-black px-2">/</span>
                            <a href="tel:{{$phone2[0]}}" class="text-dark text-decoration-none underline">{{$phone2[1]}}</a> 
                        @else     
                            <span class="text-black">/</span>                       
                            <a href="tel:{{ $data->phone2}}" class="text-dark text-decoration-none underline">{{ $data->phone2 }}</a>  
                        @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div style="background-image: url({{ asset('images/pie-footer.svg') }}); height:109px;"></div>
<div class="text-white p-2 font-size-13" style="background-color:#9c030f;">
    <div class="container text-end">
        <a href="https://osole.com.ar/" class="text-white text-decoration-none underline">BY OSOLE</a>
    </div>
</div>
@isset($data->phone3)
    <a href="https://wa.me/{{$data->phone3}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
        <i class="fab fa-whatsapp"></i>
    </a>     
@endisset