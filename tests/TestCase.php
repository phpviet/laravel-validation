<?php
/**
 * @link https://github.com/phpviet/laravel-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Validation\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class TestCase extends BaseTestCase
{
    public function getPackageProviders($app)
    {
        return ['PHPViet\Laravel\Validation\ServiceProvider'];
    }
}
