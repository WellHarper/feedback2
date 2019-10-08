@extends('layouts.app')

@section('title', 'Item')

@section('content_header')
<h1>Item - Criar</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('item.index') }}"><i class="fa fa-dashboard"></i> Item</a></li>
    <li class="active">Formulario Text2Bin - Criar</li>
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
            <h3 class="box-title">Formulario Text2Bin - Criar</h3>
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
            {{ Form::open(array('url' => 'text2bin/create')) }}
            <div class="form-group">
                {{ Form::label('nome', 'Nome') }}
                {{ Form::text('nome', '', array('class' => 'form-control')) }}
            </div>
            {{ Form::submit('Criar', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
        {{ $text2bin ?? '' }}
        <!-- /.box-body -->
        <div class="box-footer">
            <!--Footer-->
        </div>
        <!-- /.box-footer-->
    </div>
</div>

@stop