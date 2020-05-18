<?php

return [
    'expire' => [
        'accessToken' => env('ACCESS_TOKEN_EXPIRATION_SECONDS', 900),
        'refreshToken' => env('REFRESH_TOKEN_EXPIRATION_SECONDS', 2419200)
    ]
];
