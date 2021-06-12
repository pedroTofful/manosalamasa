<?php

namespace App\Entity;

use App\Repository\RestriccionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RestriccionRepository::class)
 */
class Restriccion
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
    private $restriccionDsc;

    /**
     * @ORM\ManyToMany(targetEntity=Perfil::class, inversedBy="restriccions")
     */
    private $perfil;

    /**
     * @ORM\ManyToMany(targetEntity=Receta::class, inversedBy="restriccions")
     */
    private $receta;

    /**
     * @ORM\ManyToMany(targetEntity=Ingrediente::class, inversedBy="restriccions")
     */
    private $ingrediente;

    public function __construct()
    {
        $this->perfil = new ArrayCollection();
        $this->receta = new ArrayCollection();
        $this->ingrediente = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRestriccionDsc(): ?string
    {
        return $this->restriccionDsc;
    }

    public function setRestriccionDsc(string $restriccionDsc): self
    {
        $this->restriccionDsc = $restriccionDsc;

        return $this;
    }

    /**
     * @return Collection|Perfil[]
     */
    public function getPerfil(): Collection
    {
        return $this->perfil;
    }

    public function addPerfil(Perfil $perfil): self
    {
        if (!$this->perfil->contains($perfil)) {
            $this->perfil[] = $perfil;
        }

        return $this;
    }

    public function removePerfil(Perfil $perfil): self
    {
        $this->perfil->removeElement($perfil);

        return $this;
    }

    /**
     * @return Collection|Receta[]
     */
    public function getReceta(): Collection
    {
        return $this->receta;
    }

    public function addRecetum(Receta $recetum): self
    {
        if (!$this->receta->contains($recetum)) {
            $this->receta[] = $recetum;
        }

        return $this;
    }

    public function removeRecetum(Receta $recetum): self
    {
        $this->receta->removeElement($recetum);

        return $this;
    }

    /**
     * @return Collection|Ingrediente[]
     */
    public function getIngrediente(): Collection
    {
        return $this->ingrediente;
    }

    public function addIngrediente(Ingrediente $ingrediente): self
    {
        if (!$this->ingrediente->contains($ingrediente)) {
            $this->ingrediente[] = $ingrediente;
        }

        return $this;
    }

    public function removeIngrediente(Ingrediente $ingrediente): self
    {
        $this->ingrediente->removeElement($ingrediente);

        return $this;
    }
}
