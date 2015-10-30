<?php
defined('_JEXEC') or die;
class user_lib{
	function simple_registration($username,$password,$name,$email,$defaultUserGroups = array(2)){//Default group 2=registered
	$result = array('error','message');
	$usersConfig = &JComponentHelper::getParams('com_users');
	if($usersConfig->get('allowUserRegistration') == '1')
		{
			//PASSWORD
			$salt     = JUserHelper::genRandomPassword(32);
			$password_clear = $password;
			$crypted  = JUserHelper::getCryptedPassword($password_clear, $salt);
			$password = $crypted.':'.$salt;
			//set
			$instance = JUser::getInstance();
			$instance->set('id'         , 0);
			$instance->set('name'           , $name);
			$instance->set('username'       , $username);
			$instance->set('password' , $password);
			$instance->set('password_clear' , $password_clear);
			$instance->set('email'          , $email);
			$instance->set('groups'     , $defaultUserGroups);
			if (!$instance->save()){//resultat
				$result['error'] = true;
				$result['message'] = 'bad data';              
			}else{  
				$result['error'] = false;
				$result['message'] = 'success';
			}
			
		}else{
			$result['error'] = true;
			$result['message'] = 'no allow user registration';
		}
		
		return $result;
	}
	function auth_without_pass($id){
		$instance = JUser::getInstance($id);
		$db = JFactory::getDBO();
		$instance->set('guest', 0);
		// Register the needed session variables
		$session = JFactory::getSession();
		$session->set('user', $instance);
		// Check to see the the session already exists.
		$app =& JFactory::getApplication();
		$app->checkSession();
		// Update the user related fields for the Joomla sessions table.
		$query = $db->getQuery(true)
			->update($db->quoteName('#__session'))
			->set($db->quoteName('guest') . ' = ' . $db->quote($instance->guest))
			->set($db->quoteName('username') . ' = ' . $db->quote($instance->username))
			->set($db->quoteName('userid') . ' = ' . (int) $instance->id)
			->where($db->quoteName('session_id') . ' = ' . $db->quote($session->getId()));
		$db->setQuery($query)->execute();
		// Hit the user last visit field
		$instance->setLastVisit();
	}
}

?>