<?php namespace Econtract\Crm\Traits;


use Econtract\Crm\ServiceProviders\RecommendationServiceProvider;

trait RecommendationTrait {

    /**
     * @param int $id
     * @param int $comparisonId
     * @return \stdClass
     */
    public function getRecommendation($id, $comparisonId = 0)
    {
        return $this->returnCrmResponse(
            $this->getRecommendationServiceProvider()->getRecommendation($id, $comparisonId)
        );
    }

    /**
     * @param int $id
     * @param int $comparisonId
     * @return \stdClass
     */
    public function getRenewal($id, $comparisonId = 0)
    {
        return $this->returnCrmResponse(
            $this->getRecommendationServiceProvider()->getRenewal($id, $comparisonId)
        );
    }


    /**
     * @return RecommendationServiceProvider
     */
    protected function getRecommendationServiceProvider()
    {
        if( is_null($this->recommendationServiceProvider) ) {
            $this->recommendationServiceProvider = new RecommendationServiceProvider();
        }

        return $this->recommendationServiceProvider;
    }

}