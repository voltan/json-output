<?php
/**
 * FaraGostaresh (http://www.faragostaresh.com)
 *
 * @link            http://www.faragostaresh.com/page/repository for the FaraGostaresh source repository
 * @copyright       Copyright (c) FaraGostaresh http://www.faragostaresh.com
 * @license         http://www.faragostaresh.com/page/license New BSD License
 */

// require class
require_once 'fg_config.php';
require_once 'fg_tools.php';
require_once 'fg_db.php';

// set default json
$json = array('message' => 'empty');

// Set get
$get = faragostaresh_tootls::tools_processing_get($_GET);

// Check get not empty
if (!empty($get) && !empty($get['part'])) {

	// load DB object
    $db = new faragostaresh_db();
    
    // Check is object
    if (is_object($db)) {

    	// process DB
    	switch ($get['part']) {
	
	    	// Get single item from DB
	    	case 'single':
	        	if (!empty($get['table']) && !empty($get['id'])) {
	    	    	$json = $db->db_select_id($get['table'], $get['id']);
	        	}
		    	break;
	
	    	// Get list of items from DB
        	case 'list':
            	if (!empty($get['table'])) {
	    	    	$json = $db->db_select_list($get['table'], $get['start'], $get['limit']);
	        	}
		    	break;
		    	
    	}

    }	

}

// Make json output
echo faragostaresh_tootls::tools_json($json);