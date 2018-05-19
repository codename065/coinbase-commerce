<?php
namespace WPDMPP\Coinbase\Commerce;

/**
 * Http Client to handle communications with Coinbase Commerce Rest API
 *
 * @author WPDMPP <support@wpdownloadmanager.com>
 */
class Client {

	/**
     * @var string Production URL for Coinbase Commerce REST API V1
     */
    const URL_PRODUCTION = 'https://api.commerce.coinbase.com';


        /**
     * Http Guzzle Client
     *
     * @var \GuzzleHttp\Client
     */
    private $_client;
    
    /**
     *
     * @var string
     */
    private $_url;
    
    /**
     * @var string API Credentials
     */
    private $auth;


    
    public function __construct($environment = 'production'){
        
        $this->_url = ($environment === 'production')? self::URL_PRODUCTION : self::URL_DEVELOPMENT;
        
        $this->_client = new \GuzzleHttp\Client();
        
    }
    
    /**
     * Set API Key
     * 
     * @param string $token
     * @return $this
     */
    public function setApiKey($token){
        $this->auth = $token;
        return $this; 
    }

    
    /**
     * POST API request
     * 
     * @param string $endpoint Endpoint to call
     * @param string $body
     * @param array $query
     * @return string|null json response content
     * 
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \GuzzleHttp\Exception\ClientException
     * @throws \GuzzleHttp\Exception\TransferException
     */
    public function post($endpoint, $body = null, $query = []){
        
        $options = [
            'form_params' => is_null($body)?null:((is_string($body))?$body:(array)$body)
        ];

        
        return $this->request('POST', $endpoint, $options);
    }
    
    /**
     * GET API request
     * 
     * @param string $endpoint Endpoint to call
     * @param array $query
     * @return string|null json response content
     * 
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \GuzzleHttp\Exception\ClientException
     * @throws \GuzzleHttp\Exception\TransferException
     */
    public function get($endpoint, $query = []){
        $options = [
            'query' => $query,
            'body'  => null
        ];
        
        return $this->request('GET', $endpoint, $options);
    }
    /**
     * General API request
     * 
     * @param string $method Verb Method to call
     * @param string $endpoint Endpoint to call
     * @param array $options Additional Guzzle request options
     * @return string|null json response content
     * 
     * @throws \GuzzleHttp\Exception\RequestException
     * @throws \GuzzleHttp\Exception\ClientException
     * @throws \GuzzleHttp\Exception\TransferException
     */
    public function request($method, $endpoint, $options = []){
        
        $guzzleOptions = array_merge($options, [
            \GuzzleHttp\RequestOptions::HEADERS => [
                    'X-CC-Api-Key' => $this->auth
            ]
        ]);
        
        $response = $this->_client->request($method, "{$this->_url}/{$endpoint}", $guzzleOptions);
        $content = $response->getBody()->getContents();
        
        if(!empty($content)){
            return $content;
        }
        
        return null;
    }

    /**
     * List all Charges
     * 
     * @param int $page 
     * @return string|null json response content pagination
     */
    public function listCharges($page=null){

        return $this->get('charges');
    }

    /**
     * Show a charge
     * 
     * @param string $code 
     * @return string|null json response content
     */
    public function showCharge($code){

        return $this->get("charges/{$code}");
    }

    /**
     * Create charge
     * 
     * @param \WPDMPP\Coinbase\Commerce\Model\Charge $charge
     * @return string|null json response content
     */
    public function createCharge(\WPDMPP\Coinbase\Commerce\Model\Charge $charge){

        return $this->post("charges",$charge);
    }

}