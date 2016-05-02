<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/*
 * Call notFoundHandler on status code 404
 */
$app->add(function($request, $response, $next) use ($container) {
  $response = $next($request, $response);
  $status_code = $response->getStatusCode();
  $body_size = $response->getBody()->getSize();
  if ($status_code === 404 && $body_size === 0) {
    $handler = $container['notFoundHandler'];
    return $handler($request, $response);
  }
  return $response;
});

/*
 * Permanently redirect paths with a trailing slash
 * to their non-trailing counterpart
 */
$app->add(function(Request $request, Response $response, callable $next) {
    $uri = $request->getUri();
    $path = $uri->getPath();
    if ($path != '/' && substr($path, -1) == '/') {
        $uri = $uri->withPath(substr($path, 0, -1));
        return $response->withRedirect((string)$uri, 301);
    }
    return $next($request, $response);
});

?>
