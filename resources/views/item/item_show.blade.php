@extends('adminlte::page')

@section('title', 'Item')

@section('content_header')
<h1>Item - Visualizar</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('item.index') }}"><i class="fa fa-dashboard"></i> Item</a></li>
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
            <h3 class="box-title">{{ $item->title }}</h3>
        </div>
        <div class="box-body">
            <strong>Nome:</strong> {{ $item->nome }}<br>
            <strong>Descrição:</strong> {{ $item->descricao }}<br>
            <strong>Criação:</strong> {{ $item->created_at }}<br>
            <strong>Atualização:</strong> {{ $item->updated_at }}
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!--Footer-->
        </div>
        <!-- /.box-footer-->
    </div>

</div>

@stop