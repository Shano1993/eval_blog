<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\Article;
use DateTime;

class ArticleManager
{
    public const TABLE = 'article';
    public function getAll(): array
    {
        $articles = [];
        $request = DB::getPDO()->query("SELECT * FROM " . self::TABLE);
        if ($request) {
            $userManager = new UserManager();
            $format = 'Y-m-d H:i:s';

            foreach ($request->fetchAll() as $articleData) {
                $articles[] = (new Article())
                    ->setId($articleData['id'])
                    ->setTitle($articleData['title'])
                    ->setContent($articleData['content'])
                    ->setDateAdd(DateTime::createFromFormat($format, $articleData['date_add']))
                    ->setDateUpdate(DateTime::createFromFormat($format, $articleData['date_update']))
                    ->setAuthor(UserManager::getUser($articleData['user_fk']))
                    ;
            }
        }
        return $articles;
    }

    /**
     * @param Article $article
     * @return bool
     */
    public static function addNewArticle(Article &$article):bool
    {
        $stmt = DB::getPDO()->prepare("
            INSERT INTO " . self::TABLE . " (title, content, date_add, date_update, user_fk) VALUES (:title, :content, :date_add, :date_update, :user_fk)
        ");

        $stmt->bindValue(':title', $article->getTitle());
        $stmt->bindValue(':content', $article->getContent());
        $stmt->bindValue(':date_add', $article->getDateAdd());
        $stmt->bindValue(':date_update', $article->getDateUpdate());
        $stmt->bindValue(':user_fk', $article->getAuthor());

        $result = $stmt->execute();
        $article->setId(DB::getPDO()->lastInsertId());
        return $result;
    }
}
