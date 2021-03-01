<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $model;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Cliente $client)
    {
        $this->model = $client;
    }

    public function getClientes($id){
        $cliente = $this->model->get()->where('estabelecimento_id', '=', $id)->makeHidden('estabelecimento_id');
        return response()->json($cliente);
    }

    public function getClienteById($id, $id_cliente){
        $cliente = $this->model->where('estabelecimento_id', '=', $id)->find($id_cliente)->makeHidden('estabelecimento_id');
        return response()->json($cliente);
    }

    public function save($id, Request $request){
        $this->validate($request, ['email' => 'required', 'email' => 'required']);
        $data = $request->getContent();
        $data = json_decode($data);
        $data->estabelecimento_id = $id;

        $cliente = $this->model->create((array) $data);

        return response()->json($cliente);
    }

    public function update($id, $id_cliente, Request $request){
        $data = json_decode($request->getContent(), true);
        $cliente = $this->model->find($id_cliente)->update($data);
        return response()->json($cliente);
    }
}
