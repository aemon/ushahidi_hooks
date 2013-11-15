<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Front-End Nav helper class.
 *
 * @package    Nav
 * @author     Ushahidi Team
 * @copyright  (c) 2008 Ushahidi Team
 * @license    http://www.ushahidi.com/license.html
 */
class nav_Core {
	
	/**
	 * Generate Main Tabs
     * @param string $this_page
     * @param array $dontshow
     */
	public static function main_tabs($this_page = FALSE, $dontshow = FALSE)
	{
		$menu_items = array();

		if( ! is_array($dontshow))
		{
			// Set $dontshow as an array to prevent errors
			$dontshow = array();
		}
		
		// Home
		if( ! in_array('home',$dontshow))
		{
			$menu_items[] = array( 
				'page' => 'home',
				'url' => url::site('main'),
				'name' => Kohana::lang('ui_main.home')
			);
		}

		// Reports List
		if( ! in_array('reports',$dontshow))
		{
			$menu_items[] = array( 
				'page' => 'reports',
				'url' => url::site('reports'),
				'name' => Kohana::lang('ui_main.reports')
			);
		 }
		
		// Reports Submit
		if( ! in_array('reports_submit',$dontshow))
		{
			if (Kohana::config('settings.allow_reports'))
			{
				$menu_items[] = array( 
					'page' => 'reports_submit',
					'url' => url::site('reports/submit'),
					'name' => Kohana::lang('ui_112.submit')
				);
			}
		}
		
		// Alerts
		if(! in_array('alerts',$dontshow))
		{
			if(Kohana::config('settings.allow_alerts'))
			{
				$menu_items[] = array( 
					'page' => 'alerts',
					'url' => url::site('alerts'),
					'name' => Kohana::lang('ui_main.alerts')
				);
			}
		}
		
		// Contacts
		if( ! in_array('contact',$dontshow))
		{
			if (Kohana::config('settings.site_contact_page') AND Kohana::config('settings.site_email') != "")
			{
				$menu_items[] = array( 
					'page' => 'contact',
					'url' => url::site('contact'),
					'name' => Kohana::lang('ui_main.contact')
				);	
			}
		}
		
		// Custom Pages
		
		if( ! in_array('pages',$dontshow))
		{
			$pages = ORM::factory('page')->where('page_active', '1')->find_all();
			foreach ($pages as $page)
			{
				if( ! in_array('page/'.$page->id,$dontshow))
				{
					$menu_items[] = array( 
						'page' => 'page_'.$page->id,
						'url' => url::site('page/index/'.$page->id),
						'name' => $page->page_tab
					);
				}
			}
		}

		Event::run('ushahidi_filter.nav_main_tabs', $menu_items);

		foreach( $menu_items as $item )
		{
			$active = ($this_page == $item['page']) ? ' class="active"' : '';
			echo '<li><a href="'.$item['url'].'"'.$active.'>'.$item['name'].'</a></li>';
		}

		// Action::nav_admin_reports - Add items to the admin reports navigation tabs
		Event::run('ushahidi_action.nav_main_top', $this_page);
	}
	
















