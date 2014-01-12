<?php
// src/Acme/LibraryBundle/Controller/AuthorController.php

namespace Acme\Bundle\BookBundle\Controller;

use Acme\Bundle\BookBundle\Form\Type\AuthorType;
use Acme\Bundle\BookBundle\Model\Author;
use Acme\Bundle\BookBundle\Model\Base\AuthorQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthorController extends Controller
{
    public function newAction()
    {
        $author = new Author();
        $form = $this->createForm(new AuthorType(), $author);

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $author->save();

                return $this->redirect($this->generateUrl('author_update', ['id' => $author->getId()]));
            }
        }

        return $this->render('AcmeBookBundle:Author:new.html.twig', array(
                'form' => $form->createView(),
            ));
    }

    public function updateAction($id)
    {
        $author = AuthorQuery::create()->findOneById($id);
        $form = $this->createForm(new AuthorType(), $author);

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $author->save();

                return $this->redirect($this->generateUrl('author_update', ['id' => $author->getId()]));
            }
        }

        return $this->render('AcmeBookBundle:Author:update.html.twig', array(
                'author' => $author,
                'form' => $form->createView(),
            ));
    }
}