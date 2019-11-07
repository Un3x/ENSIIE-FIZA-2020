<?php


namespace Model;


class CommentEntity
{
    private $id;
    private $content;
    private $createdAt;
    private $pseudo;

    /**
     * @return mixed
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return CommentEntity
     */
    public function setId ($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent ()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return CommentEntity
     */
    public function setContent ($content)
    {
        $this->content = $content;
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
     * @return CommentEntity
     */
    public function setCreatedAt ($createdAt)
    {
        $this->createdAt = $createdAt;
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
     * @return CommentEntity
     */
    public function setPseudo ($pseudo)
    {
        $this->pseudo = $pseudo;
        return $this;
    }
}