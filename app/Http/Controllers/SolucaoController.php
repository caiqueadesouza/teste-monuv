<?php

namespace App\Http\Controllers;

use App\Http\Requests\LucroMaxRequest;
use App\Http\Requests\MelhorParRequest;

class SolucaoController extends Controller
{
    public function lucroMax(LucroMaxRequest $request)
    {

        $precos = explode(",", $request->precos);

        if (!$this->verficarValores($precos))
            return view('welcome')->with(['errorPrecos' => 'Valores Informados Incorretamente!',]);

        $lucro = 0;
        $length = count($precos);

        for ($i = 0; $i < $length - 1; $i++) {
            if ($precos[$i] < $precos[$i + 1]) {
                $lucro += $precos[$i + 1] - $precos[$i];
            }
        }

        return view('welcome')->with([
            'entrada' => $request->precos,
            'lucro' => $lucro
        ]);
    }

    public function melhorPar(MelhorParRequest $request)
    {

        $duracaoComerciais = explode(",", $request->comerciais);

        if (!$this->verficarValores($duracaoComerciais))
            return view('welcome')->with(['errorComerciais' => 'Valores Informados Incorretamente!',]);


        $intervalo = $request->intervalo;

        $valorMaisProximo = 0;
        $length = count($duracaoComerciais);

        for ($i = 0; $i < $length; $i++) {
            for ($j = $i + 1; $j < $length - 1; $j++) {
                $duracaoTotal = $duracaoComerciais[$i] + $duracaoComerciais[$j];

                if ($duracaoTotal <= $intervalo && $duracaoTotal > $valorMaisProximo) {
                    $valorMaisProximo = $duracaoTotal;
                    $combinacao = [$i, $j];
                }
            }
        }

        $combinacao = implode(", ", $combinacao);

        return view('welcome')->with([
            'comerciais' => $request->comerciais,
            'intervalo' => $intervalo,
            'combinacao' => $combinacao
        ]);

    }

    public function verficarValores(array $dados): bool
    {
        $apenasNumeros = true;
        foreach ($dados as $elemento) {
            if (!is_numeric($elemento)) {
                $apenasNumeros = false;
                break;
            }
        }

        return $apenasNumeros;
    }
}