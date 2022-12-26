@extends('adminlte::page')
@section('title', 'Crear producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<div class="card card-primary">
    <div class="card-header"></div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('product.content.store') }}" method="post" enctype="multipart/form-data">
        <div class="card-body row">
            @csrf
            <div class="form-group col-sm-12 col-md-2">
                <label for="">Código</label>
                <input type="text" name="code" placeholder="Código" value="{{old('code')}}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="">Nombre del producto</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nombre del producto">
            </div>
            <div class="form-group col-sm-12 col-md-3">
                <label for="">Categoría</label>
                <select name="category_id" class="form-control select2">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-2">
                <label for="">Orden</label>
                <input type="text" name="order" value="{{old('order')}}" class="form-control" placeholder="Ej AA AB AC">
            </div>
            <div class="form-group col-sm-12 col-md-1 d-flex flex-column align-items-center">
                <label for="">Destacado</label>
                <input type="checkbox" name="outstanding" value="1">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="">Ancho</label>
                <input type="text" name="width" value="{{old('width')}}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="">Alto</label>
                <input type="text" name="high" value="{{old('high')}}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="">Largo</label>
                <input type="text" name="length" value="{{old('length')}}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label>Ficha técnica</label>
                <input type="file" name="extra" class="form-control-file">
            </div>      
            <div class="form-group col-sm-12">
                <label for="">Descripción</label>
                <textarea name="description" class="ckeditor" cols="30" rows="10">{{old('description')}}</textarea>
            </div>
            @for ($i = 1; $i <= 3; $i++)
            <div class="form-group col-sm-12 col-md-4">
                <label for="image{{$i}}">imagen {{$i}}</label>
                <input type="file" name="images[]" class="form-control-file" id="image{{$i}}">
            </div>           
            @endfor
        </div>
      <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $('document').ready(function(){
            $('.select2').select2()
        })
    </script>
@stop

