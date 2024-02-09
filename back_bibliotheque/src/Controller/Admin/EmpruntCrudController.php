<?php

namespace App\Controller\Admin;

use App\Entity\Emprunt;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Admin\Field\BookField;
use App\Admin\Field\UserField;
use Doctrine\Common\Collections\ArrayCollection;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use App\Entity\Reservation;

class EmpruntCrudController extends AbstractCrudController
{
    private $requestStack;
    private $entityManager;

    public function __construct(RequestStack $requestStack, EntityManagerInterface $entityManager)
    {
        $this->requestStack = $requestStack;
        $this->entityManager = $entityManager;
    }

    public static function getEntityFqcn(): string
    {
        return Emprunt::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // FormField::addTab('Working'),
            AssociationField::new('adherent')->setFormTypeOptions([
                'query_builder' => function ($er) {
                    return $er->createQueryBuilder('a')
                        ->leftJoin(Emprunt::class, 'e', 'WITH', 'e.adherent = a')
                        ->groupBy('a.id')
                        ->having('COUNT(e.id) < 5');
                }
            ]),
            AssociationField::new('livre')->setFormTypeOptions([
                'query_builder' => function ($er) {
                    return $er->createQueryBuilder('l')
                        ->leftJoin(Emprunt::class, 'e', 'WITH', 'e.livre = l')
                        ->where('e.livre IS NULL')
                        ->leftJoin(Reservation::class, 'r', 'WITH', 'r.livre = l')
                        ->andWhere('r.livre IS NULL')
                        ->orderBy('l.titre', 'ASC');
                }
            ]),
            DateField::new('date_emprunt')->setFormTypeOptions([
                'data' => new \DateTime('now'),
                'widget' => 'single_text',
                'attr' => [
                    'min' => (new \DateTime('now'))->format('Y-m-d'),
                ],
            ]),
            DateField::new('date_retour')->setFormTypeOptions([
                'widget' => 'single_text',
                'attr' => [
                    'min' => (new \DateTime('+1 day'))->format('Y-m-d'),
                    'max' => (new \DateTime('+1 week'))->format('Y-m-d'),
                ],
            ]),

            // FormField::addTab('En cours'),

            // AssociationField::new('adherent')->setFormTypeOptions([
            //     'query_builder' => function ($er) {
            //         return $er->createQueryBuilder('a')
            //             ->leftJoin(Emprunt::class, 'e', 'WITH', 'e.adherent = a')
            //             ->groupBy('a.id')
            //             ->having('COUNT(e.id) < 5');
            //     }
            // ]),
            // BookField::new('livre'),
            // DateField::new('date_retour'),
            // DateField::new('date_emprunt')
                
        ];
    }

    // public function createEntity(string $entityFqcn){
    //     $entity = new Emprunt();

    //     $request = $this->requestStack->getCurrentRequest()->request->all('Emprunt');

    //     //dump($request);

    //     if((isset($request)&&(isset($request['adherent']))&&(isset($request['livre'])))){
    //         //récupérer le 1er livre de la requete
    //         $firstBook = $request['livre'][0];
    //         $dateEpt = new \DateTime($request['date_emprunt']);
    //         $dateRet = new \DateTime($request['date_retour']);
    //         //si il y a un plus d un livre dans la requete
    //         if(count($request['livre']) > 1){
    //             //on crée un emprunt pour chaque livre en partant du 2eme livre
    //             for($i=1; $i<count($request['livre']); $i++){
    //                 $newEmprunt = new Emprunt();
    //                 $newEmprunt->setAdherent($this->entityManager->getRepository('App\Entity\Adherent')->find($request['adherent']));
    //                 $newEmprunt->setLivre($this->entityManager->getRepository('App\Entity\Livre')->find($request['livre'][$i]));
    //                 $newEmprunt->setDateEmprunt($dateEpt);
    //                 $newEmprunt->setDateRetour($dateRet);
    //                 $this->entityManager->persist($newEmprunt);
    //             }
    //             $this->entityManager->flush();
    //         } 



    //         $entity->setDateEmprunt($dateEpt);
    //         $entity->setDateRetour($dateRet);
    //         $entity->setAdherent($this->entityManager->getRepository('App\Entity\Adherent')->find($request['adherent']));
    //         $entity->setLivre($this->entityManager->getRepository('App\Entity\Livre')->find($firstBook));

    //         $this->entityManager->persist($entity);
    //         $this->entityManager->flush();

    //         //$entity->setLivre(new ArrayCollection([$this->entityManager->getRepository('App\Entity\Livre')->find($firstBook)]));

    //         return $entity;
    //     }
    // }


    /*
    public function createEntity(string $entityFqcn)
    {
        $emprunt = $this->requestStack->getCurrentRequest()->request;//->all('Emprunt');

        //dump($emprunt);
        if(isset($emprunt)){
            $livres = explode(',', $emprunt['livre']);
            $adherent = $emprunt['adherent'];

            $emprunts = [];
            foreach ($livres as $livre) {
                $livreObj = $this->entityManager->getRepository('App\Entity\Livre')->find($livre);
                $adherentObj = $this->entityManager->getRepository('App\Entity\Adherent')->find($adherent);

                $newEmprunt = new Emprunt();
                $newEmprunt->setAdherent($adherentObj);
                $newEmprunt->setLivre($livreObj);
                $newEmprunt->setDateEmprunt(new \DateTime());
                $newEmprunt->setDateRetour(new \DateTime('+1 week'));

                $emprunts[] = $newEmprunt;
            }
        }

        return $emprunts[0] ?? null;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $emprunt = $this->requestStack->getCurrentRequest()->request->all('Emprunt');

        if(isset($emprunt)){
            $livres = explode(',', $emprunt['livre']);
            $adherent = $emprunt['adherent'];

            foreach ($livres as $livre) {
                $livreObj = $this->entityManager->getRepository('App\Entity\Livre')->find($livre);
                $adherentObj = $this->entityManager->getRepository('App\Entity\Adherent')->find($adherent);

                $newEmprunt = new Emprunt();
                $newEmprunt->setAdherent($adherentObj);
                $newEmprunt->setLivre($livreObj);
                $newEmprunt->setDateEmprunt(new \DateTime());
                $newEmprunt->setDateRetour(new \DateTime('+1 week'));

                $entityManager->persist($newEmprunt);
                }
        }

        $entityManager->flush();
    }*/
}
