<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use App\Entity\Etudiant;
use App\Entity\Intervenant;
use App\Entity\Matiere;
use App\Entity\Note;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\Date;


class AppFixtures extends Fixture
{
/*    protected $entityManager;
    protected $classeRepository;
    protected $intervenantRepository;
    protected $matiereRepository;
    protected $etudiantRepository;*/

    /**
     * @var \Doctrine\Persistence\ObjectRepository
     */

    private $passwordEncoder;


    public function __construct(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->entityManager = $entityManager;
        $this->classeRepository = $this->entityManager->getRepository(Classe::class);
        $this->intervenantRepository = $this->entityManager->getRepository(Intervenant::class);
        $this->matiereRepository = $this->entityManager->getRepository(Matiere::class);
        $this->etudiantRepository = $this->entityManager->getRepository(Etudiant::class);
    }

    public function load(ObjectManager $manager)
    {

     $faker = Faker\Factory::create();

     $intervenantId = $this->intervenantRepository->findAll();
     $matiereId = $this->matiereRepository->findAll();
     $etudiantId = $this->etudiantRepository->findAll();

        for($i = 1; $i <= 4; $i++){

            $classe = new Classe;
            $classe->setNom("A " . $i);
            $classe->setAnnee(2017 + $i);
            $manager->persist($classe);
        }

        $manager->flush();
        $classeId = $this->classeRepository->findAll();

        for($i = 1; $i <= 40; $i++){
            $etudiant = new Etudiant;
            $etudiant->setPrenom($faker->firstNameMale);
            $etudiant->setNom($faker->lastName);
            $etudiant->setAge(rand(18, 25));
            $etudiant->setAnn�e(2016);
            $etudiant->setPromotion($classeId[rand(0,3)]);
            $manager->persist($etudiant);
        }
        $manager->flush();

        for($i = 1; $i <= 4; $i++){

            $intervenant = new Intervenant;
            $intervenant->setPrenom($faker->firstNameMale);
            $intervenant->setNom($faker->lastName);
            $intervenant->setAnn�e(rand(25, 26));
            $manager->persist($intervenant);
        }
          $manager->flush();
                 $intervenantId = $this->intervenantRepository->findAll();


           for($i = 0; $i <= 3; $i++) {
                  $matiere = new Matiere;
                  $matiere->setCours("test");
                  $matiere->setDebut(new \DateTime());
                  $matiere->setFin($faker->dateTimeInInterval($matiere->getDebut(), '+5 days'));
                  $matiere->setClasse($classeId[$i]);
                  $matiere->setIntervenant($intervenantId[$i]);
                  $manager->persist($matiere);
              }

              $manager->flush();
              $etudiantId = $this->etudiantRepository->findAll();
              $matiereId = $this->matiereRepository->findAll();

            for($i = 0; $i <= 39; $i++){
                  $note = new Note;
                  $note->setNote(rand(0, 20));
                  $note->setEtudiants($etudiantId[$i]);
                  $note->setMatiere($matiereId[rand(0,3)]);
                  $manager->persist($note);
              }
        $manager->flush();

            $Admin = ['karine', 'Nicolas', 'Alexis'];
             for($i = 0; $i <= 2; $i++){
            $user = new User;
            $user->setEmail($Admin[$i]. '@gmail.com');
            $user->setPassword($this->passwordEncoder->encodePassword($user, 'password'));

            $manager->persist($user);
        }
        $manager->flush();
    }
}
