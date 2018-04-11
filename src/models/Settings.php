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

namespace limesquare\activecampaign\models;

use limesquare\activecampaign\Activecampaign;

use Craft;
use craft\base\Model;

/**
 * @author    Jurgen Krol
 * @package   ActiveCampaignContacts
 * @since     1.0.0
 */
class Settings extends Model
{
    public $acUrl = '';
    public $acApikey = '';

    public function rules()
    {
        return [
            [['acUrl', 'acApikey'], 'required'],
        ];
    }
}
