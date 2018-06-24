<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{
    /**
     * @Route("admin/login", name="login")
     */
    public function LoginAction(Request $request, AuthenticationUtils $authenticationUtils)
    {

    	$error = $authenticationUtils->getLastAuthenticationError();

	    // last username entered by the user
	    $lastUsername = $authenticationUtils->getLastUsername();

    
        return $this->render('admin/login/login.html.twig', array(
            'last_username' => $lastUsername,
        	'error'         => $error,
        ));
    }

    /**
     * @Route("admin/logout", name="logout")
     */
    public function LogoutAction(){

    }

}
