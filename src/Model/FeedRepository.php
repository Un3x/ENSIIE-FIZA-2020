<?php

namespace Model;

class FeedRepository {

    /**
     * @var \PDO
     */
    private $dbh;

    /**
     * @var PostHydrator
     */
    private $postHydrator;

    /**
     * CommentController constructor.
     * @param \PDO $dbh
     */
    public function __construct (\PDO $dbh, \Model\PostHydrator $postHydrator)
    {
        $this->dbh = $dbh;
        $this->postHydrator = $postHydrator;
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
  ORDER BY created_at DESC
SQL;

        $rawFeed = $this->dbh->query($query);

        $feed = [];
        foreach ($rawFeed as $rawPost) {
            $feed[] = $this->postHydrator->hydrate($rawPost, new \Model\PostEntity());
        }
        return $feed;
    }

    public function insert (
        array $data,
        $userId
    ) {
        $stmt = $this->dbh->prepare('INSERT INTO "post" (user_id, content, img_url) VALUES(:userId, :content, :imgUrl)');
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':content', $data['content']);
        $stmt->bindParam(':imgUrl', $data['img_url']);
        $stmt->execute();
    }

}

