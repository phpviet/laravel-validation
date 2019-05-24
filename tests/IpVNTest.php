<?php
/**
 * @link https://github.com/phpviet/laravel-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Validation\Tests;

use Illuminate\Support\Facades\Lang;
use PHPViet\Laravel\Validation\Rules\IpVN;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class IpVNTest extends TestCase
{
    public function testValidCases()
    {
        $rule = new IpVN();
        $ruleV4 = new IpVN(IpVN::IPV4);
        $ruleV6 = new IpVN(IpVN::IPV6);
        $ipv4 = '113.173.134.203';
        $ipv6 = '2405:4800:102:1::3';
        $this->assertTrue($rule->passes('attribute', $ipv4));
        $this->assertTrue($rule('attribute', $ipv4, null, null));
        $this->assertTrue($ruleV4->passes('attribute', $ipv4));
        $this->assertTrue($ruleV4('attribute', $ipv4, null, null));
        $this->assertTrue($ruleV6->passes('attribute', $ipv6));
        $this->assertTrue($ruleV6('attribute', $ipv6, null, null));
        $this->assertFalse($ruleV4->passes('attribute', $ipv6));
        $this->assertFalse($ruleV4('attribute', $ipv6, null, null));
        $this->assertFalse($ruleV6->passes('attribute', $ipv4));
        $this->assertFalse($ruleV6('attribute', $ipv4, null, null));
        $validIps = $this->app['validator']->validate([
            'ipv4' => $ipv4,
            'ipv6' => $ipv6,
        ], [
            'ipv4' => 'ip_vn|ipv4_vn',
            'ipv6' => 'ip_vn|ipv6_vn',
        ]);
        $this->assertEquals($ipv4, $validIps['ipv4']);
        $this->assertEquals($ipv6, $validIps['ipv6']);
    }

    public function testInvalidCases()
    {
        $rule = new IpVN();
        $ip = '113.173.134.203@';
        $this->assertFalse($rule->passes('attribute', $ip));
        $this->assertFalse($rule('attribute', $ip, null, null));
        $this->expectException('Illuminate\Validation\ValidationException');
        $this->app['validator']->validate([
            'ip' => $ip,
        ], [
            'ip' => 'ip_vn|ipv4_vn|ipv6_vn',
        ]);
    }

    public function testCanTranslateErrorMessage()
    {
        Lang::addLines([
            'validation.phpviet.ip' => 'ip',
        ], Lang::getLocale());
        $rule = new IpVN();
        $rule->passes('attribute', '113.173.134.203@');
        $this->assertEquals('ip', $rule->message());
    }
}
