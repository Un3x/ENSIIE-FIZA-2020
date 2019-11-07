<?php

namespace Service;

class AuthService
{

    /**
     * @var \Model\UserRepository
     */
    private $userRepository;

    private $currentUser;

    public function __construct(\Model\UserRepository $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function isAuthenticated(): bool
    {
        return $this->getAuthToken() !== null;
    }

    public function getCurrentUser()
    {
        if ($this->isAuthenticated()) {
            if (!$this->currentUser) {
                $this->currentUser = $this->userRepository->findByAuthentToken($this->getAuthToken());
            }
            return $this->currentUser;
        }
        return null;
    }

    private function getAuthToken()
    {
        return $_SESSION['uniqid'] ?? null;
    }
    
}