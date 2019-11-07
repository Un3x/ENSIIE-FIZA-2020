<?php


namespace Model;


class UserHydrator
{

    public function hydrate(array $data, \Model\UserEntity $user)
    {
        return $user
            ->setId($data['id'])
            ->setEmail($data['email'])
            ->setPseudo($data['pseudo'])
            ->setCreatedAt($data['created_at'])
            ->setAuthentToken($data['authent_token'])
            ->setPassword($data['password']);
    }
}