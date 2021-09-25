<?php /* URL: /ajax/site/login */

$email = isset($_GET['e']) ? $_GET['e'] : null;
$password = isset($_GET['p']) ? $_GET['p'] : null;

$logindata = fetch("SELECT id, name, password, token FROM users WHERE email = ?", [$email]);

// Verify the password sent by the client (MD5 hashed) with the password in the database.
if ($logindata['password'] == $password) {
	// Set the Pou token cookie to remember the login
	setcookie('unnsession', $logindata['token'], 2000000000, '/');

	// Dummy pou data for state
	$dummypou = file_get_contents('api/dummy_pou_data.json');

	// Successful login response data
	$data = [
		'i' => $logindata['id'],	// User ID
		'n' => $logindata['name'],	// Name
		't' => '',					// Unknown
		'hP' => true,				// Unknown (hashed Password?)
		'nF' => 1,					// Unknown
		'nL' => 3,					// Unknown
		'state' => $dummypou,		// Pou data
		'version' => 4,				// Protocol version (4 is latest)
		'revision' => 224,			// Revision (224 is latest)
		'success' => true,			// Whether everything went A OK
	];

	echo json_encode($data);
} else {
	echo json_encode([
		'error' => [
			'type' => 'IncorrectUserCredentials',
			'message' => 'Incorrect user credentials.'
		]
	]);
}
