E-Contract BVBA - CRM package
=============================================

This package offers the integration of the Aanbieders.be CRM API. This API can be used by partners and affiliates of Aanbieders to commonicate with the Aanbieders internal CRM system.




## Installation

Pull this package in through Composer:

```js

    {
        "require": {
            "econtract/crm": "0.*"
        }
    }

```

Next, you will need to add several values to your `.env` file:

```

    AB_CRM_URL=http://foo.com/bar           // URL to the Aanbieders CRM system
    AB_CRM_KEY=your_crm_key                 // Unique CRM identification key

```

In order to use the CRM API (and thus this package), an API key is required. If you are in need of such a key, please get in touch with Aanbieders.be via [their website](https://www.aanbieders.be/contact).


### Laravel installation

Add the service provider to your `config/app.php` file:

```php

    'providers'             => array(

        //...
        \Econtract\Crm\CrmServiceProvider::class,

    )

```

Add the CRM API as an alias to your `config/app.php` file

```php

    'facades'               => array(

        //...
        'CRM'                   => \Econtract\Crm\Facades\Crm::class,

    ),

```




## Usage

### Laravel usage

You can access the API using the alias you have selected in your `config/app.php` file:

```php

    $contract = Crm::getContract( 63 );

    $input = array(
        'order_id'                      => 156504,
        'producttype_id'                => 6,
        'product_id'                    => 12,
        'supplier_id'                   => 5,
        'client_id'                     => 23,
        'address_id'                    => 5,
        'invoice_address_id'            => 5,
        'contract_status_id'            => 1,
        'customer_refnr'                => 'Foo_customer_refnr',
        'order_refnr'                   => 'Foo_order_refnr',
        'contract_refnr'                => 'Foo_contract_refnr',
        'start_date'                    => '2015-03-22',
        'end_date'                      => '2015-03-29',
        'duration'                      => 3,
        'payment_method'                => 1,
        'monthly_fee'                   => 34.98,

        'new_connection'                => false,
        'new_modem'                     => true,
        'activation_date'               => '2015-03-19',
        'install_type'                  => 4,
        'install_date'                  => '2015-03-17',
        'has_alarm_or_phonecentral'     => true,
        'donor_provider'                => 'Foo_donor_provider',
        'donor_line_type'               => 5,
        'donor_phone_nr'                => 'Foo_donor_phone_nr',
        'donor_client_nr'               => 'Foo_donor_client_nr',

        'send_confirmation_mail'        => 'true',
    );

    $contract = Crm::createContract( $input );

```

For information regarding all possible parameters and their properties, please get in touch with Aanbieders.be via [their website](https://www.aanbieders.be/contact).


### Non-laravel usage

```php

    include('vendor/autoload.php');

    use Econtract/Crm/CrmService;


    $crmService = new CrmService();
    $contract = $crmService->getContract( 63 );

```




## License

This package is proprietary software and may not be copied or redistributed without explicit permission.




## Contact

Evert Engelen (owner)

- Email: evert@aanbieders.be


Jan Oris (developer)

- Email: jan.oris@ixudra.be
- Telephone: +32 496 94 20 57