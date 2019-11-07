<?php

namespace Model;

class CommentRepository
{

    /**
     * @var \PDO
     */
    private $dbh;

    /**
     * @var CommentHydrator
     */
    private $commentHydrator;

    /**
     * CommentController constructor.
     * @param \PDO $dbh
     */
    public function __construct (\PDO $dbh, \Model\CommentHydrator $commentHydrator)
    {
        $this->dbh = $dbh;
        $this->commentHydrator = $commentHydrator;
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

        $rawComments =  $this->dbh->query(
            sprintf(
                $query,
                $postId
            )
        );

        $comments = [];
        foreach ($rawComments as $rawComment) {
            $comment = new \Model\CommentEntity();
            $comments[] = $this->commentHydrator->hydrate($rawComment, $comment);
        }
        return $comments;
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