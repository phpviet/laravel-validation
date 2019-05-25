<?php
/**
 * @link https://github.com/phpviet/laravel-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

return [
    'id' => ':attribute must be an id number of Vietnam.',
    'mobile' => ':attribute must be a mobile phone number of Vietnam.',
    'land_line' => ':attribute must be a land line phone number of Vietnam.',
    'ip' => [
        'v4' => ':attribute must be Vietnam ipv4.',
        'v6' => ':attribute must be Vietnam ipv6.',
        'default' => ':attribute must be Vietnam ip.',
    ],
];
