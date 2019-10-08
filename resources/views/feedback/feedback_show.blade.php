@extends('adminlte::page')

@section('title', 'Feedback')
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
      </script>
      <script type = "text/javascript">
         google.charts.load('current', {packages: ['corechart']});     
      </script>
@section('content_header')
<h1>Feedback - Visualizar</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('feedback.index') }}"><i class="fa fa-dashboard"></i> Feedback</a></li>
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
            <h3 class="box-title">{{ $feedback->nome }}</h3>
        </div>
        <div class="box-body">
            <strong>Nome:</strong> {{ $feedback->nome }}<br>
            <strong>E-mail:</strong> {{ $feedback->email }}<br>
            <strong>Curso:</strong> {{ $feedback->curso_nome }}<br>
            <strong>Quesitos:</strong><br>

            @foreach ($quesitos as $quesito)
                <p>- {{ $quesito->quesito_nome }} - Nota: {{ $quesito->nota }}</p>
            @endforeach


            <strong>Criação:</strong> {{ $feedback->created_at }}<br>
            <strong>Atualização:</strong> {{ $feedback->updated_at }}

            <div id = "container" style = "width: 550px; height: 400px; margin: 0 auto">
      </div>
      <script language = "JavaScript">
         function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Quesito', 'Nota'],
                @if(isset($quesitos))
                    @foreach($quesitos as $key => $quesito)
                        ['{{ $quesito->quesito_nome}}', {{ $quesito->nota }}],
                    @endforeach
                @endif
            ]);

            var options = {title: 'Nota por quesito'}; 

            // Instantiate and draw the chart.
            var chart = new google.visualization.BarChart(document.getElementById('container'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!--Footer-->
        </div>
        <!-- /.box-footer-->
    </div>

</div>

@stop