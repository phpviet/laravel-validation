<?php
/**
 * @link https://github.com/phpviet/laravel-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Validation;

use PHPViet\Validation\Rules\IdVN;
use PHPViet\Laravel\Validation\Rules\IpVN;
use PHPViet\Laravel\Validation\Rules\MobileVN;
use PHPViet\Laravel\Validation\Rules\LandLineVN;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class ServiceProvider extends BaseServiceProvider
{

    public function boot(): void
    {
        if (isset($this->app['validator'])) {

            foreach ($this->getCallableRules() as $name => $rule) {
                $this->app['validator']->extend($name, $rule, $rule->message());
            }
        }
    }

    protected function getCallableRules(): array
    {
        return [
            'land_line_vn' => new LandLineVN(),
            'mobile_vn' => new MobileVN(),
            'id_vn' => new IdVN(),
            'ip_vn' => new IpVN(),
            'ipv4_vn' => new IpVN(IpVN::IPV4),
            'ipv6_vn' => new IpVN(IpVN::IPV6),
        ];
    }
}
