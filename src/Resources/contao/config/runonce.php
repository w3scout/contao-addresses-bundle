<?php

/**
 * addresses
 * Module for Contao Open Source CMS (contao.org)
 *
 * Copyright (c) 2017 Darko Selesi
 *
 * @package addresses
 * @author  Darko Selesi
 * @link    http://w3scouts.com
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


if(class_exists('\\W3Scout\\Addresses\\UpgradeHelper'))
{
    \W3Scout\Addresses\UpgradeHelper::run();
}