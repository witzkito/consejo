<?php

namespace Muni\ConsejoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

/**
 * Resolucion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Muni\ConsejoBundle\Entity\Repositorio\ResolucionRepository")
 */
class Resolucion
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
     * @var string
     *
     * @ORM\Column(name="resolucion", type="string", length=100)
     */
    private $resolucion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var float
     *
     * @ORM\Column(name="monto", type="decimal")
     */
    private $monto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_limite", type="date", nullable= true)
     */
    private $fechaLimite;
    
    /**
    * @ORM\OneToMany(targetEntity="Movimiento", mappedBy="resolucion")
    */
    private $movimientos;
    
    public $tieneLimite;


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
     * Set resolucion
     *
     * @param string $resolucion
     * @return Resolucion
     */
    public function setResolucion($resolucion)
    {
        $this->resolucion = $resolucion;
    
        return $this;
    }

    /**
     * Get resolucion
     *
     * @return string 
     */
    public function getResolucion()
    {
        return $this->resolucion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Resolucion
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
     * Set monto
     *
     * @param float $monto
     * @return Resolucion
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    
        return $this;
    }

    /**
     * Get monto
     *
     * @return float 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set fechaLimite
     *
     * @param \DateTime $fechaLimite
     * @return Resolucion
     */
    public function setFechaLimite($fechaLimite)
    {
        $this->fechaLimite = $fechaLimite;
    
        return $this;
    }

    /**
     * Get fechaLimite
     *
     * @return \DateTime 
     */
    public function getFechaLimite()
    {
        return $this->fechaLimite;
    }
    
    /**
     * Get Movimientos
     * @return  Array() Movimientos
     */
    public function getMovimientos()
    {
        return $this->movimientos;
    }
    
    public function __toString() {
        return $this->resolucion;
    }
    
    public function __construct()
    {
        $this->tieneLimite = false;
        
        
    }
        
}
