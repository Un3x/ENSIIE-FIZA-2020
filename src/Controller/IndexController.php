<?php
namespace Controller;

Class IndexController {

    /**
     * @var \PDO
     */
    private $dbh;

    /**
     * CommentController constructor.
     * @param \PDO $dbh
     */
    public function __construct (\PDO $dbh)
    {
        $this->dbh = $dbh;
    }

    function execute ()
    {
        include_once '../src/view/layout.php';
        generateView('index');
    }
}