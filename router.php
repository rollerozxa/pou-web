<?php
require('lib/common.php');

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = explode('/', $path);

if ($path[1] == 'ajax') {
	if ($path[2] == 'site') {
		if ($path[3] == 'register') {
			require('api/site/register.php');
		} elseif ($path[3] == 'check_email') {
			require('api/site/check_email.php');
		} elseif ($path[3] == 'top_likes') {
			require('api/site/top_likes.php');
		} elseif ($path[3] == 'login') {
			require('api/site/login.php');
		} elseif ($path[3] == 'top_scores') {
			require('api/site/top_scores.php');
		} elseif ($path[3] == 'reset_password') {
			require('api/site/reset_password.php');
		}
	} elseif ($path[2] == 'account') {
		if ($path[3] == 'logout') {
			require('api/user/logout.php');
		} elseif ($path[3] == 'delete') {
			require('api/user/delete.php');
		} elseif ($path[3] == 'info') {
			require('api/user/info.php');
		} elseif ($path[3] == 'change_nickname') {
			require('api/user/change_nickname.php');
		} elseif ($path[3] == 'change_email') {
			require('api/user/change_email.php');
		} elseif ($path[3] == 'check_password') {
			require('api/user/check_password.php');
		} elseif ($path[3] == 'change_password') {
			require('api/user/change_password.php');
		} elseif ($path[3] == 'save') {
			require('api/user/save.php');
		} elseif ($path[3] == 'scores') {
			require('api/user/scores.php');
		}
	} elseif ($path[2] == 'user') {
		if ($path[3] == 'favorites') {
			require('api/user/favorites.php');
		} elseif ($path[3] == 'visitors') {
			require('api/user/visitors.php');
		} elseif ($path[3] == 'likers') {
			require('api/user/likers.php');
		} elseif ($path[3] == 'visit') {
			require('api/user/visit.php');
		} elseif ($path[3] == 'like') {
			require('api/user/like.php');
		} elseif ($path[3] == 'unlike') {
			require('api/user/unlike.php');
		} elseif ($path[3] == 'game_sessions') {
			require('api/user/game_sessions.php');
		} elseif ($path[3] == 'play') {
			require('api/user/play.php');
		} elseif ($path[3] == 'messages') {
			require('api/user/messages.php');
		} elseif ($path[3] == 'send_message') {
			require('api/user/send_messages.php');
		}
	} elseif ($path[2] == 'search') {
		if ($path[3] == 'visit_user_by_nickname') {
			require('api/search/visit_user_by_nickname.php');
		} elseif ($path[3] == 'visit_user_by_email') {
			require('api/search/visit_user_by_email.php');
		} elseif ($path[3] == 'visit_random_user') {
			require('api/search/visit_random_user.php');
		} elseif ($path[3] == 'friend_by_nickname') {
			require('api/search/friend_by_nickname.php');
		} elseif ($path[3] == 'friend_by_email') {
			require('api/search/friend_by_email.php');
		} elseif ($path[3] == 'random_friend') {
			require('api/search/random_friend.php');
		}
	}
}
