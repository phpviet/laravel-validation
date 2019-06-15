<p align="center">
    <a href="https://github.com/laravel" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/958072" height="100px">
    </a>
    <h1 align="center">Laravel Validation</h1>
    <br>
    <p align="center">
    <a href="https://packagist.org/packages/phpviet/laravel-validation"><img src="https://img.shields.io/packagist/v/phpviet/laravel-validation.svg?style=flat-square" alt="Latest version"></a>
    <a href="https://travis-ci.org/phpviet/laravel-validation"><img src="https://img.shields.io/travis/phpviet/laravel-validation/master.svg?style=flat-square" alt="Build status"></a>
    <a href="https://scrutinizer-ci.com/g/phpviet/laravel-validation"><img src="https://img.shields.io/scrutinizer/g/phpviet/laravel-validation.svg?style=flat-square" alt="Quantity score"></a>
    <a href="https://styleci.io/repos/187064051"><img src="https://styleci.io/repos/187064051/shield?branch=master" alt="StyleCI"></a>
    <a href="https://packagist.org/packages/phpviet/laravel-validation"><img src="https://img.shields.io/packagist/dt/phpviet/laravel-validation.svg?style=flat-square" alt="Total download"></a>
    <a href="https://packagist.org/packages/phpviet/laravel-validation"><img src="https://img.shields.io/packagist/l/phpviet/laravel-validation.svg?style=flat-square" alt="License"></a>
    </p>
</p>

## Thông tin

Laravel validation hổ trợ kiểm tra các kiểu dữ liệu đặc thù trong nước ta.

## Cài đặt

Cài đặt Laravel Validation thông qua [Composer](https://getcomposer.org):

```bash
composer require phpviet/laravel-validation
```

## Cách sử dụng

### Các kiểu dữ liệu được hổ trợ kiểm tra hiện tại


- [`Số điện thoại di động`](#Số-điện-thoại-di-động)
- [`Số điện thoại bàn`](#Số-điện-thoại-bàn)
- [`Thẻ căn cước / chứng minh thư`](#Thẻ-căn-cước-/-chứng-minh-thư)
- [`Địa chỉ IP`](#Địa-chỉ-IP)

### Số điện thoại di động

+ Sử dụng tại `request`:

```php
$request->validate([
    'mobile_number' => 'required|mobile_vn'
]);
```

+ Sử dụng trong `FormRequest`:

```php
public function rules()
{
    return [
        'mobile_number' => 'required|mobile_vn',
    ];
}
```

+ Sử dụng dưới dạng `Rule`:

```php
public function rules()
{
    return [
        'mobile_number' => ['required', new \PHPViet\Laravel\Validation\Rules\MobileVN()]
    ];
}
```

### Số điện thoại bàn

+ Sử dụng tại `request`:

```php
$request->validate([
    'land_line_number' => 'required|land_line_vn'
]);
```

+ Sử dụng trong `FormRequest`:

```php
public function rules()
{
    return [
        'land_line_number' => 'required|land_line_vn',
    ];
}
```

+ Sử dụng dưới dạng `Rule`:

```php
public function rules()
{
    return [
        'land_line_number' => ['required', new \PHPViet\Laravel\Validation\Rules\LandLineVN()]
    ];
}
```

### Thẻ căn cước / chứng minh thư

+ Sử dụng tại `request`:

```php
$request->validate([
    'id_number' => 'required|id_vn'
]);
```

+ Sử dụng trong `FormRequest`:

```php
public function rules()
{
    return [
        'id_number' => 'required|id_vn',
    ];
}
```

+ Sử dụng dưới dạng `Rule`:

```php
public function rules()
{
    return [
        'id_number' => ['required', new \PHPViet\Laravel\Validation\Rules\IdVN()]
    ];
}
```

### Địa chỉ IP

+ Sử dụng tại `request`:

```php
$request->validate([
    'ip_address' => 'required|ip_vn', // Kiểm tra tất cả ipv4 HOẶC v6 chỉ cần ip trong nước là được.
    'ipv4_address' => 'required|ipv4_vn', // Kiểm tra phải là ipv4 trong nước.
    'ipv6_address' => 'required|ipv6_vn', // Kiểm tra phải là ipv6 trong nước.
]);
```

+ Sử dụng trong `FormRequest`:

```php
public function rules()
{
    return [
        'ip_address' => 'required|ip_vn', // Kiểm tra tất cả ipv4 HOẶC v6 chỉ cần ip trong nước là được.
        'ipv4_address' => 'required|ipv4_vn', // Kiểm tra phải là ipv4 trong nước.
        'ipv6_address' => 'required|ipv6_vn', // Kiểm tra phải là ipv6 trong nước.
    ];
}
```

+ Sử dụng dưới dạng `Rule`:

```php
public function rules()
{
    return [
        'ip_address' => ['required', new \PHPViet\Laravel\Validation\Rules\IpVN()], // Kiểm tra tất cả ipv4 HOẶC v6 chỉ cần ip trong nước là được.
        'ipv4_address' => ['required', new \PHPViet\Laravel\Validation\Rules\IpVN(4)], // Kiểm tra phải là ipv4 trong nước.
        'ipv6_address' => ['required', new \PHPViet\Laravel\Validation\Rules\IpVN(6)], // Kiểm tra phải là ipv6 trong nước.
    ];
}
```

## Ngôn ngữ

Nếu như bạn muốn thay đổi các error message thì hãy publish resource đính kèm thông qua câu lệnh:

```php
php artisan vendor:publish
```

Sau khi publish xong bạn hãy vào `resources/lang/vendor/phpVietValidation` để thao tác chỉnh sửa theo ý bạn.

## Dành cho nhà phát triển

Nếu như bạn cảm thấy các kiểu kiểm tra dữ liệu bên trên vẫn chưa đủ đối với thị trường 
trong nước và bạn muốn đóng góp để phát triển chung, chúng tôi rất hoan nghênh! 
Hãy tạo các `issue` để đóng góp ý tưởng cho phiên bản kế tiếp hoặc tạo `PR` 
để đóng góp thêm các kiểu kiểm tra dữ liệu còn thiếu sót. Cảm ơn!
