<?php
namespace Drip\Connect\Model\ApiCalls\Response;


class Base
    extends \Drip\Connect\Model\Restapi\Response\Abstract
    implements Drip_Connect_Model_Restapi_Response_Interface
{
    /** @var array */
    protected $responseData;

    /**
     * constructor
     */
    public function __construct($response = null, $errorMessage = null)
    {
        parent::__construct($response, $errorMessage);

        if (!$this->_isError) {
            $this->responseData = json_decode($this->getResponse()->getBody(), true);
        }
    }

    /**
     * @return string Json response
     */
    public function toJson()
    {
        return $this->getResponse();
    }

    /**
     * @return array
     */
    public function getResponseData()
    {
        return $this->responseData;
    }

    /**
     * Get the HTTP response status code
     *
     * @return int
     */
    public function getResponseCode()
    {
        return $this->getResponse()->getStatus();
    }
}

