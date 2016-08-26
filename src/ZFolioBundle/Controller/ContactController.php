<?php

namespace ZFolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ZFolioBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use ZFolioBundle\Form\ContactType;

/**
 *
 * @author Admin
 */
class ContactController extends Controller
{

    /**
     * Méthode utilisée si un user utilise le formulaire de contact
     */
    public function contactFormHandlingAction(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $em = $this->get('doctrine.orm.entity_manager');
            $contact = new Contact();
            $form = $this->createForm(ContactType::class, $contact);            
            $form->handleRequest($request);
            
            if ($form->isValid())
            {
                /* insert in db */
                $em->persist($contact);
                $em->flush();
                /* fait suivre les données vers un autre controlleur découper les tâches à effectuer c'est une bonne pratique Symfony  */
                $postedDatas = $form->getData(); // récupère les données de la variable $_POST                
                $authorName = $postedDatas->getName(); //utilisation des getters de l'objet Contact
                $authorEmail = $postedDatas->getEmail();
                $authorPhone = $postedDatas->getPhone();
                $authorMessage = $postedDatas->getMessage();

                return $this->forward('ZFolioBundle:Contact:sendMail', [
                            'author' => $authorName,
                            'email' => $authorEmail,
                            'phone' => $authorPhone,
                            'message' => $authorMessage,
                ]);
            }
        }
            $this->addFlash('error', 'error validation');
            return $this->render('ZFolioBundle:Form:contact.html.twig', ['form' => $form->createView()]);
    }

    /**
     * 
     * @param type $name
     * @return type
     */
    public function sendMailAction($author, $email, $phone, $message)
    {
        $phone = $phone == '' ? '<p>Le contact n\'a pas laissé de numéro</p>' : '<p>Numéro de téléphone du contact: </p>'.$phone;

        $mail = \Swift_Message::newInstance()
                ->setSubject('Email contact reçu de ' . $author)
                ->setFrom('sdzcode@gmail.com') //mettre ici votre adresse mail qui envoie le mail, pas une adresse e-mail fictive
                ->setTo('zm.mail02@gmail.com') // mettre ici votre adresse email qui receptionnera l'email d'avetissement de contact
                ->setBody(
                $message.$phone, 'text/html'
                )
        ;
        $this->get('mailer')->send($mail);

        /* création d'un message flash qui va s'afficher en dessous du formulaire */
        $this->addFlash('notice', 'Votre message a bien été envoyé. Je vous contact dés que possible.');
        return $this->redirectToRoute('z_folio_form_contact');
    }
}
