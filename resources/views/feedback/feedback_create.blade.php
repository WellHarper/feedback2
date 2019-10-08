@extends('layouts.app')

@section('content')

<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<style>

.rating input[type=radio]{
    display:none;
}

.rating{
    transform: translate(-50%,-50%,);
    -webkit-transform: translate(-50%,-50%,);
    -ms-transform: translate(-50%,-50%,);
    transform:rotate(180deg);
    display:flex;
}
.rating label{
    display:block;
    cursor: pointer;
    width: 50px;
    transform:rotate(180deg);
}

.rating label:before{
    content:'\f005';
    font-family: fontAwesome;
    position:relative;
    display: block;
    color:#101010;
}

.rating label:after{
    content:'\f005';
    font-family: fontAwesome;
    position:relative;
    display: block;
    color:#FFFF00;
    top:-50%;
    opacity:0;
    transition: .5s;
    text-shadow: 0 2px 5px rgba(0,0,0,0.5);
}
.rating label:hover:after,
.rating label:hover ~ label:after,
.rating input:checked ~ label:after{
    opacity:1;
}
h5{
    padding:0 !important;


}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header d-flex justify-content-center">
                    <h3 class=>Formulário de Feedback</h3><span></span>
                    <i class="fas fa-clipboard ml-4 fa-2x"></i>
                </div>

                <div class="card-body">
                    <form action="{{ route('feedback.store') }}" method="POST">
                    @csrf
                        <div>
                            <label class="mt-3" for="">Nome:</label>
                            <input class="form-control" type="text" name="nome" required>
                        </div>
                        <div>
                            <label class="mt-3" for="">E-mail:</label>
                            <input class="form-control" type="email" name="email" required>
                        </div>
                        <div>
                            <label class="mt-3" for="">Selecione o Curso:</label>
                            <select class="form-control" name="curso_id" id="">
                            <option disabled selected>--selecione--</option>

                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="mt-3" for="">Deixe seu comentário:</label>
                            <textarea class="form-control" name="comentario" id="" cols="30" rows="5" required></textarea>
                        </div>

                        <?php $contador = 0;?>
                        @foreach ($quesitos as $quesito)
                        <div style="margin-top:5%;"><h5 style="text-align:center;">{{ $quesito->nome }}</h5>
                            <div class="rating fa-2x justify-content-center">
                        
                                <?php $contador = $contador + 1;?>
                                <input type="radio" id="star{{$contador}}" name="quesito_{{$quesito->id}}" value="5">
                                <label for="star{{$contador}}"></label>

                                <?php $contador = $contador + 1;?>
                                <input type="radio" id="star{{$contador}}" name="quesito_{{$quesito->id}}" value="4">
                                <label for="star{{$contador}}"></label>

                                <?php $contador = $contador + 1;?>
                                <input type="radio" id="star{{$contador}}" name="quesito_{{$quesito->id}}" value="3">
                                <label for="star{{$contador}}"></label>

                                <?php $contador = $contador + 1;?>
                                <input type="radio" id="star{{$contador}}" name="quesito_{{$quesito->id}}" value="2">
                                <label for="star{{$contador}}"></label>

                                <?php $contador = $contador + 1;?>
                                <input type="radio" id="star{{$contador}}" name="quesito_{{$quesito->id}}" value="1">
                                <label for="star{{$contador}}"></label>
                                

                            </div>
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-end">
                            <input type="submit" class="btn btn-primary" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection