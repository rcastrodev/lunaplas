<header class="header py-2 d-sm-none d-md-block pt-0">
    <div class="container d-flex align-items-center justify-content-between position-relative">
        <a class="navbar-brand d-sm-none d-md-block pt-0" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" class="img-fluid logo-header">
        </a>
        <div class="d-flex justify-content-end">
            <a href="{{$data->facebook}}" class="px-1" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="{{$data->instagram}}" class="px-1" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light pb-5" style="box-shadow: 0px 6px 6px #00000008; z-index: 100;">
    <div class="container">
        <a class="navbar-brand d-sm-block d-md-none" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">                
                <li class="nav-item font-size-16 @if(Request::is('categoria/*') ||  Request::is('productos') || Request::is('productos/*') || Request::is('producto/*')) position-relative @endif">
                    <a class="nav-link @if(Request::is('categoria/*') || Request::is('productos') || Request::is('productos/*') || Request::is('producto/*')) active @endif" href="{{ route('productos') }}">Productos</a>
                </li>
                <li class="nav-item font-size-16 @if(Request::is('calidad')) position-relative @endif">
                    <a class="nav-link @if(Request::is('calidad')) active @endif" href="{{ route('calidad') }}">Calidad</a>
                </li>
                <li class="nav-item font-size-16 @if(Request::is('empresa')) position-relative @endif">
                    <a class="nav-link @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Quienes somos</a>
                </li>
                <li class="nav-item font-size-16 @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                </li>
                <li class="nav-item d-sm-none d-md-block">
                    <form action="{{ route('productos') }}" method="get" class="position-sm-static rposition" style="right: 20px;">
                        <div class="input-group">
                            <input type="text" name="b" class="form-control">
                            <button class="nav-link color-primario font-size-13 btn"><i class="fas fa-search text-primary"></i></button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>  
