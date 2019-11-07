<?php
namespace Controller;

Class AddCommentController {

    /**
     * @var \Model\CommentRepository
     */
    private $commentRepository;

    /**
     * @var \Service\AuthService
     */
    private $authService;

    /**
     * AddPostController constructor.
     * @param \Model\CommentRepository $commentRepository
     * @param \Service\AuthService    $authService
     */
    public function __construct (
        \Model\CommentRepository $commentRepository,
        \Service\AuthService $authService
    ) {
        $this->commentRepository = $commentRepository;
        $this->authService = $authService;
    }

    function execute () {
        $user = $this->authService->getCurrentUser();
        $inputs = $this->getInputs();
        if ($this->isValid($inputs)) {
            $this->commentRepository->insert($inputs, $user->getId());
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
