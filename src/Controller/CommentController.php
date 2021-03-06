<?php
namespace Controller;

Class CommentController {

    /**
     * @var \Model\CommentRepository
     */
    private $commentRepository;

    /**
     * CommentController constructor.
     */
    public function __construct (\Model\CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }


    function execute () {
        $postId = $_GET['postId'];

        $data = [
            'postId' => $postId,
            'comments' => $postId ? $this->commentRepository->fetchCommentForPost($postId) : []
        ];

        return new \ViewModel('comment', $data);
    }
}


