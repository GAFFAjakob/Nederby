<?php
class HourlyShell extends AppShell {

	public $tasks = array('Minecraft');
	
	public function main() {
		$this->Minecraft->save();
	}
	
}
?>