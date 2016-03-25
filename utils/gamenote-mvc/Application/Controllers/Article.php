<?php

namespace Application\Controllers;

class Article extends \Library\Controller\Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->setLayout('default');
	}

	public function indexAction()
	{

	}

	public function articleAction($id=null)
	{
		$modelArticle = new \Application\Models\article('localhost');
		$article = $modelArticle->fetchAll("`id`, `id_cat`, `nom`, `description`", "`id`='$id'");
		$this->addDataViews(array('article'=>$article));
		
		$number=intval($article[0]->id_cat);

		$modelCategory = new \Application\Models\categorie('localhost');
		$category = $modelCategory->fetchAll("`nom`, `id`", "`id`= $number");
		$this->addDataViews(array('id_cat'=>$category));

		if (empty($article))
		{
			echo "ok";
			header('location: ' . LINK_ROOT);
			exit;
		}
		elseif (empty($category))
		{
			// var_dump($category);
		}
		elseif (!$id == null)
		{
			
		}
	}

	public function createAction()
	{
		$modelCategory = new \Application\Models\categorie('localhost');
		$category = $modelCategory->fetchAll("`id`, `nom`", "1");
		$this->addDataViews(array('id'=>$category));

		$messageError = array();

		if(!empty($_POST))
		{
			if(empty($_POST['nom'])){
				array_push($messageError, 'Title is missing');
			}
			if(empty($_POST['description'])){
				array_push($messageError, 'Description invalid');
			}

			if(count($messageError)>0)
			{
				$this->addDataViews(array('error'=>$messageError));
				return false;
			}

			$modelArticle = new \Application\Models\article('localhost');

			if ($modelArticle->insert($_POST)!==false)
			{
				$article = $modelArticle->fetchAll("`id`, `id_cat`, `nom`, `description`", "`nom`='{$_POST['nom']}' AND `description`='{$_POST['description']}'");
				$_SESSION['article'] = $article[0];
				header('location: ' . LINK_ROOT . 'article/article/' . $_SESSION['article']->id);
				exit;
			}
			else
			{
				array_push($messageError, 'Article Invalid');
				$this->addDataViews(array('error'=>$messageError));
			}
		}
	}

	public function updateAction()
	{
		$modelCategory = new \Application\Models\categorie('localhost');
		$category = $modelCategory->fetchAll("`id`, `nom`", "1");
		$this->addDataViews(array('id_cat'=>$category));

		$messageError = array();

		if(!empty($_POST))
		{
			if(count($messageError)>0)
			{
				$this->addDataViews(array('error'=>$messageError));
				return false;
			}

			$modelArticle = new \Application\Models\Article('localhost');

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

			if($modelArticle->updateByPrimary($newValues)!==false)
			{
				header('location: ' . LINK_ROOT . 'article/article/' . $articleId[2]);
				exit;
			}
			else
			{
				array_push($messageError, 'Article invalid');
				$this->addDataViews(array('error'=>$messageError));
			}
		}
	}

	public function deleteAction()
	{
		// Ici je récupère l'id de mon article via l'URL
		$articleId = explode("/", $_GET['page']);

		$modelArticle = new \Application\Models\article('localhost');

		if ($modelArticle->deleteByPrimary($articleId[2])!==false)
		{
			$this->addDataViews(array('success'=>'Article deleted with success'));
			header('location: ' . LINK_ROOT);
			exit;
		}
	}
}