<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TbEnderecosRepository")
 */
class TbEnderecos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $cod_endereco;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $quadra_endereco;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $numero_endereco;

    private $observacao;

   


    public function getCodEnderecos(): ?int
    {
        return $this->cod_endereco;
    }

    public function getQuadraEnderecos(): ?string
    {
        return $this->quadra_endereco;
    }

    public function setQuadraEnderecos(string $quadra_endereco): self
    {
        $this->quadra_endereco = $quadra_endereco;

        return $this;
    }
    public function setNumeroEndrecos(): ?float
    {
        return $this->numero_endereco;
    }

    public function setNumeroEndrecos(float $numero_endereco): self
    {
        $this->numero_endereco = $numero_endereco;

        return $this;
    }
    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(string $observacao): self
    {
        $this->observacao = $observacao;

        return $this;
    }

  
}
