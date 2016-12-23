<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * ArticleSearch represents the model behind the search form about `app\models\Article`.
 */
class ProjectSearch extends  ClArticle
{


    /**
     * ��Ŀģ��汾�б��������
     *
     * @param $arr
     * @param $query
     * @param string $type
     * @return mixed
     */

    public function searchAll($arr,$query,$type = 'plist')
    {
        if($type == 'article_list') $query = $this->_searchArticle($arr,$query);
        return $query;
    }


    private function _searchArticle($arr,$query)
    {
        if(!empty($arr['title']))  $query->andFilterWhere(['like', 'title', $arr['title']]);
        return $query;
    }









}
