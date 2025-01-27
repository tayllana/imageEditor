# 📃 Merge images with fabricJS
Este projeto é uma ferramenta para combinar imagens e criar uma nova a partir delas.

## 📎 Funcionalidades

Com esta projeto, é possível realizar as seguintes operações:
- Juntas 2 imagens
- adicionar novas imagens
- Modificar o posicionamento das imagens
- Fazer o download da imagem nova que foi gerada a partir da junção das outras
  
## 🚀 Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

### 📋 Pré-requisitos

Para instalar e executar este software, você precisará das seguintes ferramentas (Que já estão inclusas no pacote):

- Biblioteca jquery [jquery.min.js](https://github.com/agenciaset/www/tree/main/agenciaset/imageEditor/js/jquery.min.js)
- Biblioteca fabricjs[fabric.min.js](https://github.com/agenciaset/www/tree/main/agenciaset/imageEditor/js/fabric.min.js)

Certifique-se de ter todas essas ferramentas instaladas e configuradas antes de prosseguir.

### 🔧 Funcionamento

No servidor os arquivos se encontram no caminho /www/imageEditor

| Página  | Função |
| ------------- | ------------- |
| [/index.php](https://github.com/agenciaset/www/tree/main/agenciaset/imageEditor/index.php) | Página de modelo para testes |
| [/savePost.php](https://github.com/agenciaset/www/tree/main/agenciaset/imageEditor/savePost.php) | Programa backend para salvar os dados |
| [/config/conexao.php](https://github.com/agenciaset/www/tree/main/agenciaset/imageEditor/config/conexao.php) | Conexão com BD |
| [/img/....](https://github.com/agenciaset/www/tree/main/agenciaset/imageEditor/img/) | Local onde as imagens estão sendo mantidas |
| [js/jquery.min.js](https://github.com/agenciaset/www/tree/main/agenciaset/imageEditor/js/jquery.min.js) | Biblioteca Jquery |
| [js/fabric.min.js](https://github.com/agenciaset/www/tree/main/agenciaset/imageEditor/js/fabric.min.js) | Biblioteca FabricJS |
| [js/fabricFunctions.js](https://github.com/agenciaset/www/tree/main/agenciaset/imageEditor/js/fabricFunctions.js) | Script com as funções que são usadas para a proposta principal do projeto |

Para que tudo funcione. é preciso seguir alguns passos
- No head da pagina de teste [/index.php](https://github.com/agenciaset/www/tree/main/agenciaset/imageEditor/index.php) precisa ser referenciados os seguintes três arquivos:
```
<head>
    <script src="js/jquery.min.js"></script>
    <script src="js/fabric.min.js"></script>
    <script src="js/fabricFunctions.js?v=4"></script>
</head>
```
- No body desse mesmo arquivo precisa ter a tag canvas:
```
<canvas id="canvas" width="500" height="500"></canvas>
```
- Para fazer o download das imagens é preciso acrescentar a seguinte ação no botão:
```
<button id="save" onclick="downloadPost()">Download</button>
```
- Para que ao abrir o index as imagens já sejam carregadas e configuradas corretamente é necessário chamar a função `callCanvaMerge()` no script do index e também inicializar a classe canvas
```
    <script>
        canvas = new fabric.Canvas('canvas');
        callCanvaMerge();
    </script>
``` 
Se tudo isso estiver certo o programa já deve funcionar plenamente.

## ⚙️ Executando os testes

O programa pode ser acessado na web por [aqui!](https://www.agenciaset.com.br/imageEditor/)
Para testar basta movimentar as imagens de teste na tela e fazer o download da nova imagem que se formou.

## 🛠️ Construído com

* [PHP](https://www.php.net/) - Linguagem backend
* [JavaScript](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript) - Linguagem frontend
* [FabricJS](https://fabricjs.com/) - Biblioteca JS
* [Jquery](https://fabricjs.com/) - Biblioteca JS


## 🚨 OBSRVAÇÕES
 - O programa atual foi projetado para ser utilizado conforme está. Se for utilizado em outro contexto, pode ser necessário fazer algumas adaptações.
 - Se o programa for usado diretamente do pc abrindo na web pode haver problemas com CORS, portanto, par evitar isso é importante sempre usar um servidor local ou web.
