<?php


namespace App\Controller;


use App\Entity\Color;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="user_register")
     */
    public function register(UserPasswordEncoderInterface $passwordEncoder,
        Request $request)
    {
        $user = new User();
        $colors = new Color();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $password = $passwordEncoder->encodePassword(
                $user,
                $user->getPlainPassword()
            );
            $user->setPassword($password);
            $user->setColor($colors->list[rand(0, count($colors->list)-1)]);

            $entityManager = $this->getDoctrine()->getManager();
            $user->setRoles([User::ROLE_USER]);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('micro_post_index');
        }

        return $this->render('register/register.html.twig',
            [
                'form' => $form->createView()
            ]);
    }
}