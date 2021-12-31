<?php

//propriedades privadas e métodos públicos
//definir classe é prática de OO, sempre primeira maiscula - nela será definido os moldes que todo OBJETO/INSTANCIA conterá//
class Conta
{
  private string $cpfTitular; //atributos da classe para o objeto
  private string $nomeTitular; //depois de se tornar privado, o usuario não tem mais acesso
  private float $saldo = 0;
  //dados

  public function defineCpfTitular(string $cpf)
  {
    $this->cpfTitular = $cpf;
  }

  public function recuperarCpfTitular(): string
  {
    return $this->cpfTitular;
  }

  public function defineNomeTitular(string $nome)
  {
    $this->nomeTitular = $nome;
  }

  public function recuperarNomeTitular(): string
  {
    return $this->nomeTitular;
  }

  public function recuperarSaldo(): float
  {
    return $this->saldo;
  }



  public function sacar(float $valorASacar): void
  {
    if ($valorASacar > $this->saldo) {
      echo "Saldo indisponível";
      return;
    }
    $this->saldo -= $valorASacar;
  } //função de sacar dentro do molde da conta. o $this serve para modificar o atributo da objeto que o está chamando//

  public function depositar(float $valorADepositar): void //não devolve, não tem retorno
  {
    if ($valorADepositar < 0) { //evitar o uso de else, atenção ao uso do return, mas pode usar else
      echo "O valor precisa ser positivo";
      return;
    }
    $this->saldo += $valorADepositar;
  }

  public function transferir(float $valorATransferir, Conta $contaDestino): void
  {
    if ($valorATransferir > $this->saldo) {
      echo "Saldo indisponível";
      return;
    }
    $this->sacar($valorATransferir);
    $contaDestino->depositar($valorATransferir);
  }
  //comportamentos
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

$segundaConta->depositar(-150);

$contaTeste = new Conta();
$contaTeste->depositar(5080);
$contaTeste2 = new Conta();
$contaTeste->transferir(200, $contaTeste2);

echo $contaTeste->saldo;

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
