<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ClArticle]].
 *
 * @see ClArticle
 */
class ClArticleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ClArticle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ClArticle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}