<?php namespace Econtract\Crm\ServiceProviders;


class ClientServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);

        $this->defaults = array(
            'gender'            => 0,
            'segment'           => 0,
            'first_name'        => '',
            'last_name'         => '',
            'birthdate'         => date('Y-m-d'),
            'birthplace'        => '',
            'nationality'       => '',
            'idnr'              => '',
            'rrnr'              => '',
            'cellphone'         => '',
            'landline'          => '',
            'email'             => '',
            'language'          => 'nl',
            'company'           => '',
            'vat'               => '',
            'user_id'           => 0,
            'client_id'         => 0,
            'bban'              => '',
            'iban'              => '',
            'bic'               => ''
        );

        $this->guards = array(
            'user_id',
            'client_id'
        );
    }


    /**
     * Submit a GET request to recover client information for a specific $id to the CRM API
     * @param       integer $id             ID of the client to be recovered
     * @return      mixed
     */
    public function getClient($id)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/clients/'. $id )
            ->get();
    }

    /**
     * Submit a POST request to search the clients in the database to the CRM API
     * @param       string $query           Query string that will be used to search the database
     * @return      mixed
     */
    public function searchClient($query)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/clients/search' )
            ->withData( array( 'query' => $query ) )
            ->post();
    }

    /**
     * Submit a POST request to create a new client to the CRM API
     * @param       array $attributes       Data array containing all the client attributes
     * @return      mixed
     */
    public function createClient($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/clients' )
            ->withData( $this->addDefaultAttributes( $attributes ) )
            ->post();
    }

    /**
     * Submit a POST request to update the client information for client with $id to the CRM API
     * @param       integer $id             ID of the client to be recovered
     * @param       array $attributes       Data array containing all the client attributes
     * @return      mixed
     */
    public function updateClient($id, $attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/clients/'. $id )
            ->withData( $this->filterImmutableAttributes( $attributes ) )
            ->post();
    }

}