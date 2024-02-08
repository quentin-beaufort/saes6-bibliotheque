<?php

namespace App\Repository;

use App\Entity\Livre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Livre>
 *
 * @method Livre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livre[]    findAll()
 * @method Livre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livre::class);
    }

    public function findAllAsArray()
    {
        return $this->createQueryBuilder('l')
            ->select('l.id', 'l.titre', 'l.dateSortie', 'l.langue', 'l.photoCouverture')
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }

    public function searchByComplex($searchwords, $category, $author, $language, $minYear, $maxYear)
    {
        $query = $this->createQueryBuilder('l');

        if ($searchwords) {
            $query->andWhere('l.titre LIKE :searchwords')
                ->setParameter('searchwords', '%' . $searchwords . '%');
        }

        if ($category) {
            $query->innerJoin('l.categories', 'c')
                ->andWhere('c.nom = :category')
                ->setParameter('category', $category);
        }

        if ($author) {
            $query->innerJoin('l.auteurs', 'a')
                ->andWhere('a.nom = :author')
                ->setParameter('author', $author);
        }

        if ($language) {
            $query->andWhere('l.langue = :language')
                ->setParameter('language', $language);
        }

        if ($minYear) {
            //Reformatage de l'écriture de la date pour la requête
            $minYear = $minYear . '-01-01';
            $query->andWhere('l.dateSortie >= :minYear')
                ->setParameter('minYear', $minYear);
        }

        if ($maxYear) {
            //Reformatage de l'écriture de la date pour la requête
            $maxYear = $maxYear . '-12-31';
            $query->andWhere('l.dateSortie <= :maxYear')
                ->setParameter('maxYear', $maxYear);
        }

        return $query->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }

//    /**
//     * @return Livre[] Returns an array of Livre objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Livre
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
