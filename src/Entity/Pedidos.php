<?php

namespace App\Entity;

use App\Repository\PedidosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PedidosRepository::class)
 */
class Pedidos
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
    private $detalles;

    /**
     * @ORM\OneToMany(targetEntity=Zapapedidos::class, mappedBy="pedido")
     */
    private $zapaPedidos;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="pedidos")
     */
    private $usuario;

    public function __construct()
    {
        $this->zapaPedidos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDetalles(): ?string
    {
        return $this->detalles;
    }

    public function setDetalles(string $detalles): self
    {
        $this->detalles = $detalles;

        return $this;
    }

    /**
     * @return Collection|Zapapedidos[]
     */
    public function getZapaPedidos(): Collection
    {
        return $this->zapaPedidos;
    }

    public function addZapaPedido(Zapapedidos $zapaPedido): self
    {
        if (!$this->zapaPedidos->contains($zapaPedido)) {
            $this->zapaPedidos[] = $zapaPedido;
            $zapaPedido->setPedido($this);
        }

        return $this;
    }

    public function removeZapaPedido(Zapapedidos $zapaPedido): self
    {
        if ($this->zapaPedidos->removeElement($zapaPedido)) {
            // set the owning side to null (unless already changed)
            if ($zapaPedido->getPedido() === $this) {
                $zapaPedido->setPedido(null);
            }
        }

        return $this;
    }

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }
}
