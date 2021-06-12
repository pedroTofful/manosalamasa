<?php

namespace App\Entity;

use App\Repository\PerfilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PerfilRepository::class)
 */
class Perfil
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $perfilNomApe;

    /**
     * @ORM\OneToOne(targetEntity=Usuario::class, mappedBy="perfil", cascade={"persist", "remove"})
     */
    private $usuario;

    /**
     * @ORM\ManyToMany(targetEntity=Restriccion::class, mappedBy="perfil")
     */
    private $restriccions;

    public function __construct()
    {
        $this->restriccions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPerfilNomApe(): ?string
    {
        return $this->perfilNomApe;
    }

    public function setPerfilNomApe(string $perfilNomApe): self
    {
        $this->perfilNomApe = $perfilNomApe;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        // unset the owning side of the relation if necessary
        if ($usuario === null && $this->usuario !== null) {
            $this->usuario->setPerfilId(null);
        }

        // set the owning side of the relation if necessary
        if ($usuario !== null && $usuario->getPerfilId() !== $this) {
            $usuario->setPerfilId($this);
        }

        $this->usuario = $usuario;

        return $this;
    }

    /**
     * @return Collection|Restriccion[]
     */
    public function getRestriccions(): Collection
    {
        return $this->restriccions;
    }

    public function addRestriccion(Restriccion $restriccion): self
    {
        if (!$this->restriccions->contains($restriccion)) {
            $this->restriccions[] = $restriccion;
            $restriccion->addPerfil($this);
        }

        return $this;
    }

    public function removeRestriccion(Restriccion $restriccion): self
    {
        if ($this->restriccions->removeElement($restriccion)) {
            $restriccion->removePerfil($this);
        }

        return $this;
    }
}
