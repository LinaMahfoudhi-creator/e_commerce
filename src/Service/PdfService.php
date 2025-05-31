<?php

namespace App\Service;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\HttpFoundation\Response;

class PdfService
{
private $dompdf;

    public function __construct()
    {
        $this->dompdf = new DomPdf();
        $pdfOptions=new Options();
        $pdfOptions->set('defaultFont', 'Garamond');
        $this->dompdf->setOptions($pdfOptions);
    }

    public function showPdfFile($htmlContent )
    {
        $this->dompdf->loadHtml($htmlContent);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $output = $this->dompdf->output();

        // Retourne un objet Response avec le PDF
        return new Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="commande.pdf"',
        ]);
    }
    public function generateBinaryPdf($htmlContent)
    {
        $this->dompdf->loadHtml($htmlContent);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->output();
    }
}