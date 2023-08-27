<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int|null $customer_user_id
 * @property string|null $ordered_at
 * @property int|null $customer_address_id
 * @property int|null $status
 * @property string|null $required_at
 *
 * @property CustomerAddress $customerAddress
 * @property CustomerUser $customerUser
 * @property OrderDetail[] $orderDetails
 * @property Payment[] $payments
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_user_id', 'customer_address_id', 'status'], 'integer'],
            [['ordered_at', 'required_at'], 'safe'],
            [['customer_address_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerAddress::class, 'targetAttribute' => ['customer_address_id' => 'id']],
            [['customer_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerUser::class, 'targetAttribute' => ['customer_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_user_id' => 'Customer User ID',
            'ordered_at' => 'Ordered At',
            'customer_address_id' => 'Customer Address ID',
            'status' => 'Status',
            'required_at' => 'Required At',
        ];
    }

    /**
     * Gets query for [[CustomerAddress]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerAddress()
    {
        return $this->hasOne(CustomerAddress::class, ['id' => 'customer_address_id']);
    }

    /**
     * Gets query for [[CustomerUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerUser()
    {
        return $this->hasOne(CustomerUser::class, ['id' => 'customer_user_id']);
    }

    /**
     * Gets query for [[OrderDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::class, ['order_id' => 'id']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::class, ['order_id' => 'id']);
    }
}
