<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property int|null $customer_user_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $middle_name
 * @property string|null $gender
 * @property string|null $birth_date
 * @property string|null $registered_at
 * @property int|null $status
 *
 * @property CustomerUser $customerUser
 * @property Favorite[] $favorites
 * @property PaymentMethod[] $paymentMethods
 * @property Review[] $reviews
 */
class Customer extends \yii\db\ActiveRecord
{
    const CUSTOMER_INACTIVE = 0;
    const CUSTOMER_ACTIVE = 1;
    const CUSTOMER_DELETED = 2;
    const CUSTOMER_MALE = 0;
    const CUSTOMER_FEMALE = 1;
    const CUSTOMER_OTHER = 2;

    public $gallery = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_user_id', 'status'], 'integer'],
            [['birth_date', 'registered_at'], 'safe'],
            [['first_name', 'last_name', 'middle_name', 'gender'], 'string', 'max' => 255],
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
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'gender' => 'Gender',
            'birth_date' => 'Birth Date',
            'registered_at' => 'Registered At',
            'status' => 'Status',
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
     * Gets query for [[Favorites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavorites()
    {
        return $this->hasMany(Favorite::class, ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[PaymentMethods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMethods()
    {
        return $this->hasMany(PaymentMethod::class, ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['customer_id' => 'id']);
    }
    public static function getCustomerGenderLabels(): array
    {
        return [
            self::CUSTOMER_MALE=> 'MALE',
            self::CUSTOMER_FEMALE=> 'FEMALE',
            self::CUSTOMER_OTHER=> 'OTHER',

        ];
    }
    public static function getCustomerStatusLabels(): array
    {
        return [
            self::CUSTOMER_ACTIVE => 'ACTIVE',
            self::CUSTOMER_INACTIVE => 'INACTIVE',
            self::CUSTOMER_DELETED => 'DELETED',
        ];
    }
}
