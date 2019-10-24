<?php
namespace Controller;

Class ConnectController {

    /**
     * @var \Model\UserRepository
     */
    private $userRepository;

    private $errors = [
        'pseudo' => [],
        'password' => [],
    ];

    /**
     * CommentController constructor.
     */
    public function __construct (\Model\UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

    }

    function execute () {
        $inputs = $this->getInputs();
        $data = [
            'user' => [
                'pseudo' => $inputs['pseudo'],
            ],
        ];
        if ($this->isValid($inputs)) {
            $user = $this->userRepository->findByPseudo($inputs['pseudo']);
            if (!$user) {
                $this->errors['authentication'][] = 'The couple password/login does not match';
                $data['errors'] = $this->errors;
                include_once '../src/view/layout.php';
                generateView('index', $data);
            } else {
                $isPasswordValid = $inputs['password'] === $user['password'];
                if (!$isPasswordValid) {
                    $this->errors['authentication'][] = 'The couple password/login does not match';
                    $data['errors'] = $this->errors;
                    include_once '../src/view/layout.php';
                    generateView('index', $data);
                } else {
                    $_SESSION['uniqid'] = uniqid();
                    $this->userRepository->updateAuthentToken($_SESSION['uniqid'], $user['id']);
                    header('Location: /feed');
                }
            }
        } else {
            $data['errors'] = $this->errors;
            include_once '../src/view/layout.php';
            generateView('index', $data);
        }

    }

    private function getInputs()
    {
        return [
            'pseudo' => isset($_POST['pseudo']) && !empty($_POST['pseudo']) ? $_POST['pseudo'] : null,
            'password' => isset($_POST['password']) && !empty($_POST['password']) ? $_POST['password'] : null,
        ];
    }

    private function isValid($data): bool
    {
        $isValid = true;
        if (null === $data['pseudo']) {
            $this->errors['pseudo'][] = 'Pseudo should not be empty';
            $isValid = false;
        }

        if (null === $data['password']) {
            $this->errors['password'][] = 'Password should not be empty';
            $isValid = false;
        }

        return $isValid;
    }
}
