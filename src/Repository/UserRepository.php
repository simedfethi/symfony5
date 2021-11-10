<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAllGreaterThanPrice(int $id): array
    {
        $entityManager = $this->getEntityManager();
        $connection=$entityManager->getConnection();
        $statement=$connection->prepare('select * from user where id > :id');
        $statement->executeQuery(['id'=>10])->fetchAssociative();

        $query = $entityManager->createQuery(
            'SELECT u
            FROM App\Entity\User u
            WHERE u.id > :id
            ORDER BY u.id ASC'
        )->setParameter('id', $id);

        return $query->getResult();
    }
    public function sqlraw(int $id): array
    {
        $entityManager = $this->getEntityManager();
        $connection=$entityManager->getConnection();
        $statement=$connection->prepare('select * from user where id > :id');
        $res=$statement->executeQuery(['id'=>10])->fetchAllAssociative();


        return $res;
    }
    public function findAllGreater2(int $price, bool $includeUnavailableProducts = false): array
    {
        // automatically knows to select Products
        // the "p" is an alias you'll use in the rest of the query
        $qb = $this->createQueryBuilder('p')
            ->where('p.price > :price')
            ->setParameter('price', $price)
            ->orderBy('p.price', 'ASC');

        if (!$includeUnavailableProducts) {
            $qb->andWhere('p.available = TRUE');
        }

        $query = $qb->getQuery();

        return $query->execute();

        // to get just one result:
        // $product = $query->setMaxResults(1)->getOneOrNullResult();
    }

}
