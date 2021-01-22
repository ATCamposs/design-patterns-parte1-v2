<?php

namespace Alura\DesignPattern;

use Alura\DesignPattern\AcoesAoGerarPedido\AcaoAposGerarPedido;
use Alura\DesignPattern\AcoesAoGerarPedido\CriarPedidoNoBanco;
use Alura\DesignPattern\AcoesAoGerarPedido\EnviarPedidoPorEmail;
use Alura\DesignPattern\AcoesAoGerarPedido\LogGerarPedido;
use DateTimeImmutable;

class GerarPedidoHandler
{
    /** @var AcaoAposGerarPedido[] */
    private array $acoesAposGerarPedido = [];
    public function __construct()
    {
        
    }

    public function adicionarAcaoAoGerarPedido(AcaoAposGerarPedido $acao)
    {
        $this->acoesAposGerarPedido[] = $acao;
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

        $pedidosRepository = new CriarPedidoNoBanco();
        $logGerarPeido = new LogGerarPedido();
        $enviarPedidoPorEmail = new EnviarPedidoPorEmail();

        foreach ($this->acoesAposGerarPedido as $acao) {
            $acao->executaAcao($pedido);
        }
    }
}