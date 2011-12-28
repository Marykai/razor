<?php
/**
 * Google Analytics management resource
 * 
 * @author Sergio Rinaudo
 */
class Razor_Application_Resource_Ga 
	extends Zend_Application_Resource_ResourceAbstract
{
	/**
	 * Init
	 * 
	 * @return void
	 */
	public function init() 
	{
		$view = $this->getBootstrap()->getResource('view');
		 
    	$options = $this->getOptions();
    	
    	if( !isset( $options['enabled'] ) ) {
    		throw new Zend_Application_Resource_Exception( 'GoogleAnalytics enabled param is not set, check application.ini for resources.GoogleAnalytics.enabled' );
    	}
    	
    	$view->google_analytics_enabled = (bool)$options['enabled'];
    	if( !$options['enabled'] ) return false;
	
    	if( !isset( $options['account'] ) || empty( $options['account'] ) ) {
    		throw new Zend_Application_Resource_Exception( 'GoogleAnalytics account param is not set, check application.ini for resources.GoogleAnalytics.account' );
    	}
    	
    	if( !isset( $options['domain'] ) || empty( $options['domain'] ) ) {
    		throw new Zend_Application_Resource_Exception( 'GoogleAnalytics domain param is not set, check application.ini for resources.GoogleAnalytics.domain' );
    	}
    	
    	$view->google_analytics_account = $options['account'];
    	$view->google_analytics_domain = $options['domain'];
	}
}