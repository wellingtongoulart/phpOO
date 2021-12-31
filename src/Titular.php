<?php

class Titular
{
  private string $cpf;
  private string $nome;

  public function __construct($cpf, $nome)
  {
    $this->$cpf = $cpf;
    $this->$nome = $nome;
    $this->validaNome($nome);
  }
  public function recuperaNomeTitular(): string
  {
    return $this->titular->recuperaNome();
  }

  public function recuperaCpfTitular(): string
  {
    return $this->titular->recuperaCpf();
  }

  public function validaNome(string $nome)
  {
    if (strlen($nome) < 6) {
      echo "Favor inserir nome e sobrenome";
      exit();
    }
  }
}
