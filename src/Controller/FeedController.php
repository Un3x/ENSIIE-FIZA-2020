<?php
namespace Controller;

Class FeedController
{
    /**
     * @var \Model\FeedRepository
     */
    private $feedRepository;

    /**
     * @var \Model\UserRepository
     */
    private $userRepository;

    /**
     * CommentController constructor.
     * @param \PDO $dbh
     */
    public function __construct (\Model\FeedRepository $feedRepository, \Model\UserRepository $userRepository)
    {
        $this->feedRepository = $feedRepository;
        $this->userRepository = $userRepository;
    }

    function execute ()
    {
        $uniqid = $_SESSION['uniqid'];
        if (!$uniqid) {
            header('Location: /');
        } else {
            $user = $this->userRepository->findByAuthentToken($uniqid);
            $data = $this->feedRepository->getFeed($user['id']);
            include_once '../src/view/layout.php';
            generateView(
                'feed',
                $data
            );
        }
    }
}