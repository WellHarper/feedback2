@extends('adminlte::page')

@section('title', 'Quesito')

@section('content_header')
<h1>Quesito - Criar</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('quesito.index') }}"><i class="fa fa-dashboard"></i> Quesito</a></li>
    <li class="active">Criar</li>
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
            <h3 class="box-title">Criar</h3>
        </div>
        <div class="box-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{ Form::open(array('url' => 'admin/quesito/create')) }}
            <div class="form-group">
                {{ Form::label('nome', 'Nome') }}
                {{ Form::text('nome', '', array('class' => 'form-control')) }}
                {{ Form::label('descricao', 'Descrição') }}
                {{ Form::textarea('descricao', '', array('class' => 'form-control')) }}
            </div>
            {{ Form::submit('Criar', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!--Footer-->
        </div>
        <!-- /.box-footer-->
    </div>
</div>

@stop