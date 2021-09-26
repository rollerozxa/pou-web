<?php /* URL: /ajax/user/messages */

$id = (isset($_GET['id']) ? $_GET['id'] : null);

$data = [
	'items' => [],
	'ok' => true
];

$messages = query("SELECT g.author, u.name, g.message FROM guestbook g JOIN users u ON g.author = u.id WHERE g.author = ? ORDER BY g.id DESC LIMIT 20", [$id]);

while ($message = $messages->fetch()) {
	$data['items'][] = [
		'sI' => $message['author'],
		'sN' => $message['name'],
		'sMinI' => 'null',
		'tI' => $message['message']
	];
}

echo json_encode($data);