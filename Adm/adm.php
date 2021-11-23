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
 
$tipo = $_POST["tipodata"];

$conteudo = "$tipo; ";

$DATA=date("d/m/Y"); 
$HORA=time("H");

$arq=fopen("Test.txt","a") or die("Erro na crição do arquivo EMPENHOS.TXT");

fwrite($arq,"\r\n");

fwrite($arq,"*");
fwrite($arq,str_pad($tipo,50));

fwrite($arq,";");
fwrite($arq,str_pad($DATA,20));

fwrite($arq,";");
fwrite($arq,str_pad($HORA,20));

fwrite($arq,";");

fwrite($arq,"\r\n");

fclose($arq);

$arq=fopen("test.csv","a") or die("Erro na crição do arquivo EMPENHOS.CSV");

fwrite($arq,"\r\n");

fwrite($arq,"*");
fwrite($arq,str_pad($tipo,50));

fwrite($arq,";");
fwrite($arq,str_pad($DATA,20));

fwrite($arq,";");
fwrite($arq,str_pad($HORA,20));

fwrite($arq,";");
fwrite($arq,"\r\n");

fclose($arq);

  echo "<meta http-equiv='refresh' content='3;URL=admcorreto.php'>";
}else {
    echo "<meta http-equiv='refresh' content='3;URL=admerro.php'>";
  }

