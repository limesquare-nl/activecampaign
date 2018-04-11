<?php
/**
 * Active Campaign Contacts plugin for Craft CMS 3.x
 *
 * Create and update Active Campaign contacts. This can be use for newsletter subscriptions,  for example.
 *
 * @link      https://limesquare.eu
 * @copyright Copyright (c) 2018 Jurgen Krol
 */

namespace limesquare\activecampaign\controllers;

use limesquare\activecampaign\Activecampaign;

use Craft;
use craft\web\Controller;

/**
 * @author    Jurgen Krol
 * @package   ActiveCampaignContacts
 * @since     1.0.0
 */
class ContactsController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
 //   protected $allowAnonymous = ['index', 'save-contact'];
    protected $allowAnonymous = true;

    // Public Methods
    // =========================================================================
    
    public function actionIndex()
    {
       
        $this->requirePostRequest();
        
        $request = Craft::$app->getRequest();
        $post_data = $request->getBodyParams();
        
        $response = Activecampaign::getInstance()->contacts->saveContact($post_data);
            
        if (!(int)$response->success) {
		    // Error
		    return $this->redirectToPostedUrl(array('message' => 'failure'));
	    } else {
	        return $this->redirectToPostedUrl(array('message' => 'success'));
	    }
        
    }

}
