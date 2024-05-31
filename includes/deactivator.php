<?php
defined('ABSPATH') || exit;

if(!class_exists('iPanorama_Deactivator')) :

class iPanorama_Deactivator {
	public function deactivate() {
		global $wpdb;
		$table = $wpdb->prefix . IPANORAMA_PLUGIN_NAME;

		$sql = "SELECT COUNT(*) FROM {$table}";
		$count = $wpdb->get_var($sql);
		
		if($count > 0) {
			return;
		}

		$sql = "DROP TABLE IF EXISTS {$table}";
		$wpdb->query($sql);
		
		delete_option('ipanorama_db_version');
		delete_option('ipanorama_activated');
		delete_option('ipanorama_settings');
		
		$this->delete_files(IPANORAMA_PLUGIN_UPLOAD_DIR . '/');
	}
	
	private function delete_files($target) {
		if(is_dir($target)) {
			$files = glob($target . '*', GLOB_MARK); //GLOB_MARK adds a slash to directories returned
			foreach($files as $file) {
				$this->delete_files($file);
			}
			rmdir($target);
		} else if(is_file($target)) {
			unlink($target);
		}
	}
}
endif;