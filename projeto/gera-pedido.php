<?php

require_once 'vendor/autoload.php';

use Alura\DesignPattern\{GerarPedido, GerarPedidoHandler, Orcamento, Pedido};
use Alura\DesignPattern\AcoesAoGerarPedido\CriarPedidoNoBanco;
use Alura\DesignPattern\AcoesAoGerarPedido\EnviarPedidoPorEmail;
use Alura\DesignPattern\AcoesAoGerarPedido\LogGerarPedido;

$valorOrcamento = $argv[1];
$numeroDeItens = $argv[2];
$nomeCliente = $argv[3];

$gerarPedido = new GerarPedido($valorOrcamento, $numeroDeItens, $nomeCliente);
$gerarPedidoHander = new GerarPedidoHandler();
$gerarPedidoHander->adicionarAcaoAoGerarPedido(new CriarPedidoNoBanco());
$gerarPedidoHander->adicionarAcaoAoGerarPedido(new EnviarPedidoPorEmail());
$gerarPedidoHander->adicionarAcaoAoGerarPedido(new LogGerarPedido());
$gerarPedidoHander->execute($gerarPedido);