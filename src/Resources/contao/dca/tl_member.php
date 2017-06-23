<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Liplex Webprogrammierung und -design Christian Kolb 2011 
 * @author     Christian Kolb 
 * @license    LGPL 
 */

/**
 * Configuration
 */
$GLOBALS['TL_DCA']['tl_member']['config']['ctable'][] = 'tl_address';

/**
 * Operations
 */
$GLOBALS['TL_DCA']['tl_member']['list']['operations']['addresses'] = array
(
	'label'               => &$GLOBALS['TL_LANG']['tl_member']['addresses'],
	'href'                => 'table=tl_address',
	'icon'                => 'system/modules/addresses/assets/addressbook.png',
);