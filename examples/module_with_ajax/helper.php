<?
class modModuleWithAjaxHelper
{
	public static function getAjax()
	{
		jimport('joomla.application.module.helper'); //подключаем хелпер для модуля
		$input = JFactory::getApplication()->input;
		$data = $input->getString('data');
		$response = 'hi!';
		return $response;
	}
	
}
?>