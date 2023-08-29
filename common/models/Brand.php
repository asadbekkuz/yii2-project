<?php

namespace common\models;

use common\models\query\BrandQuery;
use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $logo
 * @property string|null $short_name
 * @property int|null $status
 *
 * @property Product[] $products
 */
class Brand extends \yii\db\ActiveRecord
{

    const BRAND_ACTIVE = 1;
    const BRAND_INACTIVE = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name', 'logo', 'short_name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'logo' => 'Logo',
            'short_name' => 'Short Name',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['brand_id' => 'id']);
    }

    /**
     * @return BrandQuery
     */
    public static function find()
    {
        return (new BrandQuery(get_called_class()));
    }


}
