<?php
/**
 * Конфиг
 */

$config = array();

/**
* Добавление блока в правую область топика
*/
Config::Set('block.commentrate', array(
		'action' => array('blog' => array('{topic}')),
		'blocks' => array(
			'right' => array(
				array(	
					'block' => 'blocks/block.commentrate.tpl', 
					'priority' => 150, 
					'params' => array('plugin' => 'Commentrate')
				)
			)
		)
	)
);

return $config;
