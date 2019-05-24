<?php
/**
 * @link https://github.com/phpviet/laravel-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Validation\Rules;

use PHPViet\Validation\Validator;
use PHPViet\Validation\Rules\IpVN as BaseIpVN;

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
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        return Validator::ipVN($this->version)->validate($value);
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        switch ($this->version) {
            case self::IPV4:

                return __('validation.phpviet.ipv4');
            case self::IPV6:

                return __('validation.phpviet.ipv6');
            default:

                return __('validation.phpviet.ip');

        }
    }

}
