<?php

namespace App\Entity;

use App\Repository\RecetaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecetaRepository::class)
 */
class Receta
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
    private $recetaNombre;

    /**
     * @ORM\Column(type="blob")
     */
    private $recetaImg;

    /**
     * @ORM\ManyToMany(targetEntity=Restriccion::class, mappedBy="receta")
     */
    private $restriccions;

    /**
     * @ORM\OneToMany(targetEntity=RecetaIngrediente::class, mappedBy="receta")
     */
    private $recetaIngredientes;

    public function __construct()
    {
        $this->restriccions = new ArrayCollection();
        $this->recetaIngredientes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecetaNombre(): ?string
    {
        return $this->recetaNombre;
    }

    public function setRecetaNombre(string $recetaNombre): self
    {
        $this->recetaNombre = $recetaNombre;

        return $this;
    }

    public function getRecetaImg()
    {
        return $this->recetaImg;
    }

    public function setRecetaImg($recetaImg): self
    {
        $this->recetaImg = $recetaImg;

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
            $restriccion->addRecetum($this);
        }

        return $this;
    }

    public function removeRestriccion(Restriccion $restriccion): self
    {
        if ($this->restriccions->removeElement($restriccion)) {
            $restriccion->removeRecetum($this);
        }

        return $this;
    }

    /**
     * @return Collection|RecetaIngrediente[]
     */
    public function getRecetaIngredientes(): Collection
    {
        return $this->recetaIngredientes;
    }

    public function addRecetaIngrediente(RecetaIngrediente $recetaIngrediente): self
    {
        if (!$this->recetaIngredientes->contains($recetaIngrediente)) {
            $this->recetaIngredientes[] = $recetaIngrediente;
            $recetaIngrediente->setReceta($this);
        }

        return $this;
    }

    public function removeRecetaIngrediente(RecetaIngrediente $recetaIngrediente): self
    {
        if ($this->recetaIngredientes->removeElement($recetaIngrediente)) {
            // set the owning side to null (unless already changed)
            if ($recetaIngrediente->getReceta() === $this) {
                $recetaIngrediente->setReceta(null);
            }
        }

        return $this;
    }
}
