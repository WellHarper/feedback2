@extends('adminlte::page')

@section('title', 'Quesito')

@section('content_header')
<h1>Quesito - Editar</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('quesito.index') }}"><i class="fa fa-dashboard"></i> Quesito</a></li>
    <li class="active">Editar</li>
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
            <h3 class="box-title">Editar - {{ $quesito->nome }}</h3>
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
                {{ Form::model($quesito, array('route' => array('quesito.update', $quesito->id), 'method' => 'PUT')) }}
            <div class="form-group">
                {{ Form::label('nome', 'Nome') }}
                {{-- Form::text('nome', Input::old('nome'), array('class' => 'form-control')) --}}
                {{-- Form::text('nome', Input::get('nome'), array('class' => 'form-control')) --}}
                <input type="text" name="nome"  class = "form-control" value="{{ $quesito->nome }}">
                {{ Form::label('descricao', 'Descrição') }}
                {{-- Form::textarea('descricao', Input::old('descricao'), array('class' => 'form-control')) --}}
                <textarea name="descricao" class = "form-control" >{{ $quesito->descricao }}</textarea>
            </div>

                {{ Form::submit('Editar', array('class' => 'btn btn-primary')) }}
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