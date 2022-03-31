<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\Article;
use App\Model\Entity\Comment;
use DateTime;

class ArticleManager
{
    public const TABLE = 'article';

    /**
     * @return array
     */
    public static function getAll(): array
    {
        $articles = [];
        $request = DB::getPDO()->query("SELECT * FROM " . self::TABLE);

        if ($request) {
            foreach ($request->fetchAll() as $data) {
                $articles[] = self::makeArticle($data);
            }
        }
        return $articles;
    }

    /**
     * @param array $data
     * @return Article
     */
    private static function makeArticle(array $data): Article
    {
        return (new Article())
            ->setId($data['id'])
            ->setTitle($data['title'])
            ->setContent($data['content'])
            ->setAuthor(UserManager::getUser($data['user_fk']))
            ;
    }

    /**
     * @param Article $article
     * @return bool
     */
    public static function addNewArticle(Article &$article): bool
    {
        $stmt = DB::getPDO()->prepare("
            INSERT INTO " . self::TABLE . " (title, content, user_fk) VALUES (:title, :content, :author)
        ");

        $stmt->bindValue(':title', $article->getTitle());
        $stmt->bindValue(':content', $article->getContent());
        $stmt->bindValue(':author', $article->getAuthor()->getId());

        $result = $stmt->execute();
        $article->setId(DB::getPDO()->lastInsertId());
        return $result;
    }

    /**
     * @param int $id
     * @return Article|null
     */
    public static function getArticle(int $id): ?Article
    {
        $request = DB::getPDO()->query("SELECT * FROM " . self::TABLE . " WHERE id = $id");
        return $request ? self::makeArticle($request->fetch()) : null;
    }
}
