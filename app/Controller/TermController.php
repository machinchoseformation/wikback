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
		$this->allowTo('admin');

		$termManager = new \Manager\TermManager();
		$terms = $termManager->findAll("modifiedDate", "DESC");

		$wotd = $termManager->getCurrentWordOfTheDay();

		$this->show('term/show_all_terms', ['terms' => $terms, 'wotd' => $wotd]);
	}

	public function delete($id)
	{
		$this->allowTo('admin');

		$termManager = new \Manager\TermManager();
		$termManager->delete($id);

		$this->redirectToRoute('show_all_terms');
	}

	public function edit($id)
	{
		$this->allowTo('admin');

		$user = $this->getUser();

		$termManager = new \Manager\TermManager();

		//si le formulaire est soumis... ($_POST n'est pas vide)
		if (!empty($_POST)){

			$name = trim($_POST['name']);

			//valider... au moins un minimum...
			if (strlen($name) > 1){

				//array contenant les noms des colonnes à modifier
				//et les nouvelles valeurs
				$data = [
					"name" => $name, 
					"modifiedDate" => date("Y-m-d H:i:s"),
				];

				//sauvegarder les modifications avec la méthode update() du TermManager
				$termManager->update($data, $id);	

				$this->redirectToRoute('show_all_terms');
			}
		}

		//récupérer en bdd le terme à modifier
		//grâce à la méthode ->find() du TermManager et à l'id
		$term = $termManager->find($id);

		//passer le terme à la vue, afin de rendre la variable disponible
		//notamment pour préremplir le formulaire
		$this->show('term/edit_term', ["term" => $term]);
	}


	public function changeWotd($id)
	{
		$this->allowTo('admin');

		$termManager = new \Manager\TermManager();

		//sélectionner le mot du jour actuel
		$wotd = $termManager->getCurrentWordOfTheDay();

		//faire un update sur l'ancien mot du jour pour le mettre à 0
		$termManager->update(["is_wotd" => 0], $wotd['id']);

		//faire un update sur le nouveau terme pour le mettre à 1
		$termManager->update(["is_wotd" => 1], $id);

		//rediriger vers la page d'accueil
		$this->redirectToRoute('show_all_terms');
	}

}