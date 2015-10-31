<?php defined( '_JEXEC' ) or die;
$doc = JFactory::getDocument();
$this->setGenerator('');//мета тэг
$headlink = $this->getHeadData();
//удалеие скриптов
unset($headlink['scripts']['/media/system/js/caption.js']);
unset($headlink['scripts']['/media/jui/js/jquery-migrate.min.js']);
unset($headlink['scripts']['/media/jui/js/jquery-noconflict.js']);
unset($headlink['script']);
$this->setHeadData($headlink);
$menu = JSite::getMenu();//меню
$menu = $menu->getActive();
if($menu->component!='com_kunena'){
	unset($headlink['scriptText']);
	$this->_script = array();//убирается new Caption
}
$this->setHeadData($headlink);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<jdoc:include type="head" />
</head>
<body>
<div id="site">
	<div id="page">
    	<div id="without_footer">
            <div id="wrapper">
                <div id="head">
                	<jdoc:include type="modules" name="head"/>
                </div>
                <div id="menu">
                	<jdoc:include type="modules" name="menu" />
                    <jdoc:include type="modules" name="login" />
                </div>
                <div id="middle">
                    <div id="left">
                    	<div class="content">
                            <jdoc:include type="message" />
                            <jdoc:include type="component" />
                            <jdoc:include type="modules" name="left" />
                        </div>
                    </div>
                    <div id="right">
                    	<div class="center">
                    		<jdoc:include type="modules" name="right" />
                        </div>
                    </div>
                </div>
            </div><!--wrapper-->
        </div><!--without_footer-->
        <div id="footer">
            <div class="left">
            	<div class="up">
                	<jdoc:include type="modules" name="footer-left" />
                </div>
            </div>
            <div class="center">
            	<div class="copyright">&copy;</div>
                
            </div>
            <div class="right">
                <jdoc:include type="modules" name="footer-right" />
                <div class="developed-by">Разработка сайта bashinsky.alexey@gmail.com</div>
            </div>
        </div><!--footer-->
    </div><!--page-->
</div><!--site-->
</body>
</html>