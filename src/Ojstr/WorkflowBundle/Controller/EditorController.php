<?php

namespace Ojstr\WorkflowBundle\Controller;

use \Symfony\Component\HttpFoundation\Request;

/**
 * Editor Workflow Controller
 */
class EditorController extends \Ojstr\Common\Controller\OjsController {
 

    /**
     * list published articles - Published
     * see list of params at src/Ojstr/Common/Params/CommonParams.php
     */
    public function publishedArticlesAction() {
        return $this->listArticles('articles_published', 2);
    }

    /**
     * list in-review articles. - Reviewing
     * see list of params at src/Ojstr/Common/Params/CommonParams.php
     */
    public function assignedArticlesAction() {
        return $this->listArticles('articles_assigned', 1);
    }

    /**
     * list not assigned articles - Waiting
     * see list of params at src/Ojstr/Common/Params/CommonParams.php
     */
    public function waitingArticlesAction() {
        return $this->listArticles('articles_waiting', 0);
    }

    /**
     * list not sumbitted articles - Not Submitted
     * see list of params at src/Ojstr/Common/Params/CommonParams.php
     */
    public function uncompleteArticlesAction() {
        return $this->listArticles('articles_uncomplete', -1);
    }

    public function unpublishedArticlesAction() {
        return $this->listArticles('articles_unpublished', -2);
    }

    public function rejectedArticlesAction() {
        return $this->listArticles('articles_rejected', -3);
    }

    private function listArticles($view, $status) {
        $articles = $this->getDoctrine()->getManager()
                        ->getRepository("OjstrJournalBundle:Article")->findByStatus($status);
        return $this->render('OjstrWorkflowBundle:Editor:' . $view . '.html.twig', array(
                    'entities' => $articles));
    }

}
