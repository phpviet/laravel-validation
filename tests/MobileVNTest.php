<?php
/**
 * @link https://github.com/phpviet/laravel-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Validation\Tests;

use Illuminate\Support\Facades\Lang;
use PHPViet\Laravel\Validation\Rules\MobileVN;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class MobileVNTest extends TestCase
{
    public function testValidId()
    {
        $rule = new MobileVN();
        $mobile = '0909113911';
        $this->assertTrue($rule->passes('attribute', $mobile));
        $this->assertTrue($rule('attribute', $mobile, null, null));

        $validMobile = $this->app['validator']->validate([
            'mobile' => $mobile,
        ], [
            'mobile' => 'mobile_vn',
        ]);
        $this->assertEquals($mobile, array_shift($validMobile));
    }

    public function testInvalidIp()
    {
        $rule = new MobileVN();
        $mobile = '0909113911!@#';
        $this->assertFalse($rule->passes('attribute', $mobile));
        $this->assertFalse($rule('attribute', $mobile, null, null));
        $this->expectException('Illuminate\Validation\ValidationException');
        $this->app['validator']->validate([
            'mobile' => $mobile,
        ], [
            'mobile' => 'mobile_vn',
        ]);
    }

    public function testCanTranslateErrorMessage()
    {
        Lang::addLines([
            'validation.phpviet.mobile' => 'mobile',
        ], Lang::getLocale());
        $rule = new MobileVN();
        $rule->passes('attribute', '0909113911!!!');
        $this->assertEquals('mobile', $rule->message());
    }
}
