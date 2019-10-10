<?php
namespace Controller;

Class CommentController {

    /**
     * @var \PDO
     */
    private $dbh;

    /**
     * @var \Model\CommentRepository
     */
    private $commentRepository;

    /**
     * CommentController constructor.
     * @param \PDO $dbh
     */
    public function __construct (\PDO $dbh)
    {
        $this->dbh = $dbh;
        $this->commentRepository = new \Model\CommentRepository($dbh);
    }


    function execute () {
        $postId = $_GET['postId'];

        $data = $postId ? $this->commentRepository->fetchCommentForPost($postId) : [];

        include_once '../src/view/layout.php';
        generateView('comment', $data);
    }
}


