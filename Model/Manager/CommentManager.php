<?php

namespace App\Model\Manager;

use App\Model\DB;
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
     * @param Comment $comment
     * @return bool
     */
    public static function addNewComment(Comment &$comment): bool
    {
        $stmt = DB::getPDO()->prepare("
            INSERT INTO " . self::TABLE . " (content, user_fk, article_fk) VALUES (:content, :author, :article)
        ");

        $stmt->bindValue(':content', $comment->getContent());
        $stmt->bindValue(':author', $comment->getAuthor()->getId());
        $stmt->bindValue(':author', $comment->getArticle()->getId());

        $result = $stmt->execute();
        $comment->setId(DB::getPDO()->lastInsertId());
        return $result;
    }

    /**
     * @param int $id
     * @return Comment|null
     */
    public static function getComment(int $id): ?Comment
    {
        $request = DB::getPDO()->query("SELECT * FROM " . self::TABLE . " WHERE id = $id");
        return $request ? self::makeComment($request->fetch()) : null;
    }
}
