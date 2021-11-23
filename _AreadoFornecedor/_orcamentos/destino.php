<?php

# Os parâmetros podem ficar em um array
$vetParametros = array (
  "secret" => "6LfJP2MaAAAAAMofpfvV5uhL18DhUSUp4tacnWwH",
  "response" => $_POST["g-recaptcha-response"],
  "remoteip" => $_SERVER["REMOTE_ADDR"]
);
# Abre a conexão e informa os parâmetros: URL, método POST, parâmetros e retorno numa string
$curlReCaptcha = curl_init();
curl_setopt($curlReCaptcha, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($curlReCaptcha, CURLOPT_POST, true);
curl_setopt($curlReCaptcha, CURLOPT_POSTFIELDS, http_build_query($vetParametros));
curl_setopt($curlReCaptcha, CURLOPT_RETURNTRANSFER, true);
# A resposta é um objeto json em uma string, então só decodificar em um array (true no 2º parâmetro)
$vetResposta = json_decode(curl_exec($curlReCaptcha), true);
# Fecha a conexão
curl_close($curlReCaptcha);
# Analisa o resultado (no caso de erro, pode informar os códigos)
if ($vetResposta["success"]){
$condominio = $_POST["Condominiodata"];
$fornecedor = $_POST["fornrcedordata"];
$historico = $_POST["historicodata"];
$valor = $_POST["valordata"];
$os = $_POST["osdata"];
$complemento = $_POST["complementodata"];
$anexo = $_POST["anexodata"];


$conteudo = "$condominio; $fornecedor;  $historico; $valor; $os; $complemento; $anexo; ";

$DATA=date("d/m/Y"); 
$HORA=time("H");

$arq=fopen("../../_ArquivosTXT/Orcamentos.txt","a") or die("Erro na crição do arquivo EMPENHOS.TXT");

fwrite($arq,"\r\n");

fwrite($arq,"*");
fwrite($arq,str_pad($condominio,100));

fwrite($arq,";");
fwrite($arq,str_pad( $fornecedor,74));

fwrite($arq,";");
fwrite($arq,str_pad($historico,50));

fwrite($arq,";");
fwrite($arq,str_pad($valor,20));

fwrite($arq,";");
fwrite($arq,str_pad($DATA,20));

fwrite($arq,";");
fwrite($arq,str_pad($HORA,20));

fwrite($arq,";");
fwrite($arq,str_pad($os,10));
fwrite($arq,";");


fwrite($arq,"\r\n");
fwrite($arq,"#");
fwrite($arq,"-");
fwrite($arq,str_pad($complemento,398));

fwrite($arq,"\r\n");
fwrite($arq,"+");
fwrite($arq,"-");
fwrite($arq,str_pad($anexo,398));

fwrite($arq,";");
fwrite($arq,"\r\n");

fclose($arq);

$arq=fopen("../../_ArquivosTXT/Orcamentos.csv","a") or die("Erro na crição do arquivo EMPENHOS.CSV");

fwrite($arq,"\r\n");


fwrite($arq,"*");
fwrite($arq,str_pad($condominio,100));

fwrite($arq,";");
fwrite($arq,str_pad( $fornecedor,74));

fwrite($arq,";");
fwrite($arq,str_pad($historicodata,50));

fwrite($arq,";");
fwrite($arq,str_pad($valor,20));

fwrite($arq,";");
fwrite($arq,str_pad($DATA,20));

fwrite($arq,";");
fwrite($arq,str_pad($HORA,20));

fwrite($arq,";");
fwrite($arq,str_pad($os,10));
fwrite($arq,";");


fwrite($arq,"\r\n");
fwrite($arq,"#");
fwrite($arq,"-");
fwrite($arq,str_pad($complemento,398));

fwrite($arq,"\r\n");
fwrite($arq,"+");
fwrite($arq,"-");
fwrite($arq,str_pad($anexo,398));

fwrite($arq,";");
fwrite($arq,"\r\n");

fclose($arq);

  echo "<meta http-equiv='refresh' content='3;URL=correto.php'>";

}else {
  echo "<meta http-equiv='refresh' content='3;URL=erro.php'>";
}
?>

  <!DOCTYPE html>
  <html lang="pt-BR" >
  <head>
    <meta charset="UTF-8">
    <title>NEcon Gravar</title>
    <style>
  body {
    font-family: system-ui;
    background: #f01606;
    color: white;
    text-align: center;
    }

    
#loading {
    width: 100vw;
    height: 100vh;
    position: fixed;
    background: #f01606;
    z-index: 999;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}

#spinner {
    animation: rotate 0.76s infinite linear;
    width: 50px;
    height: 50px;
    border: 12px solid #fff;
    border-bottom: 12px solid rgb(255, 50, 50);
    border-radius: 50%;
    margin: 0;
}

@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
    </style>
  
  </head>
  <body>
  <!-- partial:index.partial.html -->
  <div id="loading">
    <div id="spinner"></div>
  </div>   
  <!-- partial -->
    <script>
      document.getElementsByTagName("h1")[0].style.fontSize = "6vw";
    </script>
  </html>

