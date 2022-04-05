<?php

require __DIR__.'/vendor/autoload.php';

use \App\WebService\Correios;

$obCorreios = new Correios();

$codigoServico = Correios::SERVICO_SEDEX; 
$cepOrigem = "45822021"; 
$cepDestino = "45580000";
$peso = 1;
$formato = Correios::FORMATO_CAIXA_PACOTE;
$comprimento = 15; 
$altura = 15;
$largura = 15;
$diametro = 0;
$maoPropria = false;
$valorDeclarado = 0;
$avisoRecebimento = false;

$frete = $obCorreios->calcularFrete(
  $codigoServico, 
  $cepOrigem, 
  $cepDestino, 
  $peso, 
  $formato, 
  $comprimento, 
  $altura, 
  $largura,
  $diametro,
  $maoPropria,
  $valorDeclarado,
  $avisoRecebimento);

// VERIFICA O RESULTADO

if(!$frete) {
  die('Problemas ao calcular o frete');
}

// VERIFICA O ERRO 

if(strlen($frete->MsgErro)) {
  die('Erro:'.$frete->MsgErro);
}

// IMPRIME OS DADOS DA CONSULTA
echo "CEP Origem: ".$cepOrigem."\n";
echo "CEP Destino: ".$cepDestino."\n";
echo "Valor: ".$frete->Valor."\n";
echo "Prazo: ".$frete->PrazoEntrega." dias \n";