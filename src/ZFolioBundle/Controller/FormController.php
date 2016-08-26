<?php

namespace ZFolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ZFolioBundle\Form\ContactType;
use ZFolioBundle\Entity\Contact;

use ZFolioBundle\Form\TagType;

use ZFolioBundle\Entity\News;
use ZFolioBundle\Form\NewsType;


/**
 * This class will build all my entities form
 */
class FormController extends Controller
{

    public function newsFormAction()
    {
        $news = new News();
        $formNews = $this->createForm(NewsType::class, $news);
        
        $vars['formAddNews'] = $formNews->createView();
        
        return $this->render('ZFolioBundle:Form:news.html.twig', $vars);
    }

    public function contactFormAction()
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $vars['form'] = $form->createView();

        return $this->render('ZFolioBundle:Form:contact.html.twig', $vars);
    }

    public function tagFormAction()
    {
        $form = $this->createForm(TagType::class);
        $vars['form'] = $form->createView();

        return $this->render('ZFolioBundle:Form:tag.html.twig', $vars);
    }

}
