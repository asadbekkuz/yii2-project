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
 * @property string|null $imageFile
 *
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    public $imageFile;
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
            ['imageFile','file','extensions' => 'jpg,png,jpeg'],
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
            'PID' => 'Parent ID',
            'name' => 'Category Name',
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

    /**
     * Get status badge
     * @param $status
     * @return string
     */
    public function getStatusBadge($status): string
    {
        if($status === self::CATEGORY_ACTIVE){
            return "<span class='badge badge-success'>ACTIVE</span>";
        }else if($status === self::CATEGORY_INACTIVE) {
            return "<span class='badge badge-warning'>IN_ACTIVE</span>";
        }else{
            return "<span class='badge badge-danger'>ERROR</span>";
        }
    }
}
