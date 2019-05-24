<?php
/**
 * @link https://github.com/phpviet/laravel-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Validation\Rules;

use PHPVIet\Validation\Validator;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class MobileVN extends CallableRule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        return Validator::mobileVN()->validate($value);
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return __('validation.phpviet.mobile');
    }

}
