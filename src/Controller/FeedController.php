<?php
namespace Controller;

Class FeedController
{
    /**
     * @var \Model\FeedRepository
     */
    private $feedRepository;

    /**
     * @var \Service\AuthService
     */
    private $authService;

    /**
     * CommentController constructor.
     * @param \PDO $dbh
     */
    public function __construct (\Model\FeedRepository $feedRepository, \Service\AuthService $authService)
    {
        $this->feedRepository = $feedRepository;
        $this->authService = $authService;
    }

    function execute ()
    {
        if ($this->authService->isAuthenticated()) {
            $user = $this->authService->getCurrentUser();
            $data = $this->feedRepository->getFeed($user->getId());
            return new \ViewModel('feed', $data);
        }
        header('Location: /');
    }
}