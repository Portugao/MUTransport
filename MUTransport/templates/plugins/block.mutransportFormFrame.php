<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2007, PostNuke Development Team
 * @link http://www.postnuke.com
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Generated_Modules
 * @subpackage MUTransport
 * @author Michael Ueberschaer
 * @url mu-t-beratung.de
 */

/*
 * generated at Sat Dec 12 18:12:57 CET 2009 by ModuleStudio 0.4.3 (http://modulestudio.de)
 */

require_once 'system/pnForm/plugins/function.pnformvalidationsummary.php';

class mutransportFormFrame extends pnFormPlugin
{
    var $useTabs;
    var $cssClass = 'tabs';

    // Plugins MUST implement this function as it is stated here.
    // The information is used to re-establish the plugins on postback.
    function getFilename()
    {
        return __FILE__;
    }

    function create(&$render, &$params)
    {
        $this->useTabs = (array_key_exists('useTabs', $params) ? $params['useTabs'] : false);
    }


    // This is called by the framework before the content of the block is rendered
    function renderBegin(&$render)
    {
        $tabClass = $this->useTabs ? ' '.$this->cssClass : '';
        return "<div class=\"mutransportForm{$tabClass}\">\n";
    }

    // This is called by the framework after the content of the block is rendered
    function renderEnd(&$render)
    {
        return "</div>\n";
    }
}

/**
 * The mutransportFormFrame plugin adds styling <div> elements and a validation summary.
 *
 * Available parameters:
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *
 * @param        array       $params       All attributes passed to this function from the template
 * @param        string      $content      The content of the block
 * @param        object      &$render     Reference to the Smarty object
 * @return       string      The output of the plugin
 */
function smarty_block_mutransportFormFrame($params, $content, &$render)
{
    // As with all pnForms plugins, we must remember to register our plugin.
    // In this case we also register a validation summary so we don't have to
    // do that explicitively in the templates.

    // We need to concatenate the output of boths plugins.
    $result = $render->pnFormRegisterPlugin('pnFormValidationSummary', $params);
    $result .= $render->pnFormRegisterBlock('mutransportFormFrame', $params, $content);

    return $result;
}