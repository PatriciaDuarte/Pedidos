<?php 
/*
echo "<pre>";
print_r($clientes);
echo "</pre>";
*/
$quantidadeGeral = 0;
$valorGeral=0;

foreach ($clientes as $chave => $cliente) 
{
  echo 'C | '. $cliente->id .' | '. $cliente->nome .' | '. $cliente->sexo.' | '. $cliente->cpf  ;
  echo '<br />';

  foreach ($cliente->pedidos as $chave=>$pedido) {
    echo 'P | '. $pedido->id .' | '.$pedido->data_pedido .' | '. $pedido->hora_pedido.' | '.$pedido->observacao  ;
    echo '<br />';
   $valorTotalItens = 0;
   $quantidadeTotalItens=0;
    foreach ($pedido->itemPedidos as $key => $item) {
        $valorTotal = $item->quantidade * $item->vr_unitario;
        $valorTotalItens = $valorTotalItens + $valorTotal;
        $quantidadeTotalItens = $quantidadeTotalItens + $item->quantidade;
        echo 'I | '.$item->id  .' | '. $item->pkProduto->nome.' | '. $item->quantidade .' | '. $item->vr_unitario .' | '. $valorTotal  ; 
        echo '<br />';
     }

    echo 'S |'. $quantidadeTotalItens .' | '. $valorTotalItens; 
    echo '<br />';
    $quantidadeGeral = $quantidadeGeral + $quantidadeTotalItens;
    $valorGeral = $valorGeral + $valorTotalItens;
  }
  
}
echo 'T |'. $quantidadeGeral .' | '. $valorGeral; 
