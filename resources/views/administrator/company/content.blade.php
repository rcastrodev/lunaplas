@extends('adminlte::page')
@section('title', 'Quienes somos')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Quienes somos</h1>
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
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@isset($section2)
    <form action="{{ route('company.content.updateInfo') }}" method="post" data-async="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section2->id}}">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="form-group">
                    <input type="text" name="content_1" value="{{$section2->content_1}}" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$section2->content_2}}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                @if (Storage::disk('custom')->exists($section2->image))
                    <img src="{{ asset($section2->image) }}" class="img-fluid">
                @endif
                <input type="file" name="image">
                <small>Tamaño recomendado 580x357px</small>
            </div>
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>  
@endisset
@isset($section3)
    <form action="{{ route('company.content.updateInfo') }}" method="post" data-async="no" class="my-3 pb-5">
        @csrf
        <input type="hidden" name="id" value="{{$section3->id}}">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <input type="text" name="content_1" placeholder="De planta industrial" value="{{$section3->content_1}}" class="form-control">
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <input type="text" name="content_2" placeholder="Máquinas inyectores" value="{{$section3->content_2}}" class="form-control">
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <input type="text" name="content_3" placeholder="Sopladoras" value="{{$section3->content_3}}" class="form-control">
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <input type="text" name="content_4" placeholder="Horno para material tipo plastisol" value="{{$section3->content_4}}" class="form-control">
                </div>
            </div>
        </div>
        <button class="btn btn-primary d-block w-100">Actualizar</button>
    </form>  
@endisset
@includeIf('administrator.company.modals.create')
@includeIf('administrator.company.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('company.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/company/index.js') }}"></script>
@stop

