@extends('adminlte::page')
@section('title', 'Contenido calidad')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido de calidad</h1>
    </div>
@stop
@section('content')
@isset($section1)
    <form action="{{ route('quality.content.updateInfo') }}" method="post" data-async="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section1->id}}">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                @if (Storage::disk('custom')->exists($section1->image))
                    <img src="{{ asset($section1->image) }}" class="img-fluid">
                @endif
                <input type="file" name="image">
                <small>Tamaño recomendado 606x497 px</small>
            </div>
            <div class="form-group col-sm-12 col-md-8">
                <textarea name="content_1" class="ckeditor">{{ $section1->content_1 }}</textarea>
            </div>
            <div class="col-sm-12 col-md-4">
                <input type="file" name="content_2">
                @if (Storage::disk('custom')->exists($section1->content_2))
                    <div class="my-3">
                        <a href="{{ route('download-archive', ['column'=>'content_2', 'id'=>$section1->id]) }}" class="rounded-pill btn-sm btn-primary">ver</a>
                        <button class="archive-destroy rounded-pill btn-sm btn-danger btn" data-archivedestroy="{{ route('archive-destroy', ['column'=> 'content_2', 'id' => $section1->id]) }}">eliminar</button>
                    </div>
                @else
                    <span>no hay certificado cargado</span>
                @endif
                <small>Certificado de calidad</small>
            </div>
        </div>
        <div class="text-right">
            <button class="btn btn-primary">Actualizar</button>
        </div>
        
    </form>  
@endisset
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('quality.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/quality/index.js') }}"></script>
    <script>
        $('.archive-destroy').click(function(e){
            e.preventDefault();

            axios.post($(this).data('archivedestroy')).then(r => {
                $(this).closest('div').remove()
            }).catch(error => console.error(error))
        })
    </script>
@stop


