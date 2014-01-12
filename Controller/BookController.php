<?php
// src/Acme/LibraryBundle/Controller/BookController.php

namespace Acme\Bundle\BookBundle\Controller;

use Acme\Bundle\BookBundle\Form\Type\AuthorType;
use Acme\Bundle\BookBundle\Model\Author;
use Acme\Bundle\BookBundle\Model\Base\AuthorQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\Bundle\BookBundle\Model\Book;
use Acme\Bundle\BookBundle\Form\Type\BookType;

class BookController extends Controller
{
    public function newAction()
    {
        $book = new Author();
        $form = $this->createForm(new AuthorType(), $book);

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $book->save();

                return $this->redirect($this->generateUrl('book_update', ['id' => $book->getId()]));
            }
        }

        return $this->render('AcmeBookBundle:Book:new.html.twig', array(
                'form' => $form->createView(),
            ));
    }

    public function updateAction($id)
    {
        $book = AuthorQuery::create()->findOneById($id);
        $form = $this->createForm(new AuthorType(), $book);

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $book->save();

                return $this->redirect($this->generateUrl('book_update', ['id' => $book->getId()]));
            }
        }

        return $this->render('AcmeBookBundle:Book:update.html.twig', array(
                'book' => $book,
                'form' => $form->createView(),
            ));
    }
}