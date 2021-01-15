<?php

namespace Alura\DesignPattern\EstadosOrcamento;

use Alura\DesignPattern\Orcamento;
use DomainException;

class Reprovado extends EstadoOrcamento
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        throw new DomainException("Orçamentos reprovados não podem receber desconto");
    }
    
    public function finaliza(Orcamento $orcamento)
    {
        $orcamento = new Finalizado();
    }
}