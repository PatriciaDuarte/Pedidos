<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $id
 * @property string $data_pedido
 * @property string $hora_pedido
 * @property string $observacao
 * @property int $fk_cliente
 *
 * @property Cliente $fkCliente
 * @property ItemPedido[] $itemPedidos
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_pedido', 'hora_pedido', 'observacao', 'fk_cliente'], 'required'],
            [['data_pedido', 'hora_pedido'], 'safe'],
            [['fk_cliente'], 'integer'],
            [['observacao'], 'string', 'max' => 255],
            [['fk_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['fk_cliente' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_pedido' => 'Data Pedido',
            'hora_pedido' => 'Hora Pedido',
            'observacao' => 'Observacao',
            'fk_cliente' => 'Fk Cliente',
        ];
    }

    /**
     * Gets query for [[FkCliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'fk_cliente']);
    }

    /**
     * Gets query for [[ItemPedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemPedidos()
    {
        return $this->hasMany(ItemPedido::className(), ['fk_pedido' => 'id']);
    }
}
