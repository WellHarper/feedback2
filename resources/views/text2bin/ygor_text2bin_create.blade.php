<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Conversor</title>
</head>
<body style="background-color:#f9f9f9; width: 100%;">
    <div class="container" style="width: 100%;margin-top:5%;background-color:#fff;border:solid 1px #ccc; padding:1%;box-shadow: 2px 2px 4px #ccc;">
        

            <div class="form-group">
        
                    <h1 style="margin-bottom: 2%;text-shadow:1px 1px 1px #ccc;">Conversor de texto para binário</h1>
        
              
                    <input placeholder="Digite seu texto" class="form-control" id="ti1"/>
                    <textarea style="height: 250px;font-size: 30px;" class="form-control mt-4" id="ti2" disabled> </textarea>
                    <button class="btn btn-primary btn-lg mt-4" onClick="convert();" onkeydown="convert()">Converter</button>
                </div>


            
    


    </div>
        <script>
        function convert() {
            var output = document.getElementById("ti2");
            var input = document.getElementById("ti1").value;
            output.value = "";
            for (var i = 0; i < input.length; i++) {
                output.value += input[i].charCodeAt(0).toString(2) + " ";
            }
        }
        </script>
    
</body>
</html>