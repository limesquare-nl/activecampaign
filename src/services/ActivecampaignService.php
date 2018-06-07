<?php
/**
 * Active Campaign Contacts plugin for Craft CMS 3.x
 *
 * Create and update Active Campaign contacts.
This can be use for newsletter subscriptions, for example.
 *
 * @link      https://limesquare.eu
 * @copyright Copyright (c) 2018 Jurgen Krol
 */

namespace limesquare\activecampaign\services;

use limesquare\activecampaign\Activecampaign;

use Craft;
use craft\base\Component;

use ActiveCampaign as ActiveCampaignSDK;

/**
 * @author    Jurgen Krol
 * @package   ActiveCampaignContacts
 * @since     1.0.0
 */
class ActivecampaignService extends Component
{
    // Public Methods
    // =========================================================================

    /*
     * @return mixed
     */
     
    public function saveContact($data)
    {
      //  $plugin = Craft::$app->plugins->getPlugin('activecampaign');
        $plugin_settings = Activecampaign::getInstance()->getSettings();

        $url = $plugin_settings->acUrl;
        $apikey = $plugin_settings->acApikey;
    
        $post = array();
        $post['status[1]'] = 1;
        $redirect = "/";
        
        foreach($data as $key => $post_value) {
            if($key == "formid") {
                $post['form'] = $post_value;
            } elseif($key == "listid") {
                $post['p[{' . $post_value . '}]'] = $post_value;
            } elseif($key == "field") {
                foreach($post_value as $index => $field_value) {
                    //fill custom fields
                    $post['field[%' . strtoupper($index) . '%,0]'] = $field_value;
                }
            } else if($key == "redirect") {
                $redirect = $post_value;
            } else if($key != "action") {
                $post[$key] = $post_value;
            }
        }
        
        $ac = new ActiveCampaignSDK($url, $apikey);
        $ac->set_curl_timeout(10);
        $response = $ac->api("contact/sync", $post);
        
        return $response;
    }
}
