<?php

namespace common\models\query;

use common\models\Category;

class CategoryQuery extends \yii\db\ActiveQuery
{
    /**
     *  Get active category
     *
     * @return CategoryQuery
     */
    public function active()
    {
        return $this->andWhere(['status' => Category::CATEGORY_ACTIVE]);
    }
}