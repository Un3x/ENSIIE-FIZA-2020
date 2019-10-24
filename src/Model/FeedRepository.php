<?php

namespace Model;

class FeedRepository {

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

    function getFeed($userId) {
        $query = <<<SQL
  SELECT 
    p.id as id,
    "user".pseudo as pseudo,
    p.img_url as img_url,
    p.content as content,
    p.created_at as created_at,
    (SELECT COUNT(id) from "like" as l where l.post_id = p.id) as likes,
    (CASE WHEN (SELECT id from "like" as l where l.user_id = $userId AND p.id = l.post_id) IS NOT NULL THEN TRUE ELSE FALSE END) as liked
  FROM "post" as p
  INNER JOIN "user" ON user_id = "user".id
SQL;

        return $this->dbh->query($query);
    }

}

