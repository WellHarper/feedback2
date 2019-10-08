@extends('adminlte::page')

@section('title', 'Usuário')

@section('content_header')
<h1>Usuário - Visualizar</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('user.index') }}"><i class="fa fa-dashboard"></i> Usuário</a></li>
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
            <h3 class="box-title">{{ $user->title }}</h3>
        </div>
        <div class="box-body">
            <strong>Nome:</strong> {{ $user->name }}<br>
            <strong>E-mail:</strong> {{ $user->email }}<br>
            <strong>Perfil:</strong> {{ $user->perfil }}<br>
            <strong>Status:</strong>
                @if ($user->status === 1)
                    Ativo<br>
                @else
                    Inativo<br>
                @endif
                <strong>Criação:</strong> {{ $user->created_at }}<br>
                <strong>Atualização:</strong> {{ $user->updated_at }}<br>
            </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!--Footer-->
        </div>
        <!-- /.box-footer-->
    </div>

</div>

@stop