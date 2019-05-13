<?php

namespace App\Repository;

use App\Entity\TbEnderecos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TbEnderecos|null find($id, $lockMode = null, $lockVersion = null)
 * @method TbEnderecos|null findOneBy(array $criteria, array $orderBy = null)
 * @method TbEnderecos[]    findAll()
 * @method TbEnderecos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TbEnderecosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TbEnderecos::class);
    }

   
}
