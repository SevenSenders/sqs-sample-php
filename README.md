# Seven Senders SQS PHP Example

A simple PHP CLI application demonstrating the usage of Seven Senders SQS Proxy with the PHP AWS SDK.

## Requirements

PHP 7+, Composer

## Installation

To install the dependencies run the following command in your terminal

```bash
composer install
```

## Credentials

Enter your Seven Senders API key in the `main.php` file:

```php
[
    'credentials' => [
        'key'    => '<API-KEY>',
        'secret' => '', // leave it empty
    ]
]
```

## Running The Application

This sample application connects to The Seven Senders SQS Proxy, and retrieves a batch of messages from the queue (if there are any).

```bash
php main.php
```

Example output:

```
4 Messages have been retrieved

407e1ca1-efb5-4f08-92a1-6aaa0f859e0a
{"id":"s272762277","order_id":"QA_LAPI_cb8cc52","tracking_code":"111111100003282","carrier":"brt","carrier_country":"it","status":"Pickup","status_time":"03.04.2020 20:22:45","tickets":[],"events":[]}

eea1d6b1-3019-48d5-a68e-bc6f84dc715d
{"id":"s272762295","order_id":"QA_LAPI_0b74d6e","tracking_code":"3SAAAA000008214","carrier":"postnl","carrier_country":"nl","status":"Pickup","status_time":"03.04.2020 20:23:20","tickets":[],"events":[]}

78104bb0-4dc1-4276-bdbb-5283e077d83b
{"id":"s272762301","order_id":"QA_LAPI_0dc858e","tracking_code":"000000009","carrier":"celeritas","carrier_country":"es","status":"Pickup","status_time":"03.04.2020 20:23:29","tickets":[],"events":[]}

9efb2e63-994d-449a-a850-5f3f61cee96d
{"id":"s272762309","order_id":"QA_LAPI_22b59fc","tracking_code":"1012345000067110110108","carrier":"postat","carrier_country":"at","status":"Pickup","status_time":"03.04.2020 20:23:39","tickets":[],"events":[]}
```

