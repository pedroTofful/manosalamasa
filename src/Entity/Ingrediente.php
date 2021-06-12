<?php

namespace App\Entity;

use App\Repository\IngredienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredienteRepository::class)
 */
class Ingrediente
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
    private $ingredienteDsc;

    /**
     * @ORM\ManyToMany(targetEntity=Restriccion::class, mappedBy="ingrediente")
     */
    private $restriccions;

    /**
     * @ORM\OneToMany(targetEntity=RecetaIngrediente::class, mappedBy="ingrediente")
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

    public function getIngredienteDsc(): ?string
    {
        return $this->ingredienteDsc;
    }

    public function setIngredienteDsc(string $ingredienteDsc): self
    {
        $this->ingredienteDsc = $ingredienteDsc;

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
            $restriccion->addIngrediente($this);
        }

        return $this;
    }

    public function removeRestriccion(Restriccion $restriccion): self
    {
        if ($this->restriccions->removeElement($restriccion)) {
            $restriccion->removeIngrediente($this);
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
            $recetaIngrediente->setIngrediente($this);
        }

        return $this;
    }

    public function removeRecetaIngrediente(RecetaIngrediente $recetaIngrediente): self
    {
        if ($this->recetaIngredientes->removeElement($recetaIngrediente)) {
            // set the owning side to null (unless already changed)
            if ($recetaIngrediente->getIngrediente() === $this) {
                $recetaIngrediente->setIngrediente(null);
            }
        }

        return $this;
    }
}
