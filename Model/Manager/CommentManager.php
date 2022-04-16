<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\Article;
use App\Model\Entity\Comment;

class CommentManager
{
    public const TABLE = 'comments';

    /**
     * @return array
     */
    public static function getAll(): array
    {
        $comments = [];
        $request = DB::getPDO()->query("SELECT * FROM " . self::TABLE);

        if ($request) {
            foreach ($request->fetchAll() as $data) {
                $comments[] = self::makeComment($data);
            }
        }
        return $comments;
    }

    /**
     * @param array $data
     * @return Comment
     */
    private static function makeComment(array $data): Comment
    {
        return (new Comment())
            ->setId($data['id'])
            ->setContent($data['content'])
            ->setAuthor(UserManager::getUser($data['user_fk']))
            ->setArticle(ArticleManager::getArticle($data['article_fk']))
            ;
    }

    /**
     * @param string $content
     * @param int $user_fk
     * @param int $article_fk
     * @return void
     */
    public static function addComment(string $content, int $user_fk, int $article_fk): void
    {
        $stmt = DB::getPDO()->prepare("
            INSERT INTO " . self::TABLE . " (content, user_fk, article_fk) VALUES (:content, :author, :article)
        ");

        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':author', $user_fk);
        $stmt->bindParam(':article', $article_fk);

        $stmt->execute();
    }

    /**
     * @param int $id
     * @return int|mixed
     */
    public static function commentExist(int $id)
    {
        $result = DB::getPDO()->query("SELECT count(*) as cnt FROM " . self::TABLE);
        return $result ? $result->fetch()['cnt'] : 0;
    }

    public static function deleteComment(int $id): bool
    {
        $query = DB::getPDO()->exec("DELETE FROM " . self::TABLE . " WHERE id = $id");
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }

    public static function getCommentByArticle(Article $article): array
    {
        $comments = [];
        $query = DB::getPDO()->query("
            SELECT *FROM " . self::TABLE . " WHERE article_fk = " . $article->getId() ." ORDER BY id DESC
        ");

        if ($query) {
            foreach ($query->fetchAll() as $commentData) {
                $comments[] = (new Comment())
                    ->setId($commentData['id'])
                    ->setContent($commentData['content'])
                    ->setAuthor(UserManager::getUser($commentData['user_fk']))
                    ->setArticle(ArticleManager::getArticle($commentData['article_fk']))
                    ;
            }
        }
        return $comments;
    }
}
