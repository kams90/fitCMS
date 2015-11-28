### What is fitCMS

fitCMS is an open source cms project based on CodeIgniter Framework.
You can install this cms fast even on cheap hosting.

### Installation

- Clone git repository
```sh
git clone git@github.com:xprezesx/fitCMS.git
```

- Install dependencies using composer
```sh
composer install
```

- Create database

- Run migrations
```sh
php index.php migrate allModules
```

### Server Requirements

PHP version 5.4 or newer is recommended.

It should work on 5.2.4 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

### Fixtures

Fixtures are the packets of sample data for database tables.

- How to run
```sh
php index.php fixtures load
```

- How to create new fixture:
1. Create new php class in application/fixtures (Fixture suffix recommend)
Example:

```php
// application/fixtures/PagesFixture.php
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once APPPATH.'/interfaces/FixturesInterface.php';

/**
 * Class PagesFixture
 */
class PagesFixture implements FixturesInterface
{
    public function load()
    {
        // Get instance of Codeigniter
        $CI = & get_instance();

        // Load models/config/libraries
        $CI->load->model('pages/pages_model', 'pages');
        $CI->load->config('admin');
        $CI->load->helper('admin');

        // Recommend using Faker library (https://github.com/fzaninotto/Faker)
        $faker = Faker\Factory::create();

        // all logic here (load model and insert data into database in loop)
        for ($i = 1; $i < 100; $i++) {
            $title = $faker->unique()->sentence(3);

            $data = [
                'title' => $title,
                'content' => $faker->text(1500),
                'meta_title' => $title,
                'meta_keywords' => $faker->sentence(3),
                'meta_description' => $faker->text(100),
            ];

            $CI->pages->insert($data);
        }
    }
}
```

### License

The MIT License (MIT)