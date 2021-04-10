<?php
	$CI = get_instance();
	$CI->load->database();
	$CI->load->dbforge();

	// define table fields
	$fields = array(
		'id' => array(
			'type' => 'INT',
			'constraint' => 11,
			'unsigned' => TRUE,
			'auto_increment' => TRUE
		),
		'type' => array(
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => TRUE
		),
		'description' => array(
			'type' => 'LONGTEXT',
			'null' => TRUE
		)
	);
	$CI->dbforge->add_field($fields);
	// define primary key
	$CI->dbforge->add_key('id', TRUE);
	// create table
	$CI->dbforge->create_table('common_settings');

	$data1['type'] = 'recaptcha_status';
	$data1['description'] = '0';
	$CI->db->insert('common_settings', $data1);

	$data2['type'] = 'recaptcha_sitekey';
	$data2['description'] = 'enter-your-recaptcha-sitekey';
	$CI->db->insert('common_settings', $data2);

	$data3['type'] = 'recaptcha_secretkey';
	$data3['description'] = 'enter-your-recaptcha-secretkey';
	$CI->db->insert('common_settings', $data3);


	//update data in settings table
	$settings_data = array( 'version' => '7.2' );
	$CI->db->update('settings', $settings_data);
?>
