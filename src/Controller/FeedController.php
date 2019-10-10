<?php
namespace Controller;

Class FeedController
{
    /**
     * @var \PDO
     */
    private $dbh;

    /**
     * @var \Model\FeedRepository
     */
    private $feedRepository;

    /**
     * CommentController constructor.
     * @param \PDO $dbh
     */
    public function __construct (\PDO $dbh)
    {
        $this->dbh = $dbh;
        $this->feedRepository = new \Model\FeedRepository($dbh);
    }

    function execute ()
    {
        $data = $this->feedRepository->getFeed();
        include_once '../src/view/layout.php';
        generateView(
            'feed',
            $data
        );
    }
}