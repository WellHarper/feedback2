@extends('adminlte::page')

@section('title', 'Curso')

@section('content_header')
<h1>Curso - Visualizar</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('curso.index') }}"><i class="fa fa-dashboard"></i> Curso</a></li>
    <li class="active">Visualizar</li>
</ol>

@stop

@section('content')

<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="container">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $curso->title }}</h3>
        </div>
        <div class="box-body">
            <strong>Nome:</strong> {{ $curso->nome }}<br>
            <strong>Descrição:</strong> {{ $curso->descricao }}<br>
            <strong>Criação:</strong> {{ $curso->created_at }}<br>
            <strong>Atualização:</strong> {{ $curso->updated_at }}
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!--Footer-->
        </div>
        <!-- /.box-footer-->
    </div>

</div>

@stop