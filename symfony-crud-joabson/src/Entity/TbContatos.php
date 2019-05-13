<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


class TbContatos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="cpf", type="string", length=11, unique=true)
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=150)
     */

     private $email;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nome;
    
   /**
     * @ORM\Column(type="string", length=150)
     */
    
    private $telefone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }


    public function getTelefone(): ?float
    {
        return $this->telefone;
    }

    public function setTelefone(float $telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }
}
