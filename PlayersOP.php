/* 
name=PlayersOP
description=Everyone who join is OP! 
version=1.0
author=Junyi00
class=PlayersOP
apiversion=9
*/

class PlayersOP implements Plugin {
    private $api, $path;

    public function __construct(ServerAPI $api, $server = false){
        $this->api = $api;
    }

    public function init() {
        $this->api->addHandler('player.join', array($this, 'OPPlayer'));
    }

    public function __destruct() { } 

    public function OPPlayer($data, $event) {
      switch($event) {
    		case "player.join":
    	
    			$user = $data->username;
    			$this->api->ban->commandHandler("op", $user, "console", false);
    	        $this->api->chat->broadcast("$user is now OP!");
       	}
    	
    }
    
}   
