<?php

namespace App\Exports;

use App\Propietario;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class PropietarioExport implements FromView, WithEvents, ShouldAutoSize
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

            $diff = Carbon::createFromDate($inicio)->diffInDays(Carbon::createFromDate($fin));

            switch ($this->filtro) {
                case 'registrados':
                    $propietarios = Propietario::with('contratos', 'contratos.inmueble')->whereBetween('created_at', [$inicio, $fin])->get();
                    return view('informes.propietarios.excel', compact('propietarios', 'inicio', 'fin', 'diff'));
                    break;
                case 'pendientes':
                    $propietarios = Propietario::with('contratos', 'contratos.inmueble')
                        ->orWhereDoesntHave('contratos.pago_realizados', function ($query) use ($inicio, $fin) {
                            $query->whereBetween('fecha',  [$inicio, $fin]);
                        })
                        ->whereHas('contratos')->get();
                    return view('informes.propietarios.pendientes', compact('propietarios', 'inicio', 'fin', 'diff'));
                    break;
                case 'saldados':
                    $propietarios = Propietario::with('contratos', 'contratos.inmueble', 'contratos.pago_realizados')
                        ->whereHas('contratos.pago_realizados', function ($query) use ($inicio, $fin) {
                            $query->whereBetween('fecha',  [$inicio, $fin]);
                        })->get();
                    return view('informes.propietarios.saldados', compact('propietarios', 'inicio', 'fin', 'diff'));
                    break;
                default:
                    $propietarios = Propietario::with('contratos', 'contratos.inmueble')->get();
                    return view('informes.propietarios.todos', compact('propietarios', 'inicio', 'fin', 'diff'));
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
