<?php

namespace Model;

class LikeRepository
{

    /**
     * @var \PDO
     */
    private $dbh;

    /**
     * CommentController constructor.
     * @param \PDO $dbh
     */
    public function __construct (\PDO $dbh)
    {
        $this->dbh = $dbh;
    }

    public function insert (
        array $data,
        $userId
    ) {
        $stmt = $this->dbh->prepare('INSERT INTO "like" (user_id, post_id) VALUES(:userId, :postId)');
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':postId', $data['postId']);
        $stmt->execute();
    }

    public function delete(
        array $data,
        $userId
    ) {
        $stmt = $this->dbh->prepare('DELETE FROM "like" where user_id = :userId AND post_id = :postId');
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':postId', $data['postId']);
        $stmt->execute();
    }
}