# {{ project_name }}

[![Build Status](https://travis-ci.org/{{ github_username }}/{{ project_name }}.svg)](https://travis-ci.org/{{ github_username }}/{{ project_name }})

{{ Description }}

## Installation
To use this class in your project, just add or update the **composer.json** file with the following entries

```
{
    ...
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/{{ github_username }}/{{ project_name }}"
        }
    ],
    ...
}
```

## Usage
```php
    ...
    // explain how someone can use this project
    ...
```

## Running tests
This packages ships with a dev-dependency for the Codeception testing framework (http://codeception.com/). To run tests:
- get dependencies ready:
    ```$ composer install```
- run ALL tests:
    ```$ ./vendor/codeception/codeception/codecept run```

- run tests and with code coverage and xml & html output

    ```// found in products-autodescriptor/tests/_output/coverage/dashboard.html```

    ```$ composer test --coverage --coverage-xml --coverage-html```



## Features by versions
### 0.1.0
- features

## Credits

### Authors:
- me@example.com

### Contact us: 
dev@example.com
