<?php 
namespace App\Admin\Field;

use App\Entity\Emprunt;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\Livre;
use App\Entity\Reservation;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints\Type;

final class BookField implements FieldInterface
{
    use FieldTrait;

    public static function new(string $propertyName, ?string $label = null): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setFormType(EntityType::class)
            ->setFormTypeOptions([
                'class' => Livre::class,
                'choice_label' => 'titre',
                'multiple' => true,
                'attr' => ['size' => 5],
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->leftJoin(Emprunt::class, 'e', 'WITH', 'e.livre = l')
                        ->where('e.livre IS NULL')
                        ->leftJoin(Reservation::class, 'r', 'WITH', 'r.livre = l')
                        ->andWhere('r.livre IS NULL')
                        ->orderBy('l.titre', 'ASC');
                },
                'constraints' => [
                    new Type([
                        'type' => Livre::class,
                        'message' => 'Veuillez sélectionner un seul livre'
                    ])
                ]
            ])
            ->setTemplatePath('admin/fields/book.html.twig');
    }
}