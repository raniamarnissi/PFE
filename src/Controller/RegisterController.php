<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{


    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;
   
   
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        
    }
    /**
     * @Route("/register", name="register")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $user=new User();
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user->setPassword(
                $this ->passwordEncoder->encodePassword($user, $form->get("password")->getData())
            );

           $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash("success", "Inscription réussie !");
        }

        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
            'form' => $form->createView()
        ]);
    }
}
