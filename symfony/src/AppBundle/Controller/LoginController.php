<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LoginController extends Controller
{
    /**
     * @Route("admin/login")
     */
    public function LoginAction()
    {
        return $this->render('AppBundle:Login:login.html.twig', array(
            // ...
        ));
    }

}
