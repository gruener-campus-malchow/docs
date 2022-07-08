<?php

class SlidesController {

	public static function serve($route) {
		switch ($route) {
			case '/ajax/create-slides':
				Util::return_json(Slides::create());

			case '/ajax/get-slides':
				$content = Slides::get($_POST['id'], $_POST['encryption_key']);
				if ($content === false) Util::return_text('Not Found', 404);
				Util::return_json([ 'md' => $content ]);

			case '/ajax/update-slides':
				$admin_key_hash = Database::query('select `admin_key` from `slides` where `id` = ?', [ $_POST['id'] ])[0]['admin_key'];
				if (!password_verify($_POST['admin_key'], $admin_key_hash)) Util::return_text('Not Allowed', 403);

				Slides::update($_POST['id'], $_POST['encryption_key'], $_POST['md']);
				break;


			default:
				//if (!preg_match('@^/([a-zA-Z0-9-]+_[a-zA-Z0-9-]+(/[a-zA-Z0-9-])?)?@', $route, $matches)) Util::return_text('Not Found', 404);
				include 'src/render.php';
		}
	}

}
