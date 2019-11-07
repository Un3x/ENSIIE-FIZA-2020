<?php


namespace Model;


class PostHydrator
{

    function hydrate (array $data, \Model\PostEntity $post)
    {
        return $post
            ->setId($data['id'])
            ->setPseudo($data['pseudo'])
            ->setImgUrl($data['img_url'])
            ->setCreatedAt(new \Datetime($data['created_at']))
            ->setLikes($data['likes'])
            ->setLiked($data['liked']);
    }

}