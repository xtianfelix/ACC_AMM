<?php

class RootController extends Controller
{
	public function actionIndex()
	{
		$this->redirectToHome();
	}
}