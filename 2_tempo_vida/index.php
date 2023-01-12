<?php

$dias_vida = 800;
calcularAnoMesDias($dias_vida);

function calcularAnoMesDias(int $dias_vida)
{
    $total_dias_ano = 365;
    $total_dias_mes = 30;
    
    $anos = 0;
    $mes = 0;
    $dias = 0;
    
    $totalAnos = intval($dias_vida / $total_dias_ano);
    $dias_vida -= ($total_dias_ano * $totalAnos);
    
    $totalMes = intval($dias_vida / $total_dias_mes);
    $dias_vida -= ($total_dias_mes * $totalMes);
    
    echo "$totalAnos ano(s) <br>";
    echo "$totalMes mes(es) <br>";
    echo "$dias_vida dia(s) <br>";
}

?>