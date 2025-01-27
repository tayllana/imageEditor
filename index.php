<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <title>Posicionar e Salvar Logo</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/fabric.min.js"></script>
    <script src="js/fabricFunctions.js?v=1"></script>
</head>

<body>
    <h1>Posicione e Salve sua Logo</h1>

    <canvas id="canvas" width="500" height="500"></canvas>

    <div class="acoes">
        <button id="save" onclick="downloadPost()">Download</button>
        <button id="save" onclick="useLogo()">Usar logo</button>
        <label for="arquivo">Enviar imagem</label>
        <input type="file" name="arquivo" id="arquivo" onchange="useImageUploaded(this.files[0])">
    </div>
    </div>
    <script>
        canvas = new fabric.Canvas('canvas');
        callCanvaMerge();

        canvas.on('object:modified', function(e) {
            debugger
            const activeObject = e.target;
            if (activeObject && activeObject.type === 'image') {
                console.log('Alterações finalizadas. Posição:', activeObject.left, activeObject.top, 
                            'Escala:', activeObject.scaleX, activeObject.scaleY);
            }
        });
    </script>
    <style>
        body {
            font-family: sans-serif;
            text-align: -webkit-center;
        }

        .acoes {
            margin-top: 20px;
            display: ruby;

        }

        #save {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="file"] {
            display: none;
        }
        label {
            padding: 10px 20px;
            width: 140px;
            font-size: 13px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            display: block;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
</body>

</html>
