<?php

namespace App\Service;

use Dompdf\Dompdf;
use Dompdf\Options;

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
        $this->dompdf->stream('commande.pdf', ['Attachment' => false]);
    }
    public function generateBinaryPdf($htmlContent)
    {
        $this->dompdf->loadHtml($htmlContent);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->output();
    }
}