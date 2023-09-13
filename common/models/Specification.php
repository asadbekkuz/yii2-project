<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "specification".
 *
 * @property int $id
 * @property int $category_id
 * @property int $specification_label_id
 * @property string $specification_name
 *
 * @property Category $category
 * @property SpecificationLabel $specificationLabel
 */
class Specification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'specification';
    }

    /**
     *
     * Get specification names like [ ['id','specification_name'],... ]
     */
    public static function getSpecificationNames(mixed $category_id)
    {
        $sql = "select id,specification_name from specification where category_id = :category_id";
        $params = [
            ':category_id' => $category_id
        ];
        return Specification::findBySql($sql,$params)->all();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'specification_label_id', 'specification_name'], 'required'],
            [['category_id', 'specification_label_id'], 'integer'],
            [['specification_name'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['specification_label_id'], 'exist', 'skipOnError' => true, 'targetClass' => SpecificationLabel::class, 'targetAttribute' => ['specification_label_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category Name',
            'specification_label_id' => 'Specification Label',
            'specification_name' => 'Specification Name',
        ];
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
     * Gets query for [[SpecificationLabel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpecificationLabel()
    {
        return $this->hasOne(SpecificationLabel::class, ['id' => 'specification_label_id']);
    }
}
