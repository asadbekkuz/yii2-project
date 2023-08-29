<?php

namespace common\models\query;

use common\models\Brand;
use yii\db\ActiveQuery;

class BrandQuery extends ActiveQuery
{
    /**
     *  Get active brand
     *
     * @return BrandQuery
     */
    public function active()
    {
        return $this->andWhere(['status' => Brand::BRAND_ACTIVE]);
    }
}