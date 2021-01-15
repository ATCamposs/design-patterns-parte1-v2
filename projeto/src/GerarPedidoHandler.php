<?php

namespace Alura\DesignPattern;

use DateTimeImmutable;

class GerarPedidoHandler
{
    public function __construct()
    {
        
    }
    
    public function execute(GerarPedido $gerarPedido)
    {
        $orcamento = new Orcamento();
        $orcamento->quantidadeItens = $gerarPedido->getnumeroItens();
        $orcamento->valor = $gerarPedido->getvalorOrcamento();

        $pedido = new Pedido();
        $pedido->dataFinalizacao = new DateTimeImmutable();
        $pedido->nomeCliente = $gerarPedido->getnomeCliente();
        $pedido->orcamento= $orcamento;

        echo "Cria pedido no banco de dados " . PHP_EOL;
        echo "Envia e-mail para cliente " . PHP_EOL;
    }
}