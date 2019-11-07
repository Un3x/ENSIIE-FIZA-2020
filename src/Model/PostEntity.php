<?php


namespace Model;


class PostEntity
{
    private $id;
    private $pseudo;
    private $content;
    private $createdAt;
    private $imgUrl;
    private $likes;
    private $liked;

    /**
     * @return mixed
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return PostEntity
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
     * @param mixed pseudo
     * @return PostEntity
     */
    public function setPseudo ($pseudo)
    {
        $this->pseudo = $pseudo;
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
     * @return PostEntity
     */
    public function setContent ($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt ()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return PostEntity
     */
    public function setCreatedAt ($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImgUrl ()
    {
        return $this->imgUrl;
    }

    /**
     * @param mixed $imgUrl
     * @return PostEntity
     */
    public function setImgUrl ($imgUrl)
    {
        $this->imgUrl = $imgUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLikes ()
    {
        return $this->likes;
    }

    /**
     * @param mixed $likes
     * @return PostEntity
     */
    public function setLikes ($likes)
    {
        $this->likes = $likes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLiked ()
    {
        return $this->liked;
    }

    /**
     * @param mixed $liked
     * @return PostEntity
     */
    public function setLiked ($liked)
    {
        $this->liked = $liked;
        return $this;
    }
}