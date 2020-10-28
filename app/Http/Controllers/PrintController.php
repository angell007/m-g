<?php

namespace App\Http\Controllers;

use App\PagoRealizado;
use App\PagoRecibido;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Luecano\NumeroALetras\NumeroALetras;

class PrintController extends Controller
{
    public function realizado()
    {
        if (request()->get('id')) {
            $recibo = "./plantillas/" . $this->handlerRealizado(request()->get('id')) . ".xls";
            return response()->download($recibo)->deleteFileAfterSend(true);
        }
    }

    public function recibido()
    {
        if (request()->get('id')) {
            $PagoRecibido = PagoRecibido::with('contrato', 'contrato.inmueble', 'contrato.arrendatario')->findOrfail(request()->get('id'));
            $formatter = new NumeroALetras();

            $varloCanon = $formatter->toMoney($PagoRecibido['valor'], 2, 'PESOS', '');
            $varloAdmin = $formatter->toMoney($PagoRecibido['administracion'], 2, 'PESOS', '');

            $nombre =  str_replace(' ', '', $PagoRecibido['contrato']['propietario']['full_name']) . ".pdf";
            PDF::loadView('pdfs.reciboRecibido', compact('PagoRecibido', 'varloAdmin', 'varloCanon'))
                ->save(public_path("/pdfs/$nombre"));
            return  response()->download(public_path("/pdfs/$nombre"))->deleteFileAfterSend(true);
        }
    }

    public function handlerRealizado($realizado)
    {
        try {
            $formatter = new NumeroALetras();

            $PagoRealizado = PagoRealizado::with('contrato', 'contrato.inmueble', 'contrato.propietario')->findOrfail($realizado);
            $spreadsheet = IOFactory::load('./plantillas/plantilla.xlsx');
            $worksheet = $spreadsheet->getActiveSheet();


            $worksheet->getCell('D5')->setValue(date('d', strtotime($PagoRealizado->fecha)));
            $worksheet->getCell('E5')->setValue(date('m', strtotime($PagoRealizado->fecha)));
            $worksheet->getCell('F5')->setValue(date('Y', strtotime($PagoRealizado->fecha)));
            $worksheet->getCell('G5')->setValue(number_format($PagoRealizado->valor));
            $worksheet->getCell('C6')->setValue($PagoRealizado['contrato']['propietario']->full_name);
            $worksheet->getCell('C7')->setValue(
                'Canon del inmueble Ubicado en ' . $PagoRealizado['contrato']['inmueble']->direccion .
                    ' ' . $PagoRealizado['contrato']['inmueble']->direccion
            );

            $worksheet->getCell('C8')->setValue($formatter->toMoney($PagoRealizado['valor'], 2, 'PESOS', ''));

            $worksheet->getCell('E3')->setValue('Fechas de corte desde' . $PagoRealizado['desde'] . ' Hasta ' . $PagoRealizado['desde']);

            $worksheet->getCell('B11')->setValue('Canon');
            $worksheet->getCell('C11')->setValue($PagoRealizado['canon']);

            $worksheet->getCell('B12')->setValue('Comision de ' . $PagoRealizado['contrato']['inmueble']['comision'] . '%');
            $worksheet->getCell('D12')->setValue($PagoRealizado['comision']);

            $worksheet->getCell('B13')->setValue('Administracion');
            $worksheet->getCell('C13')->setValue($PagoRealizado['administracion']);

            $worksheet->getCell('B14')->setValue('Iva aplicado ');
            $worksheet->getCell('D14')->setValue($PagoRealizado['iva']);

            $worksheet->getCell('B17')->setValue('Sub Total');
            $worksheet->getCell('C17')->setValue($PagoRealizado['totalDebitos']);
            $worksheet->getCell('D17')->setValue($PagoRealizado['totalCreditos']);



            $writer = IOFactory::createWriter($spreadsheet, 'Xls');
            $writer->save("./plantillas/" . str_replace(' ', '', $PagoRealizado->contrato['propietario']['full_name'] . ".xls"));

            return  str_replace(' ', '', $PagoRealizado->contrato['propietario']['full_name']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
