<?php
/**
 * @link https://github.com/phpviet/laravel-validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Laravel\Validation;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use PHPViet\Laravel\Validation\Rules\IdVN;
use PHPViet\Laravel\Validation\Rules\IpVN;
use PHPViet\Laravel\Validation\Rules\LandLineVN;
use PHPViet\Laravel\Validation\Rules\MobileVN;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class ServiceProvider extends BaseServiceProvider
{
    public function boot(): void
    {
        $this->loadTrans();
        $this->loadExt();
    }

    protected function loadTrans(): void
    {
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/phpVietValidation'),
        ]);
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'phpVietValidation');
    }

    protected function loadExt(): void
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
            'land_line_vn' => $this->app->make(LandLineVN::class),
            'mobile_vn' => $this->app->make(MobileVN::class),
            'id_vn' => $this->app->make(IdVN::class),
            'ip_vn' => $this->app->make(IpVN::class),
            'ipv4_vn' => $this->app->make(IpVN::class, ['version' => IpVN::IPV4]),
            'ipv6_vn' => $this->app->make(IpVN::class, ['version' => IpVN::IPV6]),
        ];
    }
}
