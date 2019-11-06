<?php

namespace Model;

class CommentRepository
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

    function fetchCommentForPost (
        int $postId
    ) {
        $query = <<<SQL
    SELECT
    u.pseudo as pseudo,
    c.content as content,
    c.created_at as created_at
    FROM "comment" as c 
    INNER JOIN "user" as u ON c.user_id = u.id
    where c.post_id = %s
SQL;

        return $this->dbh->query(
            sprintf(
                $query,
                $postId
            )
        );
    }

    public function insert (
        array $data,
        $userId
    ) {
        $stmt = $this->dbh->prepare('INSERT INTO "comment" (user_id, post_id, content) VALUES(:userId, :postId, :content)');
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':content', $data['content']);
        $stmt->bindParam(':postId', $data['postId']);
        $stmt->execute();
    }
}