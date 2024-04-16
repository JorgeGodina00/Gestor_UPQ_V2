<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pdf;

class PdfController extends Controller
{
    public function uploadPdf(Request $request)
    {
        $request->validate([
            'categoria' => 'required|array',
            'subcategoria' => 'required',
            'cuatri' => 'required',
            'fuente_interna' => 'required',
            'evidencia' => 'required|mimes:pdf|max:2048', // PDF format, max 2MB
        ]);

        $pdf = new Pdf();
        $pdf->categoria = $request->input('categoria');
        $pdf->subcategoria = $request->input('subcategoria');
        $pdf->cuatri = $request->input('cuatri');
        $pdf->fuente_interna = $request->input('fuente_interna');

        // Upload and store the PDF file
        $evidencia = $request->file('evidencia');
        $evidenciaPath = $evidencia->store('pdfs', 'public');
        $pdf->evidencia = $evidenciaPath;

        $pdf->save();

        echo "El archivo se ha subido correctamente.";
        return redirect()->back()->with('success', 'PDF subido exitosamente.');
    }
}
