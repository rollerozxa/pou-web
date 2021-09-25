<?php /* URL: /ajax/site/check_email */

$email = isset($_GET['e']) ? $_GET['e'] : null;

if (result("SELECT COUNT(*) FROM users WHERE email = ?", [$email]) === 1) {
	$registered = true;
} else {
	$registered = false;
}

echo json_encode(['registered' => $registered]);