<?php namespace Econtract\AanbiedersCrm\ServiceProviders;


class RecommendationServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);
    }


    /**
     * Submit a GET request to recover recommendation information for a specific $id to the CRM API
     * @param       integer $id             ID of the recommendation to be recovered
     * @return      mixed
     */
    public function getRecommendation($id, $comparisonId = 0)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/recommendations/'. $id )
            ->withData( array( 'comparison_id' => $comparisonId ) )
            ->get();
    }

}