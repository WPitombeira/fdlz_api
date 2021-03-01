<?php

namespace App\Http\Controllers;

use App\Models\Estabelecimento;
use Illuminate\Http\Client\Request;

class EstabelecimentoController extends Controller
{
    private $model;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Estabelecimento $estabelecimento)
    {
        $this->model = $estabelecimento;
    }

    public function getAll(){
        $estab = $this->model->all();
        return response()->json($estab);
    }

    public function getById($id){        
        $estabelecimento = $this->model->find($id);
        return response()->json($estabelecimento);
    }


    //
}
