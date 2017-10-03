<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Need;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Need controller.
 *
 * @Route("need")
 */
class NeedController extends Controller
{
    /**
     * Lists all need entities.
     *
     * @Route("/", name="need_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $needs = $em->getRepository('AppBundle:Need')->findAll();

        return $this->render('need/index.html.twig', array(
            'needs' => $needs,
        ));
    }

    /**
     * Creates a new need entity.
     *
     * @Route("/new", name="need_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $need = new Need();
        $form = $this->createForm('AppBundle\Form\NeedType', $need);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($need);
            $em->flush();

            return $this->redirectToRoute('need_show', array('id' => $need->getId()));
        }

        return $this->render('need/new.html.twig', array(
            'need' => $need,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a need entity.
     *
     * @Route("/{id}", name="need_show")
     * @Method("GET")
     */
    public function showAction(Need $need)
    {
        $deleteForm = $this->createDeleteForm($need);

        return $this->render('need/show.html.twig', array(
            'need' => $need,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing need entity.
     *
     * @Route("/{id}/edit", name="need_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Need $need)
    {
        $deleteForm = $this->createDeleteForm($need);
        $editForm = $this->createForm('AppBundle\Form\NeedType', $need);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('need_edit', array('id' => $need->getId()));
        }

        return $this->render('need/edit.html.twig', array(
            'need' => $need,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a need entity.
     *
     * @Route("/{id}", name="need_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Need $need)
    {
        $form = $this->createDeleteForm($need);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($need);
            $em->flush();
        }

        return $this->redirectToRoute('need_index');
    }

    /**
     * Creates a form to delete a need entity.
     *
     * @param Need $need The need entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Need $need)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('need_delete', array('id' => $need->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
