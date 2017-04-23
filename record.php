<?php
/**
 * Created by PhpStorm.
 * User: CD
 * Date: 4/23/17
 * Time: 4:39 PM
 */

require_once ('MysqlDb.php');

$db = MysqlDB::getInstance();

header('Content-Type: image/gif');

if(isset($_GET['eid']) && isset($_GET['uid']))
{
    $data = ['email_log_id' => $_GET['eid'], 'user_id' => $_GET['uid']];
    $db->insert('open', $data);
}
//push out image
if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off');	}
header('Pragma: public'); 	// required
header('Expires: 0');		// no cache
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private',false);
header('Content-Disposition: attachment; filename="small_image.gif"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: '.filesize('https://s3.ap-south-1.amazonaws.com/asd512.email/small_image.gif'));	// provide file size
readfile('https://s3.ap-south-1.amazonaws.com/asd512.email/small_image.gif');		// push it out
exit();