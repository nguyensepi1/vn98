<?php

// Include classes
include_once('tbs_class.php'); // Load the TinyButStrong template engine
include_once('tbs_plugin_opentbs.php'); // Load the OpenTBS plugin
include '../login/db.php';

// prevent from a PHP configuration problem when using mktime() and date()
if (version_compare(PHP_VERSION,'5.1.0')>=0) {
	if (ini_get('date.timezone')=='') {
		date_default_timezone_set('UTC');
	}
}

// Initialize the TBS instance
$TBS = new clsTinyButStrong; // new instance of TBS
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); // load the OpenTBS plugin

// ------------------------------
// Prepare some data for the demo
// ------------------------------

// Retrieve the user name to display
// $yourname = str_replace(" ", '</w:r></w:p></w:tc><w:tc>', );
$yourname = str_replace("\r\n", '^p', $_POST['editor']);

// -----------------
// Load the template
// -----------------

$template = 'demo.docx';
$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // Also merge some [onload] automatic fields (depends of the type of document).

// ----------------------
// Debug mode of the demo
// ----------------------
if (isset($_POST['debug']) && ($_POST['debug']=='current')) $TBS->Plugin(OPENTBS_DEBUG_XML_CURRENT, true); // Display the intented XML of the current sub-file, and exit.
if (isset($_POST['debug']) && ($_POST['debug']=='info'))    $TBS->Plugin(OPENTBS_DEBUG_INFO, true); // Display information about the document, and exit.
if (isset($_POST['debug']) && ($_POST['debug']=='show'))    $TBS->Plugin(OPENTBS_DEBUG_XML_SHOW); // Tells TBS to display information when the document is merged. No exit.

// --------------------------------------------
// Merging and other operations on the template
// --------------------------------------------

// -----------------
// Output the result
// -----------------

// Define the name of the output file
$output_file_name = '../uploads/'.$_GET['id'].'/Chương '.$_GET['chap'].'.docx';

// Output the result as a file on the server.
$TBS->Show(OPENTBS_FILE, $output_file_name); // Also merges all [onshow] automatic fields.
// The script can continue.
// exit("File [$output_file_name] has been created.");

// Update thông báo
$auth = $_COOKIE['username'];
$content = $auth.' vừa cập nhật Chương '.$_GET['chap'];
$time = date("h:i - d/m/Y");
mysqli_query($connect, "INSERT INTO thong_bao (auth, content, time) VALUES ('Hệ Thống', '$content', '$time')");
header('location: /');

?>