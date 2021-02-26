<?php

namespace App\Entity;

use App\Repository\ZapatillaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZapatillaRepository::class)
 */
class Zapatilla
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $urlImagen;

    /**
     * @ORM\ManyToOne(targetEntity=Categoria::class, inversedBy="pedidos")
     */
    private $categoria;

    /**
     * @ORM\OneToMany(targetEntity=ZapaPedidos::class, mappedBy="zapatilla")
     */
    private $zapaPedidos;

    public function __construct()
    {
        $this->zapaPedidos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPrecio(): ?int
    {
        return $this->precio;
    }

    public function setPrecio(int $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getUrlImagen(): ?string
    {
        return $this->urlImagen;
    }

    public function setUrlImagen(string $urlImagen): self
    {
        $this->urlImagen = $urlImagen;

        return $this;
    }

    public function getCategoria(): ?categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * @return Collection|ZapaPedidos[]
     */
    public function getZapaPedidos(): Collection
    {
        return $this->zapaPedidos;
    }

    public function addZapaPedido(ZapaPedidos $zapaPedido): self
    {
        if (!$this->zapaPedidos->contains($zapaPedido)) {
            $this->zapaPedidos[] = $zapaPedido;
            $zapaPedido->setZapatilla($this);
        }

        return $this;
    }

    public function removeZapaPedido(ZapaPedidos $zapaPedido): self
    {
        if ($this->zapaPedidos->removeElement($zapaPedido)) {
            // set the owning side to null (unless already changed)
            if ($zapaPedido->getZapatilla() === $this) {
                $zapaPedido->setZapatilla(null);
            }
        }

        return $this;
    }
}
