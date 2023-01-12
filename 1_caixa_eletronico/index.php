<?php

$valorSaque = 91.01;
echo "<h4> Saque Total: $valorSaque </h4>";
converterNotasMoedas($valorSaque);

function converterNotasMoedas(float $valorSaque)
{
    $notas = [100, 50, 20, 10, 5, 2];
    $totalNotasImpressas = [
        100 => 0,
        50 => 0,
        20 => 0,
        10 => 0,
        5 => 0,
        2 => 0,
    ];

    foreach ($notas as $nota) {
        $totalNotas = intval(round($valorSaque, 2) / $nota);
        $valorSaque -= $totalNotas * $nota;
        $totalNotasImpressas = array_replace($totalNotasImpressas, [$nota => $totalNotas]);
    }

    $moedas = [
        'um_real' => 1.0,
        'cinquenta_centavos' => 0.5,
        'vinte_e_cinco_centavos' => 0.25,
        'dez_centavos' => 0.1,
        'cinco_centavos' => 0.05,
        'um_centavo' => 0.01,
    ];

    $totalMoedasImpressas = [
        'um_real' => 0,
        'cinquenta_centavos' => 0,
        'vinte_e_cinco_centavos' => 0,
        'dez_centavos' => 0,
        'cinco_centavos' => 0,
        'um_centavo' => 0,
    ];

    foreach ($moedas as $key => $moeda) {
        $totalMoedas = intval($valorSaque / $moeda);
        $valorSaque -= $totalMoedas * $moeda;
        $totalMoedasImpressas = array_replace($totalMoedasImpressas, [$key => $totalMoedas]);
    }

    echo "
        <p> Notas </p>
        $totalNotasImpressas[100] nota(s) de R$ 100.00 <br>
        $totalNotasImpressas[50] nota(s) de R$ 50.00 <br>
        $totalNotasImpressas[20] nota(s) de R$ 20.00 <br>
        $totalNotasImpressas[10] nota(s) de R$ 10.00 <br>
        $totalNotasImpressas[5] nota(s) de R$ 5.00 <br>
        $totalNotasImpressas[2] nota(s) de R$ 2.00 <br>
    
        <p> Moedas </p>
        $totalMoedasImpressas[um_real] moeda(s) de R$ 1.00 <br>
        $totalMoedasImpressas[cinquenta_centavos] moeda(s) de R$ 0.50 <br>
        $totalMoedasImpressas[vinte_e_cinco_centavos] moeda(s) de R$ 0.25 <br>
        $totalMoedasImpressas[dez_centavos] moeda(s) de R$ 0.10 <br>
        $totalMoedasImpressas[cinco_centavos] moeda(s) de R$ 0.05 <br>
        $totalMoedasImpressas[um_centavo] moeda(s) de R$ 0.01 <br>
    ";
}