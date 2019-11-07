<?php


namespace Model;


class CommentHydrator
{

    public function hydrate(array $data, \Model\CommentEntity $comment)
    {
        return $comment
            ->setId($data['id'])
            ->setContent($data['content'])
            ->setPseudo($data['pseudo'])
            ->setCreatedAt(new \DateTime($data['created_at']));
    }

}