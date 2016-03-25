<?php

namespace Application\Controllers;

class Categorie extends \Library\Controller\Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->setLayout('default');
	}

	public function indexAction()
	{

	}

	public function categorieAction($id=null)
	{
		$modelCategory = new \Application\Models\categorie('localhost');
		$category = $modelCategory->fetchAll("`id`, `nom`", "`id`='$id'");
		$this->addDataViews(array('id_cat'=>$category));

		if (empty($category))
		{
			header('location: ' . LINK_ROOT);
			exit;
		}
		elseif (!$id == null)
		{
			$modelArticle = new \Application\Models\article('localhost');
			$article = $modelArticle->fetchAll("`id`, `nom`, `description`", "`id_cat`='{$category[0]->id}'");
			$this->addDataViews(array('article'=>$article));
		}
	}

	public function createAction()
	{
		$messageError = array();

		if(!empty($_POST))
		{
			if(empty($_POST['nom']) || strlen($_POST['nom'])>10){
				array_push($messageError, 'Category must have at least 6 characters');
			}

			if(count($messageError)>0)
			{
				$this->addDataViews(array('error'=>$messageError));
				return false;
			}

			$modelCategory = new \Application\Models\categorie('localhost');

			if ($modelCategory->insert($_POST)!==false)
			{
				header('location: ' . LINK_ROOT);
				exit;
			}
			else
			{
				array_push($messageError, 'Category Invalid');
				$this->addDataViews(array('error'=>$messageError));
			}
		}
	}

	public function updateAction()
	{
		$messageError = array();

		if(!empty($_POST))
		{
			if(empty($_POST['nom']) || strlen($_POST['nom'])>10){
				array_push($messageError, 'Category must have at least 6 characters');
			}

			if(count($messageError)>0)
			{
				$this->addDataViews(array('error'=>$messageError));
				return false;
			}

			$modelCategory = new \Application\Models\categorie('localhost');

			$newValues = array();
			$articleId = explode("/", $_GET['page']);
			$newValues['id'] = $articleId[2];

			foreach ($_POST as $key => $value)
			{
				if (!empty($value))
				{
					$newValues[$key] = $value;
				}
			}

			if($modelCategory->updateByPrimary($newValues)!==false)
			{
				header('location: ' . LINK_ROOT);
				exit;
			}
			else
			{
				array_push($messageError, 'Category invalid');
				$this->addDataViews(array('error'=>$messageError));
			}
		}
	}

	public function deleteAction()
	{
		// Ici je récupère l'id de ma categorie via l'URL
		$categorieId = explode("/", $_GET['page']);

		$modelCategory = new \Application\Models\categorie('localhost');

		// je vérifie si un article était associé à cette catégorie
		// si oui, je l'associe à la catégorie "none"
		$modelArticle = new \Application\Models\article('localhost');
		$article = $modelArticle->fetchAll("`id`, `id_cat`", "1");

		foreach ($article as $key => $value)
		{
			if($article[$key]->id_cat==$categorieId[2])
			{
				$modelArticle->updateByPrimary(array(
													'id'		=> $article[$key]->id,
													'id_cat'	=> 2));
			}
		}

		if ($modelCategory->deleteByPrimary($categorieId[2])!==false)
		{
			$this->addDataViews(array('success'=>'Category deleted with success'));
			header('location: ' . LINK_ROOT);
			exit;
		}
	}
}