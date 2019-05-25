<?php
/**
 * @link https://github.com/phpviet/laravel-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

return [
    'id' => ':attribute phải là số chứng minh thư hoặc thẻ căn cước tại Việt Nam.',
    'mobile' => ':attribute phải là số di động tại Việt Nam.',
    'land_line' => ':attribute phải là số điện thoại bàn tại Việt Nam.',
    'ip' => [
        'v4' => ':attribute phải là ipv4 tại Việt Nam.',
        'v6' => ':attribute phải là ipv6 tại Việt Nam.',
        'default' => ':attribute phải là ip Việt Nam.',
    ],
];
