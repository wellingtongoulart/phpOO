<?php

class Conta
{
  private $titular;
  private float $saldo;
  private static $numeroDeContas = 0;

  public function __construct(Titular $titular)
  {
    $this->titular = $titular;
    $this->saldo = 0;

    self::$numeroDeContas++;
  }

  public  function __destruct()
  {
    self::$numeroDeContas--;
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
  }

  public function depositar(float $valorADepositar): void
  {
    if ($valorADepositar < 0) {
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

  public static function recuperarNumeroDeContas(): int
  {
    return self::$numeroDeContas;
  }
}
