<?php


namespace Model;


class UserEntity
{

    private $id;
    private $pseudo;
    private $email;
    private $password;
    private $createdAt;
    private $authentToken;

    /**
     * @return mixed
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return UserEntity
     */
    public function setId ($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPseudo ()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     * @return UserEntity
     */
    public function setPseudo ($pseudo)
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail ()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return UserEntity
     */
    public function setEmail ($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword ()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return UserEntity
     */
    public function setPassword ($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt ()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return UserEntity
     */
    public function setCreatedAt ($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthentToken ()
    {
        return $this->authentToken;
    }

    /**
     * @param mixed $authentToken
     * @return UserEntity
     */
    public function setAuthentToken ($authentToken)
    {
        $this->authentToken = $authentToken;
        return $this;
    }
}