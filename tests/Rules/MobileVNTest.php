<?php
/**
 * @link https://github.com/phpviet/laravel-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Validation\Tests\Rules;

use Illuminate\Support\Facades\Lang;
use PHPViet\Laravel\Validation\Rules\MobileVN;
use PHPViet\Laravel\Validation\Tests\TestCase;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class MobileVNTest extends TestCase
{
    public function testValid()
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

    public function testInvalid()
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
        Lang::setLocale('vi');
        $rule = new MobileVN();
        $rule->passes('attribute', '0909113911!!!');
        $this->assertEquals(':attribute phải là số di động tại Việt Nam.', $rule->message());
    }
}
