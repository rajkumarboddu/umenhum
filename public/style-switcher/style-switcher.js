/*
 * Style Switcher
 * Copyright 2015 8Guild.com
 */
 /* ╔══╗╔═══╗╔╗╔╗╔══╗╔╗──╔══╗
  	║╔╗║║╔══╝║║║║╚╗╔╝║║──║╔╗╚╗
  	║╚╝║║║╔═╗║║║║─║║─║║──║║╚╗║
  	║╔╗║║║╚╗║║║║║─║║─║║──║║─║║
  	║╚╝║║╚═╝║║╚╝║╔╝╚╗║╚═╗║╚═╝║
  	╚══╝╚═══╝╚══╝╚══╝╚══╝╚═══╝
*/

jQuery(document).ready(function($) {
	'use strict';

	$('.style-switcher-toggle').on('click', function(){
		$(this).addClass('collapsed');
		$('.style-switcher').addClass('expanded');
	});

	$('.close-switcher').on('click', function(){
		$('.style-switcher').removeClass('expanded');
		setTimeout(function(){
			$('.style-switcher-toggle').removeClass('collapsed');
		}, 500);
	});

});/*Document Ready End*/