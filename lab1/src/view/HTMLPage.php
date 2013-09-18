<?php

namespace view;


class HTMLPage {

	/**
	 * @param String $title
	 * @param String $header
	 * @param String $form
	 * @param String $date
	 * @return String HTML
	 */
	public function getPage($title, $header, $form, $date) {
		return 
			'<!DOCTYPE html>
			<html lang="sv">
			<head>
				<meta charset="utf-8" />
			    <link rel="stylesheet" type="text/css" href="css/style.css" />
				<title>' . $title . '</title>
			</head>
			<body>
				'. $header . $form . $date .'
			</body>
			</html>';
	}
}
