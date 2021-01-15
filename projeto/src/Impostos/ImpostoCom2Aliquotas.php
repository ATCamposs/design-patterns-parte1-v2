<?php

namespace Alura\DesignPattern\Impostos;

use Alura\DesignPattern\Orcamento;

abstract class ImpostoCom2Aliquotas implements Imposto
{
    public function calculaImposto(Orcamento $orcamento): float
    {
        if ($this->deveAplicarTaxaMaxima($orcamento)) {
            return $this->calculaTaxaMaxima($orcamento);
        }

        return $this->calculaTaxaMinima($orcamento);
    }

    /*
    Se nós utilizássemos private, nenhuma das classes filhas iriam 
    implementar o método da classe base. 
    Não existem métodos abstratos privados. 
    Já se deixássemos como public, 
    os métodos que deveriam ser apenas utilizados dentro da classe estariam acessíveis de qualquer lugar, 
    fornecendo um acesso desnecessário às regras do sistema.
    */
    abstract protected function deveAplicarTaxaMaxima(Orcamento $orcamento): bool;
    abstract protected function calculaTaxaMaxima(Orcamento $orcamento): float;
    abstract protected function calculaTaxaMinima(Orcamento $orcamento): float;
}