<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ai\Agents\ExtratorDocumento;
use Smalot\PdfParser\Parser; 
use Laravel\Ai\Enums\Lab; // Para usar provedor de model

class AITestController extends Controller
{
    // Esta função apenas mostra a página inicial
    public function index() {
        return view('documento', ['dados' => null]);
    }

   public function processar(Request $request) {
    
       $request->validate([
            'arquivo_pdf' => 'required|mimes:pdf|max:2048',
        ]);

        // Lê o texto dentro do PDF
        $parser = new Parser();
        $pdf = $parser->parseFile($request->file('arquivo_pdf')->getPathname());
        $textoExtraido = $pdf->getText();

        // Envia o texto para o seu Agente de IA
        $resultado = ExtratorDocumento::make()->prompt($textoExtraido);

        return view('documento', ['dados' => $resultado]);
    }
}