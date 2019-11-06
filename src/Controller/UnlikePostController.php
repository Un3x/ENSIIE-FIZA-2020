<?php
namespace Controller;

Class UnlikePostController {

    /**
     * @var \Model\LikeRepository
     */
    private $likeRepository;

    /**
     * @var \Model\UserRepository
     */
    private $userRepository;

    /**
     * LikePostController constructor.
     * @param \Model\LikeRepository $likeRepository
     * @param \Model\UserRepository $userRepository
     */
    public function __construct (
        \Model\LikeRepository $likeRepository,
        \Model\UserRepository $userRepository
    ) {
        $this->likeRepository = $likeRepository;
        $this->userRepository = $userRepository;
    }


    function execute () {
        $uniqid = $_SESSION['uniqid'];
        $user = $this->userRepository->findByAuthentToken($uniqid);
        $inputs = $this->getInputs();
        if ($this->isValid($inputs)) {
            $this->likeRepository->delete($inputs, $user['id']);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }

    private function getInputs ()
    {
        $inputs = json_decode(file_get_contents('php://input'), true);
        return [
            'postId' => isset($inputs['postId']) && !empty($inputs['postId']) ? $inputs['postId'] : null,
        ];
    }

    private function isValid (array $data)
    {
        $isValid = true;
        if (null === $data['postId']) {
            $isValid = false;
        }

        return $isValid;
    }
}
