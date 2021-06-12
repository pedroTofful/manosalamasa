<?php

namespace App\Entity;

use App\Repository\RecetaIngredienteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecetaIngredienteRepository::class)
 */
class RecetaIngrediente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Receta::class, inversedBy="recetaIngredientes")
     */
    private $receta;

    /**
     * @ORM\ManyToOne(targetEntity=Ingrediente::class, inversedBy="recetaIngredientes")
     */
    private $ingrediente;

    /**
     * @ORM\Column(type="integer")
     */
    private $recetaIngredienteCant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $recetaIngredienteUnm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReceta(): ?Receta
    {
        return $this->receta;
    }

    public function setReceta(?Receta $receta): self
    {
        $this->receta = $receta;

        return $this;
    }

    public function getIngrediente(): ?Ingrediente
    {
        return $this->ingrediente;
    }

    public function setIngrediente(?Ingrediente $ingrediente): self
    {
        $this->ingrediente = $ingrediente;

        return $this;
    }

    public function getRecetaIngredienteCant(): ?int
    {
        return $this->recetaIngredienteCant;
    }

    public function setRecetaIngredienteCant(int $recetaIngredienteCant): self
    {
        $this->recetaIngredienteCant = $recetaIngredienteCant;

        return $this;
    }

    public function getRecetaIngredienteUnm(): ?string
    {
        return $this->recetaIngredienteUnm;
    }

    public function setRecetaIngredienteUnm(string $recetaIngredienteUnm): self
    {
        $this->recetaIngredienteUnm = $recetaIngredienteUnm;

        return $this;
    }
}
