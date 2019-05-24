<?php
/**
 * @link https://github.com/phpviet/laravel-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Validation\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
abstract class CallableRule implements Rule
{
    /**
     * Hổ trợ sử dụng rule dưới dạng extension.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @return bool
     */
    public function __invoke($attribute, $value, $parameters, $validator)
    {
        return $this->passes($attribute, $value);
    }
}
