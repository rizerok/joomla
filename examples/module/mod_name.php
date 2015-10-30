<? defined('_JEXEC') or die; 
/*jimport('steam-condenser-php.steam-condenser');//http://koraktor.de/steam-condenser/usage/
$server = new GoldSrcServer($params->get('server_ip'), $params->get('steam_server_port'));
$server->initialize();
$players = $server->getPlayers();
//print_r($server);
function getHumanTime($time){
	$sec = $time % 60;
	$min = round(($time/60)%60);
	$hour = floor($time/60/60);
	return $hour.'ч '.$min.'м '.$sec.'с';
}*/
$doc = JFactory::getDocument();
$doc->addScript(JUri::base().'/modules/mod_online_players/assets/js/script.js');
?>
<div id="online_players">
    <table>
    <thead>
        <tr>
            <td><span>Игрок</span></td>
            <td><span>Время в игре</span></td>
        </tr>
    </thead>
    <tbody>

    </tbody>
    </table>
    
</div>
