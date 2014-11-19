<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
<<<<<<< HEAD
            'admin.controllers.*',
=======
            'admin.controllers.BackendController',
>>>>>>> origin/master
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
            Yii::app()->widgetFactory->widgets['CBreadcrumbs'] = 
                    Yii::app()->widgetFactory->widgets['TbBreadcrumbs'] = 
                    array('homeLink'=>CHtml::link(AdminModule::t('Home'), array('/admin')));

			return true;
		}
		else
			return false;
	}

	/**
	 * @param $str
	 * @param $params
	 * @param $dic
	 * @return string
	 */
	public static function t($str='',$params=array(),$dic='admin') {
		if (Yii::t("AdminModule", $str)==$str)
		    return Yii::t("AdminModule.".$dic, $str, $params);
        else
            return Yii::t("AdminModule", $str, $params);
	}

}
