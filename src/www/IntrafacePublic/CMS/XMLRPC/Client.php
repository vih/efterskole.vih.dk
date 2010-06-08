<?php
/**
 * Communicates with the Intraface CMS-system
 *
 * PHP version 5
 *
 * @category  IntrafacePublic
 * @package   IntrafacePublic_CMS_XMLRPC
 * @author    Lars Olesen <lars@legestue.net>
 * @author    Sune Jensen <sj@sunet.dk>
 * @copyright 2007 The Authors
 * @license   Creative Commons / Share A Like license http://creativecommons.org/licenses/by-sa/2.5/legalcode
 * @version   0.1.0
 * @link      http://public.intraface.dk/index.php?package=IntrafacePublic_CMS_XMLRPC
 */

/**
 * Required from the PEAR library - used for error handling
 */
require_once 'PEAR.php';

/**
 * Required from the PEAR library - used for the actual communication
 */
require_once 'XML/RPC2/Client.php';

/**
 * Communicates with the Intraface CMS-system
 *
 * @category  IntrafacePublic
 * @package   IntrafacePublic_CMS_XMLRPC
 * @author    Lars Olesen <lars@legestue.net>
 * @author    Sune Jensen <sj@sunet.dk>
 * @copyright 2007 The Authors
 * @license   Creative Commons / Share A Like license http://creativecommons.org/licenses/by-sa/2.5/legalcode
 * @version   0.1.0
 * @link      http://public.intraface.dk/index.php?package=IntrafacePublic_CMS_XMLRPC
 */

class IntrafacePublic_CMS_XMLRPC_Client {

    private $credentials;
    private $options = array(
        'prefix' => 'cms.',
        'encoding' => 'iso-8859-1'
    );
    private $client;

    /**
     * Constructor
     *
     * @param struct  $credentials Credentials provided by the intraface system (public_key and session_id)
     * @param integer $site_id     Site id
     * @param boolean $debug       Whether to have debug turned on
     * @param string  $url         Url to use
     *
     * @return void
     */
    public function __construct($credentials, $site_id, $debug = false, $url = 'http://www.intraface.dk/xmlrpc/cms/server2.php') {
        $this->options['debug'] = $debug;
        $this->credentials = $credentials;
        $this->site_id = intval($site_id);
        $this->client = XML_RPC2_Client::create($url, $this->options);

        if (PEAR::isError($this->client)) {
            die('error creating client ' . $this->client->getMessage());
        }
    }

    /**
     * Gets a page
     *
     * @param string $identifier Identifier for the page
     *
     * @return array with all info about the page
     */
    public function getPage($identifier = '') {
        try {
            return $this->client->getPage($this->credentials, $this->site_id, $identifier);
        }
        catch (XML_RPC2_FaultException $e) {
            die('Exception #' . $e->getFaultCode() . ' : ' . $e->getFaultString());
        }
        catch (Exception $e) {
            die('Exception : ' . $e->getMessage());
        }
    }

    /**
     * Gets a page list
     *
     * @param array $search A search array
     *
     * @return array with pages
     */
    public function getPageList($search = array()) {
        try {
            return $this->client->getPageList($this->credentials, $this->site_id, $search);
        }
        catch (XML_RPC2_FaultException $e) {
            die('Exception #' . $e->getFaultCode() . ' : ' . $e->getFaultString());
        }
        catch (Exception $e) {
            die('Exception : ' . $e->getMessage());
        }
    }
}
?>