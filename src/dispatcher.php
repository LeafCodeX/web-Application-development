<?php

const REDIRECT_PREFIX = "redirect:";

function dispatch($routing, $action_url) {
	$controller_name = @$routing[$action_url];
	$model = [];
	if (is_string($controller_name)) {
		$view_name = $controller_name($model);
		buildResponse($view_name, $model);
	} else {
		http_response_code(404);
		exit;
	}
}

function buildResponse($view, $model) {
	if (strpos($view, REDIRECT_PREFIX) === 0) {
		$url = substr($view, strlen(REDIRECT_PREFIX));
		header("Location: " . $url);
		exit;
	} else {
		render($view, $model);
	}
}

function render($view_name, $model) {
	extract($model);
	include "views/" . $view_name . ".php";
}
