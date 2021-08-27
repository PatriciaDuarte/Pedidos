<?php
namespace app\business;

use Yii;
use app\models\Pedido;
use app\models\ItemPedido;
use app\models\Cliente;
use app\models\Produto;

class BPedido
{
    public function gerarPedidos($dataInicial, $dataFinal)
    {
        //Seleção de tabelas      
        $clientes = Cliente::find()->with('pedidos')->all();
        return $clientes;

  
    }
}
