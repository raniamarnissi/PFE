<?php


namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
/**
 * @Route("/", name="home")
 * @Route("/", name="login")
 */
    public function home(){
      /*  $em= $this->getDoctrine()->getManager();
        $user= new User();
        $user->setUsername("rania");
        $user->setTel(28385646);
        $user->setPassword('admin123');
        $user->setEmail('marnissirania151@gmail.com');
        $em->persist($user);
        $em->flush();*/

return $this->render('index.html.twig');

    }


 /**
     * @Route("/login" , name="login")
     * @return Response
     */

    public function login(): Response{
      return $this->render('login.html.twig');
  }
  
    
    
}