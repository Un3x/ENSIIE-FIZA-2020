<?php
namespace Controller;

Class AddCommentController {

    /**
     * @var \Model\CommentRepository
     */
    private $commentRepository;

    /**
     * @var \Model\UserRepository
     */
    private $userRepository;

    /**
     * AddPostController constructor.
     * @param \Model\CommentRepository $commentRepository
     * @param \Model\UserRepository    $userRepository
     */
    public function __construct (
        \Model\CommentRepository $commentRepository,
        \Model\UserRepository $userRepository
    ) {
        $this->commentRepository = $commentRepository;
        $this->userRepository = $userRepository;
    }

    function execute () {
        $uniqid = $_SESSION['uniqid'];
        $user = $this->userRepository->findByAuthentToken($uniqid);
        $inputs = $this->getInputs();
        if ($this->isValid($inputs)) {
            $this->commentRepository->insert($inputs, $user['id']);
        }
        header('Location: /comment?postId=' . $inputs['postId']);
    }

    private function getInputs ()
    {
        return [
            'postId' => isset($_POST['post_id']) && !empty($_POST['post_id']) ? $_POST['post_id'] : null,
            'content' =>isset($_POST['content']) && !empty($_POST['content']) ? $_POST['content'] : null,
        ];
    }

    private function isValid (array $data)
    {
        $isValid = true;
        if (null === $data['postId']) {
            $isValid = false;
        }

        if (null === $data['content']) {
            $isValid = false;
        }

        return $isValid;
    }
}
