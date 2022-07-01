<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property string $id
 * @property string $title
 * @property string $content
 * @property string $author_id
 * @property string $author
 */
class News extends CActiveRecord
{
    /**
     * @param string $id
     * @return \News|null
     */
    public function getArticle(string $id): ?News
    {
        $news = $this->findByPk($id);
        if (empty($news)) {
            return null;
        }
        $IdAuthor = $news->getAuthorId();
        if (null === Authors::model()->getAuthorById($IdAuthor)) {
            return null;
        }
        $news->setAuthor(Authors::model()->getAuthorById($IdAuthor));
        return $news;

    }

    /**
     * @param string $name
     * @return void
     */
    public function setAuthor(string $name): void
    {
        $this->author = $name;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getAuthorId(): string
    {
        return $this->author_id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'news';
    }


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return News the static model class
     */
    public static function model($className = __CLASS__): News
    {
        return parent::model($className);
    }
}
