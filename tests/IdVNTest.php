<?php
/**
 * @link https://github.com/phpviet/laravel-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Validation\Tests;

use Illuminate\Support\Facades\Lang;
use PHPViet\Laravel\Validation\Rules\IdVN;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class IdVNTest extends TestCase
{
    public function testValid()
    {
        $rule = new IdVN();
        $id = '025479661';
        $this->assertTrue($rule->passes('attribute', $id));
        $this->assertTrue($rule('attribute', $id, null, null));

        $validId = $this->app['validator']->validate([
            'id' => $id,
        ], [
            'id' => 'id_vn',
        ]);
        $this->assertEquals($id, array_shift($validId));
    }

    public function testInvalid()
    {
        $rule = new IdVN();
        $id = '025479661123123123123';
        $this->assertFalse($rule->passes('attribute', $id));
        $this->assertFalse($rule('attribute', $id, null, null));
        $this->expectException('Illuminate\Validation\ValidationException');
        $this->app['validator']->validate([
            'id' => $id,
        ], [
            'id' => 'id_vn',
        ]);
    }

    public function testCanTranslateErrorMessage()
    {
        Lang::setLocale('vi');
        $rule = new IdVN();
        $rule->passes('attribute', '025479661123123123123!!!');
        $this->assertEquals(':attribute phải là số chứng minh thư hoặc thẻ căn cước tại Việt Nam.', $rule->message());
    }
}
