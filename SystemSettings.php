<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\SelfEsteem;

use Piwik\Settings\Setting;
use Piwik\Settings\FieldConfig;
use Piwik\Validators\NotEmpty;

/**
 * Defines Settings for SelfEsteem.
 *
 * Usage like this:
 * $settings = new SystemSettings();
 * $settings->metric->getValue();
 * $settings->description->getValue();
 */
class SystemSettings extends \Piwik\Settings\Plugin\SystemSettings
{
    /** @var Setting */
    public $platform;

    /** @var Setting */
    public $URL;

    /** @var Setting */
    public $siteId;

    protected function init() {
        $this->platform = $this->createPlatformSetting();
        $this->URL = $this->createURLSetting();
        $this->siteId = $this->createSiteIdSetting();
    }

    private function createPlatformSetting() {
        return $this->makeSetting('Platform', 'matomo', FieldConfig::TYPE_ARRAY, function (FieldConfig $field) {
            $field->title = 'Platform';
            $field->uiControl = FieldConfig::UI_CONTROL_MULTI_SELECT;
            $field->availableValues = array('piwik' => 'Piwik', 'matomo' => 'Matomo');
            $field->description = '';
        });
    }

    private function createURLSetting() {
        return $this->makeSetting('URL', '', FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'URL';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->description = '';
        });
    }

    private function createSiteIdSetting() {
        return $this->makeSetting('SiteId', '', FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'Site Id';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->description = '';
        });
    }
}
