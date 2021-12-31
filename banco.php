<?php

require_once 'C:\Users\Erick\Downloads\phpOO\src\Contas.php';
require_once 'C:\Users\Erick\Downloads\phpOO\src\Titular.php';

$primeiraConta = new Conta(new Titular('123.654.789-10', 'Vinicius Viana'));
$primeiraConta->depositar(500);
$primeiraConta->sacar(100);

$segundaConta = new Conta(new Titular('789.252.656-45', 'Erick Sales'));
$segundaConta->depositar(6500);


var_dump($primeiraConta);
