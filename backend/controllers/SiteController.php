<?php

class SiteController extends Controller
{

    /**  All layouts use css/styles.css from html5 boilerplate.
              All less files are compiled into the css folder(you can define the output folder in WinLess).
     */

    
    /**
     *      Semantic,responsive  layout with Semantic Grid
     *       http://semantic.gs/
     *       This layout needs  less/sg/layout.less ,less/sg/responsive_sg.less and less/bs/bootstrap.less
     *        Also less/bs/responsive.less if you use the  bootstrap navbar for navigation
     *       Bootstrap is still used for non-layout design,so you can exclude layout related code in bootstrap.less.
    */
   // public $layout='//layouts/grid_sg';


	/**
	 *This layout is used with Bootstrap non-semantic classes.
     * It uses    less/bs/bootstrap.less,less/bs/responsive.less and  less/responsive_custom.less,
	 */
    public $layout='//layouts/grid_bs';

    /**
	 *This layout is semantic with Bootstrap,it uses  layout mixins like .makeRow() and .makeColumn();
     * It uses    less/sem_layout.less and bootstrap.less(with all layout code optionally excluded),
     * The downside is that you have to code a custom responsive less or css file.The default bootstrap responsive.less
     *  file will not work,since it produces the non-semantic classes .span* which are not used in this semantic layout.
     *
	 */
     //   public $layout='//layouts/grid_bs_sem';

    
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
        
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','<strong>Message sent!   </strong>Thank you for contacting us. We will respond to you as soon as possible.');

               $this->refresh();

			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
                   Yii::app()->user->setFlash('success', '<strong>Logged In!</strong>');
				    $this->redirect(Yii::app()->user->returnUrl);
            }
		}
		// display the login form

        if( !empty($_POST['LoginForm'])){
        Yii::app()->user->setFlash('error', '<strong>Not Logged In.</strong>Wrong Credentials.');
        }
		$this->render('login',array('model'=>$model));

	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}