<?php

namespace App\Entity;

use App\Repository\ZapaPedidosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZapaPedidosRepository::class)
 */
class ZapaPedidos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    /**
     * @ORM\ManyToOne(targetEntity=zapatilla::class, inversedBy="zapaPedidos")
     */
    private $zapatilla;

    /**
     * @ORM\ManyToOne(targetEntity=Pedidos::class, inversedBy="zapaPedidos")
     */
    private $pedido;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getZapatilla(): ?zapatilla
    {
        return $this->zapatilla;
    }

    public function setZapatilla(?zapatilla $zapatilla): self
    {
        $this->zapatilla = $zapatilla;

        return $this;
    }

    public function getPedido(): ?pedidos
    {
        return $this->pedido;
    }

    public function setPedido(?pedidos $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }
}
