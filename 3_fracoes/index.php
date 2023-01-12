<?php

$entrada = '1/2 / 3/4';
calcularFracao($entrada);

function calcularFracao(string $entrada)
{
    $operador = pegarOperador($entrada);    
    $expressao = explode($operador, $entrada);
    
    $expressao_um = explode('/', $expressao[0]);
    $n1 = $expressao_um[0];
    $d1 = $expressao_um[1];

    $expressao_dois = explode('/', $expressao[1]);
    $n2 = $expressao_dois[0];
    $d2 = $expressao_dois[1];

    if($operador == ' + ') {
        somarFracao($n1, $d1, $n2, $d2);
    }

    if($operador == ' - ') {
        subtrairFracao($n1, $d1, $n2, $d2);
    }

    if($operador == ' * ') {
        multiplicarFracao($n1, $d1, $n2, $d2);
    }

    if($operador == ' / ') {
        dividirFracao($n1, $d1, $n2, $d2);
    }
}

function somarFracao(int $n1, int $d1, int $n2, int $d2)
{
    echo "$n1/$d1 + $n2/$d2 = <br>";

    echo "($n1*$d2) + ($d1*$n2)/($d1*$d2) = <br>";
    $etapa_um = $n1 * $d2;
    $etapa_dois = $d1 * $n2;
    $etapa_tres = $d1 * $d2;

    echo "$etapa_um + $etapa_dois/$etapa_tres = <br>";
    $etapa_quatro = $etapa_um + $etapa_dois;

    echo "$etapa_quatro/$etapa_tres = ";

    calcularMDC($etapa_quatro, $etapa_tres);
}

function subtrairFracao(int $n1, int $d1, int $n2, int $d2)
{
    echo "$n1/$d1 - $n2/$d2 = <br>";

    echo "($n1*$d2) - ($d1*$n2)/($d1*$d2) = <br>";
    $etapa_um = $n1 * $d2;
    $etapa_dois = $d1 * $n2;
    $etapa_tres = $d1 * $d2;

    echo "$etapa_um - $etapa_dois/$etapa_tres = <br>";
    $etapa_quatro = $etapa_um - $etapa_dois;

    echo "$etapa_quatro/$etapa_tres = ";

    calcularMDC($etapa_quatro, $etapa_tres);
}

function multiplicarFracao(int $n1, int $d1, int $n2, int $d2)
{
    echo "$n1/$d1 * $n2/$d2 = <br>";

    echo "($n1*$n2)/($d1*$d2) = <br>";
    $etapa_um = $n1 * $n2;
    $etapa_dois = $d1 * $d2;

    echo "$etapa_um/$etapa_dois = ";
    
    calcularMDC($etapa_um, $etapa_dois);
}

function dividirFracao(int $n1, int $d1, int $n2, int $d2)
{
    echo "$n1/$d1 / $n2/$d2 = <br>";
    $temporaria = $n2;
    $n2 = $d2;
    $d2 = $temporaria;
    
    multiplicarFracao($n1, $d1, $n2, $d2);
}

function pegarOperador(string $entrada)
{
    if(strripos($entrada, ' + ')) {
        return ' + ';
    }

    if(strripos($entrada, ' - ')) {
        return ' - ';
    }

    if(strripos($entrada, ' * ')) {
        return ' * ';
    }

    if(strripos($entrada, ' / ')) {
        return ' / ';
    }
}

function calcularMDC(int $valor_um, int $valor_dois)
{
    $mdc = gmp_gcd($valor_um, $valor_dois);

    if($mdc > 1) {
        echo ($valor_um / gmp_intval($mdc)) . "/" . ($valor_dois / gmp_intval($mdc));
    } else {
        echo "$valor_um/$valor_dois";
    }
}













