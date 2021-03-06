<?php
namespace Controller;

Class AddPostController {

    /**
     * @var \Model\FeedRepository
     */
    private $feedRepository;

    /**
     * @var \Service\AuthService
     */
    private $authService;

    /**
     * AddPostController constructor.
     * @param \Model\FeedRepository $feedRepository
     * @param \Service\AuthService $authService
     */
    public function __construct (
        \Model\FeedRepository $feedRepository,
        \Service\AuthService $authService
    ) {
        $this->feedRepository = $feedRepository;
        $this->authService = $authService;
    }


    function execute () {
        $user = $this->authService->getCurrentUser();
        $inputs = $this->getInputs();
        if ($this->isValid($inputs)) {
            $this->feedRepository->insert($inputs, $user->getId());
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
