<?php

return [
    'paths' => ['api/*', 'comments/*', 'sanctum/csrf-cookie'], // Add any other paths you need
    'allowed_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'], // Be explicit about allowed methods
    'allowed_origins' => [
        'http://127.0.0.1:8000', // Allow your local development server
        // You'll add your extension ID here. See below.
        'chrome-extension://jockfdfllkkpjppgcjefpgoacbfd'
    ],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization', 'HX-Request', 'HX-Target', 'HX-Current-URL', 'HX-Boosted'], // Add HTMX headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true, // IMPORTANT if you use cookies/sessions
];
