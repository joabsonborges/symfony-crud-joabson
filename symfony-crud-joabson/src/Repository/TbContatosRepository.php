<?php

namespace App\Repository;

use App\Entity\TbContatos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TbContatos|null find($id, $lockMode = null, $lockVersion = null)
 * @method TbContatos|null findOneBy(array $criteria, array $orderBy = null)
 * @method TbContatos[]    findAll()
 * @method TbContatos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TbContatosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TbContatos::class);
    }

   
}
