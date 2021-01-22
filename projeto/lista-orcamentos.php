<?php

require_once 'vendor/autoload.php';

use Alura\DesignPattern\ListaDeOrcamentos;
use Alura\DesignPattern\Orcamento;

$listaOrcamentos = [];

$orcamento1 = new Orcamento();
$orcamento1->quantidadeItens = 10;
$orcamento1->aprova();
$orcamento1->valor = 1234.22;

$orcamento2 = new Orcamento();
$orcamento2->quantidadeItens = 25;
$orcamento2->reprova();
$orcamento2->valor = 1563.22;

$orcamento3 = new Orcamento();
$orcamento3->quantidadeItens = 50;
$orcamento3->aprova();
$orcamento3->valor = 4543.22;


$listaOrcamentos = new ListaDeOrcamentos();
$listaOrcamentos->addOrcamento($orcamento1);
$listaOrcamentos->addOrcamento($orcamento2);
$listaOrcamentos->addOrcamento($orcamento3);

foreach ($listaOrcamentos as $orcamento) {
    echo 'Valor: ' . $orcamento->valor . PHP_EOL;
    echo 'Estado: ' . get_class($orcamento->estadoAtual) . PHP_EOL;
    echo 'Qtd Itens: ' . $orcamento->quantidadeItens . PHP_EOL;

    echo PHP_EOL;
}