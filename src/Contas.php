<?php

//definir classe é prática de OO, sempre primeira maiscula - nela será definido os moldes que todo OBJETO/INSTANCIA conterá//
class Conta
{
  public string $cpfTitular; //atributos da classe para o objeto
  public string $nomeTitular;
  public float $saldo;
}

//As variáveis possuem um endereço para a classe, não possuem um valor inteiro, e por isso é possível ter mais que uma variável apontando para o mesmo lugar
//Objeto
$primeiraConta = new Conta();
$primeiraConta->cpfTitular = '123.456.789-10';
$primeiraConta->nomeTitular = 'Vinicius Viana';
$primeiraConta->saldo = '5000';

$segundaConta = new Conta();
$segundaConta->cpfTitular = '987.654.321-41';
$segundaConta->nomeTitular = 'Alan Araujo';
$segundaConta->saldo = '200';

$teste = $segundaConta;
$teste->saldo = 2000;

echo $segundaConta->saldo;


/*
exemplo de função criar conta:
function criarConta(string $cpf, string $nomeTitular, float $saldo): array
{
  return [
    $cpf => [
      'titular' => $nomeTitular,
      'saldo' => $saldo
    ]
  ];
}
*/
