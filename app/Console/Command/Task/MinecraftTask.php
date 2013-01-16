<?php
class MinecraftTask extends Shell{
	public $uses = array('MinecraftLog', 'User');
	
	public function save(){
		$newestLog = $this->MinecraftLog->find('all', array(
			'order' => array('MinecraftLog.created DESC'),
			'limit' => 1
		));
		//echo $newestLog[0]['MinecraftLog']['created'];
		
		$file = 'D:\ServerFolders\Documents\Games\Minecraft\server.log';
		$line = "";
		$handle = fopen($file, "r");
		while(!feof($handle)){
		
			$line = utf8_encode(fgets($handle));
			preg_match('/(^[0-9]{4}-[0-9]{2}-[0-9]{2}\s*[0-9]{2}:[0-9]{2}:[0-9]{2})\s*([\[][A-Z]{0,12}[\]])\s*[<]([\w]{0,256})>\s*(.*)/', $line, $output);
			
			if(!empty($output)){
				//var_dump($output);
				$date = $output[1];
				$tag = $output[2];
				$username = $output[3];
				$message = $output[4];
				
				//get and save user if new
				$user = $this->User->findByUsername($username);
				if(empty($user)){
					$this->User->create();
					$user = array(
						'User' => array(
							'username' => $username
						)
					);
					$this->User->save($user);
					$user_id = $this->User->getInsertID();
				}else{
					$user_id = $user['User']['id'];
				}
				
				//save message
				if(strtotime($date)>strtotime($newestLog[0]['MinecraftLog']['created'])){
					
					$this->MinecraftLog->create();
					$minecraftLog = array(
						'MinecraftLog' => array(
							'user_id' => $user_id,
							'content' => $message,
							'created' => $date
						)
					);
					if($this->MinecraftLog->save($minecraftLog)){
						echo "Log saved - ".date("Y-m-d H:i:s")."\n";
					}else{
						//echo "Error - could not saved\n";
					}
				}else{
					//echo "No new logs found\n";
				}
			}else{
				//echo "ReqEx is ignoring this line\n";
			}
		}
	}
}
?>