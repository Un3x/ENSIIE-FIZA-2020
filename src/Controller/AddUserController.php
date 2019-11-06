<?php
namespace Controller;

Class addUserController {

    /**
     * @var \Model\UserRepository
     */
    private $userRepository;

    private $errors = [
        'email' => [],
        'pseudo' => [],
        'password' => [],
        'password_check' => []
    ];

    /**
     * CommentController constructor.
     * @param \PDO $dbh
     */
    public function __construct (\Model\UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function execute () {
        $inputs = $this->getInputs();
        if ($this->isValid($inputs)) {
            $inputs['password'] = password_hash($inputs['password'],  PASSWORD_BCRYPT);
            $this->userRepository->insert($inputs);
            header('Location: /feed');
        } else {
            $data = [
                'user' => [
                    'email' => $inputs['email'],
                    'pseudo' => $inputs['pseudo'],
                ],
                'error' => $this->errors
            ];
            include_once '../src/view/layout.php';
            generateView('subscribe', $data);
        }

    }

    private function getInputs()
    {
        return [
            'email' => isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : null,
            'pseudo' => isset($_POST['pseudo']) && !empty($_POST['pseudo']) ? $_POST['pseudo'] : null,
            'password' => isset($_POST['password']) && !empty($_POST['password']) ? $_POST['password'] : null,
            'password_check' => isset($_POST['password_check']) && !empty($_POST['password_check']) ? $_POST['password_check'] : null,
        ];
    }

    private function isValid($data): bool
    {
        $isValid = true;
        if (null === $data['email']) {
            $this->errors['email'][] = 'Email should not be empty';
            $isValid = false;
        }

        if (null === $data['pseudo']) {
            $this->errors['pseudo'][] = 'Pseudo should not be empty';
            $isValid = false;
        }

        if (null === $data['password']) {
            $this->errors['password'][] = 'Password should not be empty';
            $isValid = false;
        }

        if ($data['password'] !== $data['password_check']) {
            $this->errors['password_check'][] = 'Password should match';
            $isValid = false;
        }

        return $isValid;
    }
}
