<!doctype html>
<html lang="pt-br">
    <head>
    <script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>
        <title>Alterar imagem - SatellaSoft</title>
        <meta charset="utf-8">

        <script type="text/javascript">

            function alterarImagem() {//Recebemos dois valores por parâmetro.
                var caminhoNovaImagem = $('#imagem').val();
                var res = caminhoNovaImagem.split("\\");
                document.getElementById('img').src = "../img/"+ res[2];
            }
        </script>
    </head>
    <body>
        <div id="dvCentro">
        <input onchange="alterarImagem();" type="file" id="imagem" name="imagem" />
                <br />
                    <div style="border-bottom:3px solid #000; padding:5px;"></div>
                <br />
                <img src="../img/cami.jpeg" alt="Imagem" title="Imagem" id="img" />
                <!-- por Default já tem uma imagem como padrão.-->
            <br />
        </div>
    </body>
</html>