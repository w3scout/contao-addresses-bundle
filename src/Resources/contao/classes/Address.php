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
 * @author     Christian Kolb <info@liplex.de>
 * @author     Darko Selesi <hallo@w3scouts.com> (from 
 * @license    LGPL
 */

namespace W3Scout\Addresses;


class Address extends \Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->import('Database');
	}

	public function renderLabel($arrAddress)
	{
		$image = $arrAddress['isPrivateAddress'] ? '<img src="system/modules/addresses/assets/private.png" style="vertical-align:-3px;" alt="'.$GLOBALS['TL_LANG']['tl_address']['isPrivateAddress'][0].'" title="'.$GLOBALS['TL_LANG']['tl_address']['isPrivateAddress'][0].'" /> ' : '<img src="system/modules/addresses/assets/business.png" style="vertical-align:-3px;" alt="'.$GLOBALS['TL_LANG']['tl_address']['business_address'].'" title="'.$GLOBALS['TL_LANG']['tl_address']['business_address'].'" /> ';
		$image .= $arrAddress['isDefaultAddress'] ? '<img src="system/modules/addresses/assets/default_address.png" style="vertical-align:-3px;" alt="'.$GLOBALS['TL_LANG']['tl_address']['isDefaultAddress'][0].'" title="'.$GLOBALS['TL_LANG']['tl_address']['isDefaultAddress'][0].'" /> ' : '';
		$image .= $arrAddress['isBillingAddress'] ? '<img src="system/modules/addresses/assets/billing.png" style="vertical-align:-3px;" alt="'.$GLOBALS['TL_LANG']['tl_address']['isBillingAddress'][0].'" title="'.$GLOBALS['TL_LANG']['tl_address']['isBillingAddress'][0].'" /> ' : '';
		return $image.$arrAddress['firstname']." ".$arrAddress['lastname']." - ".$arrAddress['email']."";
	}

	public function updateDefaultAddress($dc)
	{
		if (\Input::post('isDefaultAddress'))
		{
			// Get current address to get pid
			$address = $this->Database->prepare("SELECT pid FROM tl_address WHERE id = ?")->execute($dc->id);
			$memberId = $address->pid;
			// Reset default address in all addresses of the current member
			$this->Database->prepare("UPDATE tl_address SET isDefaultAddress = '0' WHERE pid = '".$memberId."' AND NOT id = '".$dc->id."'")->execute();

			$firstname  = \Input::post('firstname');
			$lastname   = \Input::post('lastname');
			$company    = \Input::post('company');
			$street     = \Input::post('street');
			$postal     = \Input::post('postal');
			$city       = \Input::post('city');
			$state      = \Input::post('state');
			$country    = \Input::post('country');
			$email      = \Input::post('email');
			$phone      = \Input::post('phone');
			$mobile     = \Input::post('mobile');
			$fax        = \Input::post('fax');
			$website    = \Input::post('website');

			$this->Database->prepare("UPDATE tl_member
                                      SET firstname = '".$firstname."',
                                          lastname = '".$lastname."',
                                          company = '".$company."',
                                          street = '".$street."',
                                          postal = '".$postal."',
                                          city = '".$city."',
                                          state = '".$state."',
                                          country = '".$country."',
                                          email = '".$email."',
                                          phone = '".$phone."',
                                          mobile = '".$mobile."',
                                          fax = '".$fax."',
                                          website = '".$website."'
                                      WHERE id = ?")->execute($memberId);
		}
	}
}
