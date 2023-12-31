<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer_address".
 *
 * @property int $id
 * @property int|null $customer_user_id
 * @property int|null $region_id
 * @property int|null $district_id
 * @property string|null $address
 * @property string|null $zipcode
 * @property string|null $phone_number
 *
 * @property CustomerUser $customerUser
 * @property District $district
 * @property Order[] $orders
 * @property Region $region
 */
class CustomerAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_user_id', 'region_id', 'district_id'], 'integer'],
            [['address'], 'string'],
            [['zipcode', 'phone_number'], 'string', 'max' => 255],
            [['customer_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerUser::class, 'targetAttribute' => ['customer_user_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::class, 'targetAttribute' => ['district_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::class, 'targetAttribute' => ['region_id' => 'id']],
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
            'region_id' => 'Region ID',
            'district_id' => 'District ID',
            'address' => 'Address',
            'zipcode' => 'Zipcode',
            'phone_number' => 'Phone Number',
        ];
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
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::class, ['id' => 'district_id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['customer_address_id' => 'id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::class, ['id' => 'region_id']);
    }
}
