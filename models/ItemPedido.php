<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item_pedido".
 *
 * @property int $id
 * @property int $pk_produto
 * @property int $fk_pedido
 * @property int $quantidade
 * @property float $vr_unitario
 *
 * @property Pedido $fkPedido
 * @property Produto $pkProduto
 */
class ItemPedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pk_produto', 'fk_pedido', 'quantidade', 'vr_unitario'], 'required'],
            [['id', 'pk_produto', 'fk_pedido', 'quantidade'], 'integer'],
            [['vr_unitario'], 'number'],
            [['id'], 'unique'],
            [['fk_pedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['fk_pedido' => 'id']],
            [['pk_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['pk_produto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pk_produto' => 'Pk Produto',
            'fk_pedido' => 'Fk Pedido',
            'quantidade' => 'Quantidade',
            'vr_unitario' => 'Vr Unitario',
        ];
    }

    /**
     * Gets query for [[FkPedido]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkPedido()
    {
        return $this->hasOne(Pedido::className(), ['id' => 'fk_pedido']);
    }

    /**
     * Gets query for [[PkProduto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPkProduto()
    {
        return $this->hasOne(Produto::className(), ['id' => 'pk_produto']);
    }
}
