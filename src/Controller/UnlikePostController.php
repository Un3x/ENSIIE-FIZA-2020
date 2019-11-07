<?php
namespace Controller;

Class UnlikePostController {

    /**
     * @var \Model\LikeRepository
     */
    private $likeRepository;

    /**
     * @var \Service\AuthService
     */
    private $authService;

    /**
     * LikePostController constructor.
     * @param \Model\LikeRepository $likeRepository
     * @param \Service\AuthService $authService
     */
    public function __construct (
        \Model\LikeRepository $likeRepository,
        \Service\AuthService $authService
    ) {
        $this->likeRepository = $likeRepository;
        $this->authService = $authService;
    }


    function execute () {
        $user = $this->authService->getCurrentUser();
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
