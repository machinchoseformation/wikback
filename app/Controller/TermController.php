<?php

namespace Controller;

use \W\Controller\Controller;

class TermController extends Controller
{

	/**
	 * Affiche tous les termes
	 * 
	 */
	public function showAll()
	{
		$termManager = new \Manager\TermManager();
		$terms = $termManager->findAll();

		$this->show('term/show_all_terms', ['terms' => $terms]);
	}

}