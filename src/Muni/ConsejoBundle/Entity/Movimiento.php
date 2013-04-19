<?php

namespace Muni\ConsejoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movimiento
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Muni\ConsejoBundle\Entity\Repositorio\MovimientoRepository")
 */
class Movimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="gasto", type="decimal")
     */
    private $gasto;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;
    
    
    /**
    * @var \Resolucion
    *
    * @ORM\ManyToOne(targetEntity="Resolucion", inversedBy="movimientos")
    * @ORM\JoinColumn(name="resolucion", referencedColumnName="id")
    */
    private $resolucion;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set gasto
     *
     * @param float $gasto
     * @return Movimiento
     */
    public function setGasto($gasto)
    {
        $this->gasto = $gasto;
    
        return $this;
    }

    /**
     * Get gasto
     *
     * @return float 
     */
    public function getGasto()
    {
        return $this->gasto;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Movimiento
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set : fecha
     *
     * @param \DateTime $:Fecha
     * @return Movimiento
     */
    public function setFecha($Fecha)
    {
        $this->fecha = $Fecha;
    
        return $this;
    }

    /**
     * Get : fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    
    /**
     * Setea Resolucion
     * @param type $resolucion
     * @return \Muni\ConsejoBundle\Entity\Movimiento
     */
    public function setResolucion($resolucion)
    {
        $this->resolucion = $resolucion;
        return $this;
    }
    
    /**
     * Get Resolucion
     * @return Resolucion
     */
    public function getResolucion()
    {
        return $this->resolucion;
    }

    
}
