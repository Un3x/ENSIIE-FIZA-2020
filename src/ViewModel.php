<?php

class ViewModel {
    
    /**
     * @var string
     */
    private $viewPath;

    /**
     * @var array
     */
    private $data;

    /**
     * @var array
     */
    private $currentUser;

    public function __construct($viewPath, $data)
    {
        $this->viewPath = $viewPath;
        $this->data = $data;
    }

    public function setUser($user)
    {
        $this->currentUser = $user;
        return $this;
    }

    public function render()
    {
        ?>

        <html>
        
        <head>
          <title>IInstagrame</title>
          <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
          <link rel="stylesheet" href="style.css">
          <script src="https://kit.fontawesome.com/f32575f1ef.js" crossorigin="anonymous"></script>
        
        </head>
        
        <body>
          
          <?php 
          if ($this->shouldShowHeaders()) {
            include_once '../src/view/layout/header.php'; 
          }
          ?>
          <div class="pageContainer">
            <?php include_once '../src/view/'.$this->viewPath.'.php' ?>
          </div>
          <?php
          if ($this->shouldShowHeaders()) {
            include_once '../src/view/layout/footer.php';
          }
          ?>
        </html>
        <?php
    }
    
    private function shouldShowHeaders()
    {
        return $this->currentUser !== null;
    }



}