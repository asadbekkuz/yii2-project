<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "specification_label".
 *
 * @property int $id
 * @property string $name
 *
 * @property Specification[] $specifications
 */
class SpecificationLabel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'specification_label';
    }

    public static function getSpecificationNames($category_id)
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 150],
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
        ];
    }

    /**
     * Gets query for [[Specifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpecifications()
    {
        return $this->hasMany(Specification::class, ['specification_label_id' => 'id']);
    }
}
