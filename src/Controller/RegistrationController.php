<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\RegistrationForm;
use App\Security\LoginAuthenticator;
use App\Service\MailerService;
use App\Service\TriPays;
use App\Service\TriRegion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

#[Route('/register')]
class RegistrationController extends AbstractController
{
    public function __construct(private TriPays $pays, private TriRegion $regions)
    {
        // Constructor can be used for dependency injection if needed
    }
    #[Route('/', name: 'registration')]
    public function index(UserRepository $userRepository,Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher,Security $security,MailerService $mailer)
    {
        $user = new User();
        $form = $this->createForm(RegistrationForm::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = $user->getEmail();

            $existingUser = $userRepository->findOneBy(['email' => $email]);
            if ($existingUser) {
                $this->addFlash('error', 'This email is already registered.');
                return $this->redirectToRoute('registration');
            }

            $plainPassword = $form->get('plainPassword')->getData();
            $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);

            $em->persist($user);
            $em->flush();
            $this->addFlash('success', $user->getUsername().' registered successfully!');
            $mailmessage = "
                <html>
        <body>
            <h2>Bonjour " . htmlspecialchars($user->getUsername()) . ",</h2>
            <p>Votre compte a bien été créé avec succès !</p>
            <p>Vous pouvez désormais vous connecter avec votre adresse email : <strong>" . htmlspecialchars($user->getEmail()) . "</strong></p>
            <p>Merci de votre confiance.</p>
            <br>
            <p>Cordialement,<br>L'équipe de RT2</p>
        </body>
    </html>
";
            $mailer->sendEmail(to: $user->getEmail(),content: $mailmessage,subject: 'Création de compte');
            return $security->login($user, LoginAuthenticator::class, 'main');



        }

        return $this->render('registration/index.html.twig', [
            'registrationForm' => $form->createView(),
            'pays'=>$this->pays->getPays(), 'regions'=>$this->regions->getPays(),
        ]);
    }
}
