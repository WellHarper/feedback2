@extends('adminlte::page')

@section('title', 'Quesito')

@section('content_header')
<h1>Quesito - Visualizar</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('quesito.index') }}"><i class="fa fa-dashboard"></i> Quesito</a></li>
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
            <h3 class="box-title">{{ $quesito->title }}</h3>
        </div>
        <div class="box-body">
            <strong>Nome:</strong> {{ $quesito->nome }}<br>
            <strong>Descrição:</strong> {{ $quesito->descricao }}<br>
            <strong>Criação:</strong> {{ $quesito->created_at }}<br>
            <strong>Atualização:</strong> {{ $quesito->updated_at }}
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!--Footer-->
        </div>
        <!-- /.box-footer-->
    </div>

</div>

@stop