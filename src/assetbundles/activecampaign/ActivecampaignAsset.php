<?php
/**
 * Active Campaign Contacts plugin for Craft CMS 3.x
 *
 * Create and update Active Campaign contacts.
This can be use for newsletter subscriptions,  for example.
 *
 * @link      https://limesquare.eu
 * @copyright Copyright (c) 2018 Jurgen Krol
 */

namespace limesquare\activecampaign\assetbundles\Activecampaign;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Jurgen Krol
 * @package   ActiveCampaignContacts
 * @since     1.0.0
 */
class ActivecampaignAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@limesquare/activecampaign/assetbundles/activecampaign/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/Activecampaign.js',
        ];

        $this->css = [
            'css/Activecampaign.css',
        ];

        parent::init();
    }
}
