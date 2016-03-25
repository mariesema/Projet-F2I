<?php

namespace Application\Controllers;

class User extends \Library\Controller\Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->setLayout('signin');
	}

	public function indexAction()
	{
		
	}

	public function signinAction()
	{
		$messageError = array();

		if(!empty($_POST))
		{
			if(empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
				array_push($messageError, 'Mail invalid');
			}
			if(empty($_POST['password'])){
				array_push($messageError, 'Password invalid');
			}

			if(count($messageError)>0)
			{
				$this->addDataViews(array('error'=>$messageError));
				return false;
			}

			$modelUser = new \Application\Models\User('localhost');
			$user = $modelUser->fetchAll("`id`, `nom`, `prenom`, `mail`, `update`", "`mail`='{$_POST['mail']}' AND `password`='{$_POST['password']}'");
			if(count($user)===1)
			{
				$_SESSION['user']=$user[0];
				header('location: ' . LINK_ROOT);
				exit;
			}else{
				array_push($messageError, 'Mail/Password invalid');
				$this->addDataViews(array('error'=>$messageError));
			}
		}
	}

	public function disconnectAction()
	{
		session_destroy();
		unset($_COOKIE['resterco']);
		header('location: ' . LINK_ROOT);
		exit;
	}

	public function createActionAction()
	{
		$messageError = array();

		if(!empty($_POST))
		{
			if(empty($_POST['nom']) || strlen($_POST['nom'])>50){
				array_push($messageError, 'Nom invalid');
			}
			if(empty($_POST['prenom']) || strlen($_POST['prenom'])>50){
				array_push($messageError, 'Prenom invalid');
			}
			if(empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
				array_push($messageError, 'Mail invalid');
			}
			if(empty($_POST['password']) || strlen($_POST['password'])<4){
				array_push($messageError, 'Password invalid');
			}

			if(count($messageError)>0)
			{
				$this->addDataViews(array('error'=>$messageError));
				return false;
			}

			$modelUser = new \Application\Models\User('localhost');

			if($modelUser->insert($_POST)!==false)
			{
				$this->addDataViews(array('success'=>'Account created'));
			}
			else
			{
				array_push($messageError, 'Account invalid');
				$this->addDataViews(array('error'=>$messageError));
			}
		}
	}

	public function updateAction()
	{
		if(isset($_SESSION['user']))
		{
			$messageError = array();

			if(!empty($_POST))
			{
				if(strlen($_POST['nom'])>50){
					array_push($messageError, 'Nom invalid');
				}
				if(strlen($_POST['prenom'])>50){
					array_push($messageError, 'Prenom invalid');
				}

				if(count($messageError)>0)
				{
					$this->addDataViews(array('error'=>$messageError));
					return false;
				}

				$modelUser = new \Application\Models\User('localhost');

				$newValues = array();
				$newValues['id'] = $_SESSION['user']->id;

				foreach ($_POST as $key => $value)
				{
					if (!empty($value))
					{
						$newValues[$key] = $value;
						$_SESSION['user']->$key = $value;
					}
				}

				if($modelUser->updateByPrimary($newValues)!==false)
				{
					$this->addDataViews(array('success'=>'Account update'));
				}
				else
				{
					array_push($messageError, 'Account invalid');
					$this->addDataViews(array('error'=>$messageError));
				}
			}
		}
		else
		{
			header('location: ' . LINK_ROOT . 'user/signin');
			exit;
		}
	}
}