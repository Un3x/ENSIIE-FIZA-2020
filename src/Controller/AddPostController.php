<?php
namespace Controller;

Class AddPostController {

    /**
     * @var \Model\FeedRepository
     */
    private $feedRepository;

    /**
     * @var \Model\UserRepository
     */
    private $userRepository;

    /**
     * AddPostController constructor.
     * @param \Model\FeedRepository $feedRepository
     * @param \Model\UserRepository $userRepository
     */
    public function __construct (
        \Model\FeedRepository $feedRepository,
        \Model\UserRepository $userRepository
    ) {
        $this->feedRepository = $feedRepository;
        $this->userRepository = $userRepository;
    }


    function execute () {
        $uniqid = $_SESSION['uniqid'];
        $user = $this->userRepository->findByAuthentToken($uniqid);
        $inputs = $this->getInputs();
        if ($this->isValid($inputs)) {
            $this->feedRepository->insert($inputs, $user['id']);
        }
        header('Location: /feed');
    }

    private function getInputs ()
    {
        return [
            'img_url' => isset($_POST['picture_url']) && !empty($_POST['picture_url']) ? $_POST['picture_url'] : null,
            'content' =>isset($_POST['content']) && !empty($_POST['content']) ? $_POST['content'] : null,
        ];
    }

    private function isValid (array $data)
    {
        $isValid = true;
        if (null === $data['img_url']) {
            $isValid = false;
        }

        if (null === $data['content']) {
            $isValid = false;
        }

        return $isValid;
    }
}
