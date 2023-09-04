<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer_image".
 *
 * @property int $id
 * @property int|null $customer_id
 * @property string|null $image
 */
class CustomerImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['image'] , 'image' , 'extensions' => 'png, jpg, jpeg']

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
            'image' => 'Image',
        ];
    }
}
