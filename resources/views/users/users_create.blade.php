@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
<h1>Usuários - Criar</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('user.index') }}"><i class="fa fa-dashboard"></i> Usuários</a></li>
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
            {{ Form::open(array('url' => 'admin/user/create')) }}
            <div class="form-group">
                {{ Form::label('name', 'Nome') }}
                {{ Form::text('name', '', array('class' => 'form-control')) }}
                
                {{ Form::label('email', 'E-mail') }}
                {{ Form::text('email', '', array('class' => 'form-control')) }}
                
                {{ Form::label('password', 'Senha') }}
                {{-- Form::password('password', Input::old('password'), array('class' => 'form-control')) --}}
                <input type="password" name="password" class="form-control"> <!--placeholder="Password"-->

                {{ Form::label('confirm-password', 'Confirmar a senha') }}
                {{-- Form::password('confirm-password', Input::old('confirm-password'), array('class' => 'form-control')) --}}
                <input type="password" name="confirm-password" class="form-control"> <!--placeholder="Password"-->

                <br>

                {{ Form::label('perfil', 'Perfil') }}
                {{ Form::select('perfil', $perfis, null, array('class' => 'form-control')) }}

                <br>
                
                {{ Form::label('status', 'Status:') }}
                {{ Form::radio('status', 1, true, ['class' => 'field']) }}<label>ATIVO</label>
                {{ Form::radio('status', 0, false, ['class' => 'field']) }}<label>INATIVO</label>
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