	public static function main_tabs_112($this_page = FALSE, $dontshow = FALSE)
	{
		$menu_items = array();

		if( ! is_array($dontshow))
		{
			// Set $dontshow as an array to prevent errors
			$dontshow = array();
		}
		
		// Home
		if( ! in_array('home',$dontshow))
		{
			$menu_items[] = array( 
				'page' => 'home',
				'url' => 'http://112.ua',
				'name' => Kohana::lang('ui_main.home')
			);
		}

		// Reports List
		if( ! in_array('reports',$dontshow))
		{
			$menu_items[] = array( 
				'page' => 'reports',
				'url' => url::site('reports'),
				'name' => Kohana::lang('ui_main.reports')
			);
		 }
		
		// Reports Submit
		if( ! in_array('reports_submit',$dontshow))
		{
			if (Kohana::config('settings.allow_reports'))
			{
				$menu_items[] = array( 
					'page' => 'reports_submit',
					'url' => url::site('reports/submit'),
					'name' => Kohana::lang('ui_main.submit')
				);
			}
		}
		
		// add VIDEO page [link to 112.ua/video]

				$menu_items[] = array( 
					'page' => 'video',
					'url' => 'http://112.ua/video',
					'name' => Kohana::lang('ui_112.menu_video')
				);

		// add PHOTO page [link to 112.ua/photo]

				$menu_items[] = array( 
					'page' => 'photo',
					'url' => 'http://112.ua/photo',
					'name' => Kohana::lang('ui_112.menu_photo')
				);


		// add MAP page [internal controller karta.php]

				$menu_items[] = array( 
					'page' => 'karta',
					'url' => url::site('karta'),
					'name' => Kohana::lang('ui_112.menu_karta')
				);

		// add 112-LIVE page [link to portal.112.ua/112-live]

				$menu_items[] = array( 
					'page' => '112-live',
					'url' => 'http://112.ua/112-live',
					'name' => Kohana::lang('ui_112.menu_112_live')
				);


		Event::run('ushahidi_filter.nav_main_tabs', $menu_items);

		foreach( $menu_items as $item )
		{
			$active = ($this_page == $item['page']) ? ' class="active"' : '';
			$red = ("112-live" == $item['page']) ? ' class="live-112"' : '';
			//echo '<li><a href="'.$item['url'].'"'.$active.'>'.$item['name'].'</a></li>';
			echo '<li '.$red.'><a href="'.$item['url'].'"'.$active.'>'.$item['name'].'</a></li>';
		}

		// Action::nav_admin_reports - Add items to the admin reports navigation tabs
		Event::run('ushahidi_action.nav_main_top', $this_page);
	}






///////////////////////////////////////////////////////////////////////////////////////////////


public static function submenu_tabs_112($this_page = FALSE, $dontshow = FALSE)
	{
		$sub_menu_items = array();


		// add FEEDBACK page [internal controller karta.php]

				$sub_menu_items[] = array( 
					'page' => 'mainnews',
					'url' => url::site('contact'),
					'name' => Kohana::lang('ui_112.submenu_main')
				);

		// add CONTACTS page [link to 112.ua/contacts]

				$sub_menu_items[] = array( 
					'page' => 'politic',
					'url' => 'http://112.ua/contacts',
					'name' => Kohana::lang('ui_112.submenu_politic')
				);

		// add REKLAMA page [link to 112.ua/reklama]

				$sub_menu_items[] = array( 
					'page' => 'economic',
					'url' => 'http://112.ua/reklama',
					'name' => Kohana::lang('ui_112.submenu_economic')
				);

		// add COPYRIGHT page [link to 112.ua/copyright]

				$sub_menu_items[] = array( 
					'page' => 'ukraine',
					'url' => 'http://112.ua/copyright',
					'name' => Kohana::lang('ui_112.submenu_ukraine')
				);

		// add CONFIDENT page [link to 112.ua/confident]

				$sub_menu_items[] = array( 
					'page' => 'world',
					'url' => 'http://112.ua/confident',
					'name' => Kohana::lang('ui_112.submenu_world')
				);

		// add HELP page [link to 112.ua/help]

				$sub_menu_items[] = array( 
					'page' => 'dtp',
					'url' => 'http://112.ua/help',
					'name' => Kohana::lang('ui_112.submenu_dtp')
				);

		// add CONTACTS page [link to 112.ua/logo]

				$sub_menu_items[] = array( 
					'page' => 'crime',
					'url' => 'http://112.ua/logo',
					'name' => Kohana::lang('ui_112.submenu_crime')
				);

		Event::run('ushahidi_filter.nav_main_tabs', $sub_menu_items);

		foreach( $sub_menu_items as $item )
		{
			//$active = ($this_page == $item['page']) ? ' class="active"' : '';
			$item_no_border = ("crime" == $item['page']) ? ' class="last"' : '';
			echo '<li'.$item_no_border.'><a href="'.$item['url'].'" >'.$item['name'].'</a></li>';
		}

		// Action::nav_admin_reports - Add items to the admin reports navigation tabs
		//Event::run('ushahidi_action.nav_main_top', $this_page);
	}

//////////////////////////////////////////////////////////////////////////////////////////


public static function footer_tabs_112($this_page = FALSE, $dontshow = FALSE)
	{
		$footer_menu_items = array();


		// add FEEDBACK page [internal controller karta.php]

				$footer_menu_items[] = array( 
					'page' => 'karta',
					'url' => url::site('contact'),
					'name' => Kohana::lang('ui_112.footer_feedback')
				);

		// add CONTACTS page [link to 112.ua/contacts]

				$footer_menu_items[] = array( 
					'page' => 'contacts',
					'url' => 'http://112.ua/contacts',
					'name' => Kohana::lang('ui_112.footer_contacts')
				);

		// add REKLAMA page [link to 112.ua/reklama]

				$footer_menu_items[] = array( 
					'page' => 'reklama',
					'url' => 'http://112.ua/reklama',
					'name' => Kohana::lang('ui_112.footer_reklama')
				);

		// add COPYRIGHT page [link to 112.ua/copyright]

				$footer_menu_items[] = array( 
					'page' => 'copyright',
					'url' => 'http://112.ua/copyright',
					'name' => Kohana::lang('ui_112.footer_copyright')
				);

		// add CONFIDENT page [link to 112.ua/confident]

				$footer_menu_items[] = array( 
					'page' => 'confident',
					'url' => 'http://112.ua/confident',
					'name' => Kohana::lang('ui_112.footer_confident')
				);

		// add HELP page [link to 112.ua/help]

				$footer_menu_items[] = array( 
					'page' => 'help',
					'url' => 'http://112.ua/help',
					'name' => Kohana::lang('ui_112.footer_help')
				);

		// add CONTACTS page [link to 112.ua/logo]

				$footer_menu_items[] = array( 
					'page' => 'logo',
					'url' => 'http://112.ua/logo',
					'name' => Kohana::lang('ui_112.footer_logo')
				);

		Event::run('ushahidi_filter.nav_main_tabs', $footer_menu_items);

		foreach( $footer_menu_items as $item )
		{
			$footer_last = ("logo" == $item['page']) ? ' class="last"' : '';
			echo '<li'.$footer_last.'><a href="'.$item['url'].'" >'.$item['name'].'</a></li>';
		}

		// Action::nav_admin_reports - Add items to the admin reports navigation tabs
		//Event::run('ushahidi_action.nav_main_top', $this_page);
	}



	
}
