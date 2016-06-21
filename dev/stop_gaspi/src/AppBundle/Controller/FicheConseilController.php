<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\FicheConseil;
use AppBundle\Form\FicheConseilType;

/**
 * FicheConseil controller.
 *
 */
class FicheConseilController extends Controller
{

    public function returnPDFResponseFromHTML($html){
        $pdf = $this->get("white_october.tcpdf")->create('vertical', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetAuthor('Stop Gaspi');
        $pdf->SetTitle(('Fiche conseil'));
        $pdf->SetSubject('Fiche conseil - Stop Gaspi !');
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica', '', 11, '', true);
        $pdf->SetMargins(20,20,40, true);
        $pdf->AddPage();
        $img = file_get_contents($this->get('kernel')->getRootDir().'\..\images\stop_gaspi_pdf.png');
        $pdf->Image('@' . $img);

        $filename = 'stopgaspi_pdf_ficheconseil';

        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $pdf->Output($filename.".pdf",'I'); // This will output the PDF as a response directly
    }

    /**
     * Lists all FicheConseil entities.
     * @Route("/fiche/index", name="fiche_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ficheConseils = $em->getRepository('AppBundle:FicheConseil')->findAll();

        return $this->render('ficheconseil/index.html.twig', array(
            'ficheConseils' => $ficheConseils,
        ));
    }

    /**
     * Creates a new FicheConseil entity.
     * @Route("/fiche/new", name="fiche_new")
     */
    public function newAction(Request $request)
    {
        $ficheConseil = new FicheConseil();
        $form = $this->createForm('AppBundle\Form\FicheConseilType', $ficheConseil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ficheConseil);
            $em->flush();

            return $this->redirectToRoute('ficheconseil_show', array('id' => $ficheConseil->getId()));
        }

        return $this->render('ficheconseil/new.html.twig', array(
            'ficheConseil' => $ficheConseil,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FicheConseil entity.
     * @Route("/fiche/show", name="fiche_show")
     */
    public function showAction(FicheConseil $ficheConseil)
    {
        $deleteForm = $this->createDeleteForm($ficheConseil);

        return $this->render('ficheconseil/show.html.twig', array(
            'ficheConseil' => $ficheConseil,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FicheConseil entity.
     * @Route("/fiche/edit", name="fiche_edit")
     */
    public function editAction(Request $request, FicheConseil $ficheConseil)
    {
        $deleteForm = $this->createDeleteForm($ficheConseil);
        $editForm = $this->createForm('AppBundle\Form\FicheConseilType', $ficheConseil);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ficheConseil);
            $em->flush();

            return $this->redirectToRoute('ficheconseil_edit', array('id' => $ficheConseil->getId()));
        }

        return $this->render('ficheconseil/edit.html.twig', array(
            'ficheConseil' => $ficheConseil,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a FicheConseil entity.
     * @Route("/fiche/delete", name="fiche_delete")
     */
    public function deleteAction(Request $request, FicheConseil $ficheConseil)
    {
        $form = $this->createDeleteForm($ficheConseil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ficheConseil);
            $em->flush();
        }

        return $this->redirectToRoute('ficheconseil_index');
    }

    /**
     * Creates a form to delete a FicheConseil entity.
     *
     * @param FicheConseil $ficheConseil The FicheConseil entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FicheConseil $ficheConseil)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ficheconseil_delete', array('id' => $ficheConseil->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Deletes a FicheConseil entity.
     * @Route("/fiche/download/{id}", name="fiche_download")
     */
    public function downloadAction(Request $request, FicheConseil $ficheConseil, $id)
    {
        $html = $this->renderView(
            'ficheconseil/pdf.html.twig', array(
                'fiche_contenu' => $ficheConseil->getContenu(),
                'fiche_description' => $ficheConseil->getDescription(),
                'fiche_domaine' => $ficheConseil->getDomaine(),
            )
        );
        $this->returnPDFResponseFromHTML($html);
    }

}
