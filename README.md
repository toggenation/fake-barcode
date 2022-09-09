# Fake-Barcode
Faker provider for fake Barcode data


## Installation

```sh
// composer.json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/toggenation/fake-barcode"
    }
],
  "require-dev": {
    "toggenation/fake-barcode": "dev-main"
},
```


## Basic Usage
```php
$faker = (new \Faker\Factory())::create();
$faker->addProvider(new \Faker\Provider\FakeBarcode($faker));


// generate gtin14
echo $faker->gtin14();

// generate SSCC
echo $faker->sscc();
```