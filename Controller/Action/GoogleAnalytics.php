<?php
/**
 * Google Analytics Init
 *
 * @author Sergio Rinaudo
 */
class Razor_Controller_Plugin_GoogleAnalytics extends Zend_Controller_Plugin_Abstract
{
    /**
     * Pre dispatch hook
     *
     * @return void
     */
    public function postDispatch( Zend_Controller_Request_Abstract $request )
    {
    	$view = Zend_Controller_Front::getInstance()->getParam( 'bootstrap' )->getResource( 'view' );
    	
    	if( !$view->google_analytics_enabled ) return false;
    	
        $view->inlineScript()->appendScript("
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '" . $view->google_analytics_account . "']);
			_gaq.push(['_setDomainName', '" . $view->google_analytics_domain . "']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		");
    }
}