<?php

namespace common\models;

use common\models\query\CategoryQuery;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int|null $PID
 * @property string|null $name
 * @property int|null $status
 * @property string|null $image
 *
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    const CATEGORY_ACTIVE = 1;
    const CATEGORY_INACTIVE = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PID', 'status'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
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
            'PID' => 'Pid',
            'name' => 'Name',
            'status' => 'Status',
            'image' => 'Image',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    public static function find()
    {
        return (new CategoryQuery(get_called_class()));
    }


}
