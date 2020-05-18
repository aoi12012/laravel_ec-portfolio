<?php

return [
    'expire' => [
        'accessToken' => env('ACCESS_TOKEN_EXPIRATION_SECONDS', 2419200),
        'refreshToken' => env('REFRESH_TOKEN_EXPIRATION_SECONDS', 2419200)
    ]
];
