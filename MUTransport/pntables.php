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

/**
 * Populate pntables array for MUTransport module
 *
 * This function is called internally by the core whenever the module is
 * loaded. It delivers the table information to the core.
 * It can be loaded explicitly using the pnModDBInfoLoad() API function.
 *
 * @author       Michael Ueberschaer
 * @return       array       The table information.
 */
function MUTransport_pntables()
{
    // Initialise table array
    $pntable = array();

    $dbdriver = DBConnectionStack::getConnectionDBDriver();


    /*
     * definitions for modul table
     */

    // set the table name combined with prefix
    $pntable['mutransport_modul'] = DBUtil::getLimitedTablename('mutransport_modul');

    // set the column names
    $columns = array(
        'modulid' => 'pn_modulid',
        'name' => 'pn_name',
        'state' => 'pn_state');
    $pntable['mutransport_modul_column'] = $columns;

    // set the data dictionary for the table columns
    $columnDef = array(
        'modulid' => "I AUTO PRIMARY",
        'name' => "C(50) NOTNULL DEFAULT ''",
        'state' => "C(40) NOTNULL DEFAULT ''");
    $pntable['mutransport_modul_column_def'] = $columnDef;

    // DEBUG: object extension aspect starts


    $pntable['mutransport_modul_primary_key_column'] = 'modulid';
    // disable categorization services
    $pntable['mutransport_modul_db_extra_enable_categorization'] = false;

    // enable attribution services
    $pntable['mutransport_modul_db_extra_enable_attribution'] = true;

    // disable meta data
    $pntable['mutransport_modul_db_extra_enable_meta'] = false;

    // disable logging services
    $pntable['mutransport_modul_db_extra_enable_logging'] = false;

    // DEBUG: object extension aspect ends





    /*
     * definitions for page table
     */

    // set the table name combined with prefix
    $pntable['mutransport_page'] = DBUtil::getLimitedTablename('mutransport_page');

    // set the column names
    $columns = array(
        'id'  => 'pn_id',
        'pageid' => 'pn_pageid',
        'title' => 'pn_title',
        'text' => 'pn_text',
        'number_characters' => 'pn_number_characters',
        'transport' => 'pn_transport',
        'modulid' => 'pn_modulid');
    $pntable['mutransport_page_column'] = $columns;

    // set the data dictionary for the table columns

    $textType = 'X';

    $dbType = DBConnectionStack::getConnectionDBType();
    if ($dbType == 'mssql') { // mssql can't sort on fields of type text
        $textType = 'C(8000)';
    }

    $columnDef = array(
        'id'  => "I AUTO PRIMARY",
        'pageid' => "I (4)NOTNULL DEFAULT '0'",
        'title' => "C(50) NOTNULL DEFAULT ''",
        'text' => "$textType NOTNULL DEFAULT ''",
        'number_characters' => "I(4) NOTNULL DEFAULT '0'",
        'transport' => "I(3) NOTNULL DEFAULT '0'",
        'modulid' => "I(4) NOTNULL DEFAULT '0'");
    $pntable['mutransport_page_column_def'] = $columnDef;

    // DEBUG: object extension aspect starts


    $pntable['mutransport_page_primary_key_column'] = 'id';
    // disable categorization services
    $pntable['mutransport_page_db_extra_enable_categorization'] = false;

    // enable attribution services
    $pntable['mutransport_page_db_extra_enable_attribution'] = true;

    // disable meta data
    $pntable['mutransport_page_db_extra_enable_meta'] = false;

    // disable logging services
    $pntable['mutransport_page_db_extra_enable_logging'] = false;

    // DEBUG: object extension aspect ends
    
// tables for other cms    
    /*
     * definitions for content table
     */

    // set the table name combined with prefix
    $pntable['mutransport_cms_content'] = DBUtil::getLimitedTablename('mutransport_cms_content');

    // set the column names
    $columns = array(
        'id'  => 'pn_id',
        'content' => 'pn_content',
        'number_characters' => 'pn_number_characters');
        
    $pntable['mutransport_cms_content_column'] = $columns;

    // set the data dictionary for the table columns



    $columnDef = array(
        'id'  => "I AUTO PRIMARY",
        'content' => "C(50) NOTNULL DEFAULT ''",
        'number_characters' => "I(4) NOTNULL DEFAULT '0'");
    $pntable['mutransport_cms_content_column_def'] = $columnDef;

    // DEBUG: object extension aspect starts


    $pntable['mutransport_cms_content_primary_key_column'] = 'id';
    // disable categorization services
    $pntable['mutransport_cms_content_db_extra_enable_categorization'] = false;

    // enable attribution services
    $pntable['mutransport_cms_content_db_extra_enable_attribution'] = true;

    // disable meta data
    $pntable['mutransport_cms_content_extra_enable_meta'] = false;

    // disable logging services
    $pntable['mutransport_cms_content_extra_enable_logging'] = false;

    // DEBUG: object extension aspect ends

    // return table data
    return $pntable;
}
