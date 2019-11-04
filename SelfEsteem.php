<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\SelfEsteem;

class SelfEsteem extends \Piwik\Plugin
{
    /**
     * @param bool|string $pluginName
     */
    public function __construct($pluginName = false) {
        parent::__construct($pluginName);
    }

    /**
     * @see \Piwik\Plugin::registerEvents
     */
    public function registerEvents() {
        return array(
            'AssetManager.getJavaScriptFiles' => 'getJavaScriptFiles',
            'Template.jsGlobalVariables' => 'addJsGlobalVariables',
        );
    }

    public function getJavaScriptFiles(&$jsFiles) {
        $jsFiles[] = 'plugins/SelfEsteem/javascripts/init.js';
    }

    public function addJsGlobalVariables(&$out) {
        $settings = new SystemSettings();
        $platform = $settings->platform->getValue();
        $out .= "piwik.platform = '$platform';\n";
        $url = $settings->URL->getValue();
        $out .= "piwik.url = '$url';\n";
        $siteId = $settings->siteId->getValue();
        $out .= "piwik.siteId = '$siteId';\n";
    }
}
