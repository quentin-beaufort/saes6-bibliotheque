<?php
namespace App\EventSubscriber;

use App\Entity\Emprunt;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityManagerInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    //private $slugger;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setFirstBook'],
        ];
    }

    public function setFirstBook(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Emprunt)) {
            return;
        }

        // dump("Je suis dans le subscriber");

        
        // $livreEnQuestion = $this->entityManager->getRepository('App\Entity\Livre')->find($entity->getLivre()->getId());

        // $entity->setLivre($livreEnQuestion);


        
        // $slug = $this->slugger->slugify($entity->getTitle());
        // $entity->setSlug($slug);
    }
}