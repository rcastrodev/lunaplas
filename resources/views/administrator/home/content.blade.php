@extends('adminlte::page')
@section('title', 'Contenido home')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido del home</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
    <div class="row mb-5">
        <div class="col-sm-12">
            <h3>Sliders</h3>
            <table id="page_table_slider" class="table">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Imagen</th>
                        <th>Pre título</th>
                        <th>Título</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @isset($section2)
        <form action="{{ route('home.content.update') }}" method="post" class="pb-5" data-async="no" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$section2->id}}">
            <label for="">Contenido</label>
            <div class="row">
                <div class="form-group col-sm-12 col-md-8">
                    <textarea name="content_1" class="ckeditor">{{ $section2->content_1 }}</textarea>
                </div>
                <div class="col-sm-12 col-md-4">
                    @if (Storage::disk('custom')->exists($section2->image))
                        <img src="{{ asset($section2->image) }}" class="img-fluid">
                    @endif
                    <input type="file" name="image">
                    <small>Tamaño recomendado 668x515 px</small>
                </div>
                <div class="col-sm-12 col-md-4">
                    @if (Storage::disk('custom')->exists($section2->content_2))
                        <img src="{{ asset($section2->content_2) }}" class="img-fluid d-block" style="width: 180px; height:100px">
                        <button class="archive-destroy btn-sm  btn btn-danger" data-archivedestroy="{{ route('archive-destroy', ['column'=> 'content_2', 'id' => $section2->id]) }}">Eliminar archivo</button>
                    @endif
                    <input type="file" name="content_2">
                    <small>Tamaño recomendado 167x120 px</small>
                    <br>
                    
                </div>
                <div class="col-sm-12 col-md-4">
                    @if (Storage::disk('custom')->exists($section2->content_3))
                        <img src="{{ asset($section2->content_3) }}" class="img-fluid d-block" style="width: 180px; height:100px">
                        <button class="archive-destroy btn-sm btn btn-danger" data-archivedestroy="{{ route('archive-destroy', ['column'=> 'content_3', 'id' => $section2->id]) }}">Eliminar archivo</button>
                    @endif
                    <input type="file" name="content_3">
                    <small>Tamaño recomendado 167x120 px</small>
                    <br>

                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
            </div>
        </form>
    @endisset
@includeIf('administrator.home.modals.create')
@includeIf('administrator.home.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('home.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/home/index.js') }}"></script>
    <script>
        $('.archive-destroy').click(function(e){
            e.preventDefault();

            axios.post($(this).data('archivedestroy')).then(r => {
                $(this).closest('div').children('img').remove()
                $(this).remove()
            }).catch(error => console.error(error))
        })
    </script>
@stop

