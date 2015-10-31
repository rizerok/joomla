<?php
defined('_JEXEC') or die;

class plgPluginName extends JPlugin{
	//event example
	public function onExtensionAfterSave($data, &$table, $isNew = 0) {
		if ( $table->module === 'mod_modulee') {
		
		}
	}
}
?>