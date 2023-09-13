<?php

namespace common\models;

use common\models\query\ProductQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\bootstrap4\Html;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $desc_list
 * @property string|null $description
 * @property int|null $category_id
 * @property int|null $brand_id
 * @property string|null $SKU
 * @property string|null $specification
 * @property int|nul
 *
 *
 *  Get specification_name with value, like key value.
 * /**
 * l array
 * @property int|nul
 *
 *mixed *is_array()$specification_name  Get spif(e{
 * cification_name with value, like key value.
 * /**
 * l array
 * @property int|null $new_price
 * @property integer|null $created_at
mixed @property integer|null $updated_at
 * @pris_array()$specification_nameoperif(t{
 *     y integer|null $deleted_at
 *
 * @property Brand $brand
 * @property Cart[] $carts
 * @property Category $category
 * @property Favorite[] $favorites
 * @property MetaTag[] $metaTags
 * @property OrderDetail[] $orderDetails
 * @property ProductImage[] $productImages
 * @property Review[] $reviews
 */
class Product extends \yii\db\ActiveRecord
{
    const PRODUCT_INACTIVE = 0;
    const PRODUCT_ACTIVE = 1;
    const PRODUCT_DELETED = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['desc_list', 'description'], 'string'],
            [['category_id', 'brand_id', 'status', 'price', 'new_price'], 'integer'],
            [['specification', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['title', 'SKU'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['SKU'], 'unique'],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::class, 'targetAttribute' => ['brand_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'desc_list' => 'Desc List',
            'description' => 'Description',
            'category_id' => 'Category ID',
            'brand_id' => 'Brand ID',
            'SKU' => 'SKU',
            'specification' => 'Specification',
            'status' => 'Status',
            'price' => 'Price',
            'new_price' => 'New Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Favorites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavorites()
    {
        return $this->hasMany(Favorite::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[MetaTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMetaTags()
    {
        return $this->hasMany(MetaTag::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[OrderDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['product_id' => 'id']);
    }

    /**
     *  Get status label
     * @return array
     */
    public static function getProductStatusLabels(): array
    {
        return [
            self::PRODUCT_ACTIVE => 'ACTIVE',
            self::PRODUCT_INACTIVE => 'INACTIVE',
            self::PRODUCT_DELETED => 'DELETED',
        ];
    }

    public static function find()
    {
        return (new ProductQuery(get_called_class()));
    }


    /**
     *
     *  Get specification_name with value, like key value.
     * @param mixed $specification_name
     * @return array
     */
    public function loadSpecificationName(mixed $specification_name)
    {
        $data = [];
        if(is_array($specification_name)){
             $data  = array_filter($specification_name,function ($arr){
                 return ($arr['value'] != null);
             });
        }
        return $data;
    }

    /**
     * Get status label
     * @param mixed $status
     * @return string
     */
    public function showStatus(mixed $status):string
    {
        if($status === self::PRODUCT_ACTIVE){
            return "<span class='badge bg-success'>ACTIVE</span>";
        }elseif($status === self::PRODUCT_INACTIVE){
            return "<span class='badge bg-warning'>IN_ACTIVE</span>";
        }elseif ($status === self::PRODUCT_DELETED){
            return "<span class='badge bg-danger'>DELETED</span>";
        }else{
            return '';
        }
    }

}
