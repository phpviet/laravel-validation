<?php
/**
 * @link https://github.com/phpviet/laravel-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Validation\Rules;

use PHPViet\Validation\Rules\IpVN as BaseIpVN;
use PHPViet\Validation\Validator;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class IpVN extends CallableRule
{
    const IPV4 = BaseIpVN::IPV4;

    const IPV6 = BaseIpVN::IPV6;

    /**
     * @var int|null
     */
    protected $version;

    /**
     * IpVN constructor.
     *
     * @param int|null $version
     */
    public function __construct(?int $version = null)
    {
        $this->version = $version;
    }

    /**
     * {@inheritdoc}
     */
    public function passes($attribute, $value): bool
    {
        return Validator::ipVN($this->version)->validate($value);
    }

    /**
     * {@inheritdoc}
     */
    public function message(): string
    {
        switch ($this->version) {
            case self::IPV4:

                return __('phpVietValidation::validation.ip.v4');
            case self::IPV6:

                return __('phpVietValidation::validation.ip.v6');
            default:

                return __('phpVietValidation::validation.ip.default');

        }
    }
}
