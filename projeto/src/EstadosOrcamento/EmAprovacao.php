<?php

namespace Alura\DesignPattern\EstadosOrcamento;

use Alura\DesignPattern\Orcamento;

class EmAprovacao
{
    public function calculaDescontoExtra(Orcamento $orcamento)
    {
        return $orcamento->valor * 0.05;
    }

    public function aprova(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = new Aprovado();
    }

    public function reprova(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = new Reprovado();
    }
}