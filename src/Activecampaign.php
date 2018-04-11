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

namespace limesquare\activecampaign;

use limesquare\activecampaign\services\ActivecampaignService as ActivecampaignServiceService;
use limesquare\activecampaign\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\UrlManager;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;

/**
 * Class ActiveCampaignContacts
 *
 * @author    Jurgen Krol
 * @package   ActiveCampaignContacts
 * @since     1.0.0
 *
 * @property  ActiveCampaignContactsServiceService $activeCampaignContactsService
 */
class Activecampaign extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var ActiveCampaignContacts
     */
    public static $plugin;
    
    /**
     * @var bool
     */
    public $hasCpSettings = true;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';
    
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
     
    public function init()
    {
        parent::init();
        
        $this->setComponents([
            'contacts' => \limesquare\activecampaign\services\ActivecampaignService::class,
        ]);
        
        

        Craft::info(
            Craft::t(
                'activecampaign',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'activecampaign/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}
