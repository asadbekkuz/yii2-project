<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "favorite".
 *
 * @property int $id
 * @property int|null $customer_id
 * @property int|null $product_id
 * @property string|null $added_at
 *
 * @property Customer $customer
 * @property Product $product
 */
class Favorite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorite';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'added_at'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'product_id'], 'integer'],
            [['added_at'], 'safe'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'product_id' => 'Product ID',
            'added_at' => 'Added At',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}
