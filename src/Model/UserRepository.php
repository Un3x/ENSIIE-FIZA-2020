<?php

namespace Model;

class UserRepository
{

    /**
     * @var \PDO
     */
    private $dbh;

    /**
     * @var UserHydrator
     */
    private $userHydrator;

    /**
     * CommentController constructor.
     * @param \PDO $dbh
     */
    public function __construct (\PDO $dbh, \Model\UserHydrator $userHydrator)
    {
        $this->dbh = $dbh;
        $this->userHydrator = $userHydrator;
    }

    public function insert($data)
    {
        $stmt = $this->dbh->prepare('INSERT INTO "user" (email, pseudo, password) VALUES (:email, :pseudo, :password)');
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':pseudo', $data['pseudo']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->execute();

    }

    public function findByPseudo ($pseudo)
    {
        $stmt = $this->dbh->prepare('Select * from "user" where pseudo = :pseudo');
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();
        $rawUser = $stmt->fetch();
        if ($rawUser) {
            $user = new \Model\UserEntity();
            return $this->userHydrator->hydrate($rawUser, $user);
        }
        return null;
    }

    public function findByAuthentToken($authentToken)
    {
        $stmt = $this->dbh->prepare('Select * from "user" where authent_token = :authent_token');
        $stmt->bindParam(':authent_token', $authentToken);
        $stmt->execute();
        $rawUser = $stmt->fetch();
        if ($rawUser) {
            $user = new \Model\UserEntity();
            return $this->userHydrator->hydrate($rawUser, $user);
        }
        return null;
    }

    public function updateAuthentToken ($uniqid, $id)
    {
        $stmt = $this->dbh->prepare('UPDATE  "user" set authent_token = :uniqid where id = :id');
        $stmt->bindParam(':uniqid', $uniqid);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}