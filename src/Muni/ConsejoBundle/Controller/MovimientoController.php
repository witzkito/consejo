<?php

namespace Muni\ConsejoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Muni\ConsejoBundle\Entity\Movimiento;
use Muni\ConsejoBundle\Form\MovimientoType;
use \DateTime;

class MovimientoController extends Controller
{
    
    public function nuevoAction($id_resolucion)
    {
        $em = $this->get('doctrine')->getManager();
        
        if (null == $res = $em->getRepository('ConsejoBundle:Resolucion')->find($id_resolucion)){
            throw new NotFoundHttpException('No existe la resolucion');
        }
                
        $movimiento = new Movimiento();
        $movimiento->setFecha(new DateTime('NOW'));
        $movimiento->setResolucion($res);
        $form = $this->get('form.factory')->create(
                new MovimientoType(),
                $movimiento
        );
                
        $request = $this->get('request');
        if ($request->getMethod() == 'POST'){
            $form->bind($request);
            if ($form->isValid()){
                
                $movimiento = $form->getData();
                $movimiento->setResolucion($res);
                
                $em->persist($movimiento);
                $em->flush();

                 return $this->redirect($this->generateUrl('mostrar_resolucion', array('id' => $res->getId())));
            }
        }
        
        return $this->render('ConsejoBundle:Movimiento:nuevo.html.twig',
                array( 'form'       => $form->createView(),
                       'resolucion' => $res
                ));
    }
    
    public function borrarAction($id)
    {
        $em = $this->get('doctrine')->getManager();
        
        if (null == $mov = $em->getRepository('ConsejoBundle:Movimiento')->find($id)){
            throw new NotFoundHttpException('No existe el movimiento que quiere borrar');
        }
        $resolucion = $mov->getResolucion();
        $em->remove($mov);
        $em->flush();
        
        return $this->redirect($this->generateUrl('mostrar_resolucion', array('id' => $resolucion->getId())));
        
    }
}


?>