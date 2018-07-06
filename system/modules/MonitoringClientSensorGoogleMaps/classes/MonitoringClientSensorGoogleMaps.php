<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2017 Leo Feyer
 *
 * @package     Monitoring
 * @author      trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license     LGPL-3.0-or-later
 * @copyright   trilobit GmbH
 */


/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace Monitoring;

/**
 * Class MonitoringClientSensorGoogleMaps
 * Special sensor for the MonitoringClient to read the Google Maps data (tl_dlh_googlemaps).
 * @package Monitoring
 *
 * @author trilobit GmbH <https://github.com/trilobit-gmbh>
 */
class MonitoringClientSensorGoogleMaps extends \Backend
{
    /**
    * Constructor
    */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get the data from the client.
     * @param $arrData
     * @return mixed
     */
    public function readData($arrData)
    {
        $intMapCount = 0;
        $strMapApi = '';

        $arrData['googlemaps.installed'] = 'ERROR';
        $arrData['googlemaps.count']     = $intMapCount;
        $arrData['googlemaps.api']       = $strMapApi;

        // installed?
        if (empty($GLOBALS['BE_MOD']['content']['dlh_googlemaps']))
        {
            return $arrData;
        }

        $objDatabase = \Database::getInstance();

        // get page fields
        $arrFieldsPage = $objDatabase->getFieldNames('tl_page');

        // count avaiable maps
        $intMapCount = $objDatabase
            ->prepare("SELECT id FROM tl_dlh_googlemaps")
            ->execute()
            ->count();

        $strQuery = 'alias,dns,language';

        // get api keys
        if (array_search('dlh_googlemaps_apikey', $arrFieldsPage) !== false)
        {
            $strQuery .= ',dlh_googlemaps_apikey';
        }

        $arrPageData = $objDatabase
            ->prepare("SELECT $strQuery FROM tl_page WHERE pid=0")
            ->execute()
            ->fetchAllAssoc();


        foreach ($arrPageData as $key => $value)
        {
            if (   strtolower($value['alias']) === 'system'
                || preg_match('/trilobit.contao.basic.installation/', strtolower($value['dns']))
            )
            {
                continue;
            }

            if ($value['dns'] === '')
            {
                $value['dns'] = '[' . $value['language'] . ']';
            }

            $strMapApi .= '<b>' .  $value['dns'] . ($value['dns'] !== '[' . $value['language'] . ']' ? ' [' . $value['language'] . ']' : '') . '</b><br>'
                . (empty($value['dlh_googlemaps_apikey']) ? '-/-' : $value['dlh_googlemaps_apikey'])
                ;

            if ($key < count($arrPageData) - 1)
            {
                $strMapApi .= '|';
            }
        }

        $arrData['googlemaps.installed'] = ($intMapCount > 0 ? 'OKAY' : 'ERROR');
        $arrData['googlemaps.count']     = $intMapCount;
        $arrData['googlemaps.api']       = $strMapApi;

        return $arrData;
    }
}
