<?php
namespace Controller;

Class LogoutController {
    function execute () {
        session_destroy();
        header('Location: /index');
    }
}
