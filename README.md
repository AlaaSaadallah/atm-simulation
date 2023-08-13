<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://play-lh.googleusercontent.com/HDvcBYx8o2RqTeviL40N_HyP-ccg68LH9Sa1MN_sEkxI8cOKwRYWS3XrEda38PolbT0" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# ATM Simulation

ATM simulation is a simple apis app that acts as an atm machine.

## Installation

1- clone the project from the GitHub repo

```bash
git clone https://github.com/AlaaSaadallah/atm-simulation.git
```
2- create your .env file

3- just run this command to install all dependencies

```bash
composer update
php artisan app:setup
php artisan serve
```

3- import the Postman collection file named `ATM Simulation.postman_collection.json` then set the global variables:


`{{loacalhost}}` , `{{access_token}}` , `{{account_number}}`
 
## Test User

card_number = 12345678912345

pin = 123456


## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)
