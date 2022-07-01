<?php

/**
 * This is the model class for table "authors".
 *
 * The followings are the available columns in table 'authors':
 * @property string $id
 * @property string $author
 */
class Authors extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName(): string
    {
        return 'authors';
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
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * получаем Id автора
     * @param string $name
     * @return int
     */
    public function getAuthorId(string $name): int
    {
        $id = Authors::model()->getIdAuthorByName($name);
        if (null === $id) {
            return Authors::model()->createNewAuthors($name);
        } else {
            return $id;
        }
    }

    /**
     * получаем автора по Id
     * @param string $id
     * @return string|null
     */
    public function getAuthorById(string $id): ?string
    {
        $name = Authors::model()->find('id = :id', [':id' => $id]);
        if (empty($name)){
            return null;
        }
        return $name->getAuthor();
    }


    /**
     * создаем нового автора
     * @param $name
     * @return int
     */
    public function createNewAuthors($name): int
    {
        $newAuthor = new Authors();
        $newAuthor->author = $name;
        $newAuthor->save();
        $id = Authors::model()->find('author = :author', [':author' => $name]);
        return $id->getId();
    }

    /**
     * получаем автора по имени
     * @param string $name
     * @return string|null
     */
    public function getIdAuthorByName(string $name): ?string
    {
        $nameNew = Authors::model()->find('author = :author', [':author' => $name]);

        return $nameNew?->getId();
    }


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Authors the static model class
     */
    public static function model($className = __CLASS__): Authors
    {
        return parent::model($className);
    }
}
