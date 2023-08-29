<?php

namespace common\models\query;

use common\models\Product;

class ProductQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere(['status' => Product::PRODUCT_ACTIVE]);
    }
}