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
		$terms = $termManager->findAll("modifiedDate", "DESC");

		$this->show('term/show_all_terms', ['terms' => $terms]);
	}

	public function delete($id)
	{
		$termManager = new \Manager\TermManager();
		$termManager->delete($id);

		$this->redirectToRoute('show_all_terms');
	}

	public function edit($id){

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

}