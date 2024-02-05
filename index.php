<?php

interface ContaBancaria
{
  public function criarConta();
}

abstract class ContaBancariaBrasil implements ContaBancaria
{
  protected $banco;
  protected $agencia;
  protected $numero;

  public function criarConta() {
    echo 'Banco: '.$this->banco.'<br>';
    echo 'Agência: '.$this->agencia.'<br>';
    echo 'C/C: '.$this->numero;
  }
}

abstract class ContaBancariaEUA implements ContaBancaria
{
  protected $roteamento;
  protected $numero;

  public function criarConta() {
    echo 'Roteamento: '.$this->roteamento.'<br>';
    echo 'Número Conta: '.$this->numero;
  }
}

class BancoDoBrasil extends ContaBancariaBrasil
{
  public function __construct()
  {
    $this->banco = '001 - Banco do Brasil';
    $this->agencia = 8080-0;
    $this->numero = 808080-0;
  }
}

class CaixaEconomica extends ContaBancariaBrasil
{
  public function __construct()
  {
    $this->banco = '002 - Caixa Econômica';
    $this->agencia = 9090;
    $this->numero = 909090-0;
  }
}

class USBank extends ContaBancariaEUA
{
  public function __construct()
  {
    $this->roteamento = 123456789;
    $this->numero = 98765-0;
  }
}

/**
 * Recebe a interface como parâmetro
 */
function gerarContaBancaria(ContaBancaria $contaBancaria)
{
  $contaBancaria->criarConta();
}

// Gerar conta banco do brasil
gerarContaBancaria(contaBancaria: new BancoDoBrasil());

echo '<hr>';

// Gerar conta caixa economica
gerarContaBancaria(contaBancaria: new CaixaEconomica());

echo '<hr>';

// Gerar conta dos EUA
gerarContaBancaria(contaBancaria: new USBank());
