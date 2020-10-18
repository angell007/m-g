// $contrato = Contrato::find(request()->get('codigo'))->with(['descuentos' => function ($query) {
            //     $query->whereBetween('created_at', [Carbon::createFromDate(request()->get('min')), Carbon::createFromDate(request()->get('max'))]);
            // }]);
            // $contrato = Contrato::find(request()->get('codigo'))->with(['descuentos' => function ($query) {
            //     $query->whereBetween('created_at', [Carbon::createFromDate(request()->get('min')), Carbon::createFromDate(request()->get('max'))]);
            // }]);
            // $contrato = Contrato::findOrFail(request()->get('codigo'))->descuentos()
            // ->whereBetween('created_at', [Carbon::createFromDate(request()->get('min')), Carbon::createFromDate(request()->get('max'))]);