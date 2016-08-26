<?php

namespace ZFolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ZFolioBundle\Form\TagType;

/**
 * Description of TagController
 *
 * @author Admin
 */
class TagController extends Controller
{

    /**
     * Insert en base de données un tag crée à l'aide du formulaire d'ajout de t    g 
     * @param Request $request
     * @return type
     */
    public function tagFormHandlingAction(Request $request)
    {
        if($request->isMethod('post') === true)
            {
            $form = $this->createForm(TagType::class);
            $form->handleRequest($request);
            $postedDatas = $form->getData();
            $tagName = $postedDatas['tag_name'];
            
            $em = $this->getDoctrine()->getManager();
            $con = $em->getConnection();
            $statement = $con->prepare('insert into ignore_tag (id, tag_name) VALUES (:id, :tag_name)');
            $statement->bindValue('id', '');
            $statement->bindValue('tag_name', $postedDatas['tag_name']);
            $statement->execute();
            
            $affected_rows = $statement->rowCount();
            
//            $query = $em->createNativeQuery(
//                    'insert into ignore_tag (id, tag_name) VALUES (?, ?)'
//                    );
            
            return $this->render('ZFolioBundle:Form:tag.html.twig', ['tag' => $postedDatas['tag_name']]);
            
        }
        
            return $this->render('ZFolioBundle:Form:tag.html.twig', ['tag' => 'non définie']);

    }

}
