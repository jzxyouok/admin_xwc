<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cl_article".
 *
 * @property string $id
 * @property string $category
 * @property string $class
 * @property string $tag
 * @property string $source
 * @property string $author
 * @property string $pub_time
 * @property string $url
 * @property string $thumb
 * @property string $focus
 * @property string $title
 * @property string $simple_title
 * @property string $description
 * @property string $content
 * @property string $create_time
 * @property string $update_time
 * @property integer $status
 */
class ClArticle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cl_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'class', 'create_time', 'update_time', 'status'], 'integer'],
            [['source', 'url', 'title', 'description', 'content'], 'required'],
            [['description', 'content'], 'string'],
            [['tag', 'pub_time', 'url', 'thumb', 'focus', 'title', 'simple_title'], 'string', 'max' => 255],
            [['source', 'author'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => '類別，0正體1簡體2英文',
            'class' => '類別',
            'tag' => '文章标签，多个标签用\",\"分隔',
            'source' => '來源，比如“蘋果日報”',
            'author' => '作者',
            'pub_time' => '新聞在源網頁的發佈時間',
            'url' => '文章外鏈',
            'thumb' => '縮略圖地址',
            'focus' => '焦點圖片',
            'title' => '標題',
            'simple_title' => '短標題',
            'description' => '描述',
            'content' => '文章內容',
            'create_time' => '添加時間',
            'update_time' => '更新時間',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return ClArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClArticleQuery(get_called_class());
    }

    public function beforeSave($insert){
        if(parent::beforeSave($insert)){
            if($this->scenario=='update'){
                $this->update_time=time();
            }else{
                $this->create_time = $this->update_time =  time();
                $this->author = "佚名";

            }
            return true;
        }else{
            return false;
        }
    }
}
