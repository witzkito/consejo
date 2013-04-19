<?php

namespace Muni\ConsejoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Muni\ConsejoBundle\Entity\Resolucion;
use Muni\ConsejoBundle\Form\ResolucionType;

class ResolucionController extends Controller
{
    
    public function listarAction()
    {
        $em = $this->get('doctrine')->getManager();
        
        $request = $this->get('request');
        $busqueda = $request->query->get('buscar');
        if (($busqueda != null) && (($busqueda != 'Buscar...')) )
        { 
            $res = $em->getRepository('ConsejoBundle:Resolucion')->getResoluciones($busqueda);
        }else{
            $res = $em->getRepository('ConsejoBundle:Resolucion')->findAll();
        }    
        
        return $this->render('ConsejoBundle:Resolucion:listar.html.twig', array(
            'resoluciones' => $res,
        ));
    }
    
    public function  nuevoAction()
    {
        $em = $this->get('doctrine')->getManager();
                
        $resolucion = new Resolucion();
        $form = $this->get('form.factory')->create(
                new ResolucionType(),
                $resolucion
        );
                
        $request = $this->get('request');
        if ($request->getMethod() == 'POST'){
            $form->bind($request);
            if ($form->isValid()){
                
                $resolucion = $form->getData();
                $em->persist($resolucion);
                

                // Guardamos el objeto en base de datos
                $em->persist($resolucion);
                $em->flush();

                 return $this->redirect($this->generateUrl('listar_resolucion'));
            }
        }
        
        return $this->render('ConsejoBundle:Resolucion:nuevo.html.twig',
                array( 'form' => $form->createView(),
                ));
    }
    
    public function editarAction($id)
    {
        $peticion = $this->get('request');
        $em = $this->get('doctrine')->getManager();
        
        if (null == $res = $em->find('ConsejoBundle:Resolucion', $id)) {
            throw new NotFoundHttpException('No existe la resolucion que se quiere modificar');
        }
        
        $form = $this->get('form.factory')->create(
                new ResolucionType(),
                $res
        );
        
        $form->setData($res);
        
        if ($peticion->getMethod() == 'POST') {
            $form->bindRequest($peticion);

            if ($form->isValid()) {
                $res = $form->getData();
                $em->persist($res);
                $em->flush();

                return $this->redirect($this->generateUrl('listar_resolucion'));
            }
        }
        
        return $this->render('ConsejoBundle:Resolucion:editar.html.twig', array(
            'form' => $form->createView(),
            'resolucion' => $res
        ));
     
    }
    
    public function mostrarAction($id)
    {
        $em = $this->get('doctrine')->getManager();
        
        if (null == $res = $em->getRepository('ConsejoBundle:Resolucion')->find($id)){
            throw new NotFoundHttpException('No existe la resolucion que se quiere mostrar');
        }
        
        return $this->render('ConsejoBundle:Resolucion:mostrar.html.twig', array(
            'resolucion' => $res,
        ));
    }
    
}

?>