@extends('adminlte::page')

@section('title', 'Usuário')

@section('content_header')
<h1>Usuário - Editar</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('user.index') }}"><i class="fa fa-dashboard"></i> Usuário</a></li>
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
            <h3 class="box-title">Editar - {{ $user->name }}</h3>
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
                {{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) }}
            <div class="form-group">
                {{ Form::label('name', 'Nome') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}

                {{ Form::label('email', 'E-mail') }}
                {{ Form::text('email', null, array('class' => 'form-control')) }}
                
                {{ Form::label('password', 'Senha') }}
                {{-- Form::password('password', Input::old('password'), array('class' => 'form-control')) --}}
                <input type="password" name="password" class="form-control"> <!--placeholder="Password"-->

                {{ Form::label('confirm-password', 'Confirmar a senha') }}
                {{-- Form::password('confirm-password', Input::old('confirm-password'), array('class' => 'form-control')) --}}
                <input type="password" name="confirm-password" class="form-control"> <!--placeholder="Password"-->

                <br>
                
                {{ Form::label('perfil', 'Perfil') }}
                {{ Form::select('perfil', $perfis, null, array('class' => 'form-control')) }}
                
                {{ Form::label('status', 'Status:') }}
                {{ Form::radio('status', 1, true, ['class' => 'field']) }}<label>ATIVO</label>
                {{ Form::radio('status', 0, false, ['class' => 'field']) }}<label>INATIVO</label>

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