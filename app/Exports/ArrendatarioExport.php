<?php

namespace App\Exports;

use App\Arrendatario;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ArrendatarioExport implements FromView, WithEvents, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct($data)
    {
        $this->inicio = $data['min'];
        $this->fin = $data['max'];
        $this->filtro = $data['filtro'];
    }

    public function view(): View
    {
        try {
            $inicio = Carbon::createFromDate(request()->get('min'))->addDays(1)->format('Y-m-d');
            $fin = Carbon::createFromDate(request()->get('max'))->addDays(1)->format('Y-m-d');

            switch ($this->filtro) {
                case 'registrados':
                    $arrendatarios = Arrendatario::with('contratos', 'contratos.inmueble')->whereBetween('created_at', [$inicio, $fin])->get();
                    return view('informes.arrendatarios.excel', compact('arrendatarios', 'inicio', 'fin'));
                    break;
                case 'pendientes':
                    $arrendatarios = Arrendatario::with('contratos', 'contratos.inmueble')
                        ->orWhereDoesntHave('contratos.pago_recibidos', function ($query) use ($inicio, $fin) {
                            $query->whereBetween('fecha',  [$inicio, $fin]);
                        })
                        ->whereHas('contratos')->get();
                    return view('informes.arrendatarios.pendientes', compact('arrendatarios', 'inicio', 'fin'));
                    break;
                case 'saldados':
                    $arrendatarios = Arrendatario::with('contratos', 'contratos.inmueble', 'contratos.pago_recibidos')
                        ->whereHas('contratos.pago_recibidos', function ($query) use ($inicio, $fin) {
                            $query->whereBetween('fecha',  [$inicio, $fin]);
                        })->get();
                    return view('informes.arrendatarios.saldados', compact('arrendatarios', 'inicio', 'fin'));
                    break;
                default:
                    $arrendatarios = Arrendatario::with('contratos', 'contratos.inmueble')->get();
                    return view('informes.arrendatarios.todos', compact('arrendatarios', 'inicio', 'fin'));
                    break;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getStyle($cellRange)->getFont()->setSize(10);
            },
        ];
    }
}
