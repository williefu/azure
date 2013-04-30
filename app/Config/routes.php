<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));


/**
* Origin - Enable REST API
*/
	Router::mapResources('creator');
	Router::parseExtensions();
	
/**
* Origin
*/

//USER MANAGEMENT - TEMP
Router::connect('/administrator/accessDenied', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'accessDenied'));
Router::connect('/administrator/activatePassword/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'activatePassword'));
Router::connect('/administrator/addGroup', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'addGroup'));
Router::connect('/administrator/addUser', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'addUser'));
Router::connect('/administrator/allGroups', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'index'));
//Router::connect('/administrator/allUsers', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index'));
//Router::connect('/administrator/changePassword', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'changePassword'));
Router::connect('/administrator/changeUserPassword/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'changeUserPassword'));
//Router::connect('/administrator/dashboard', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'dashboard'));
Router::connect('/administrator/deleteGroup/*', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'deleteGroup'));
Router::connect('/administrator/deleteUser/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'deleteUser'));
Router::connect('/administrator/editGroup/*', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'editGroup'));
//Router::connect('/administrator/editUser/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'editUser'));
Router::connect('/administrator/emailVerification', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'emailVerification'));
Router::connect('/administrator/forgotPassword', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'forgotPassword'));
Router::connect('/administrator/login', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'login'));
Router::connect('/administrator/logout', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'logout'));
Router::connect('/administrator/myprofile', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'myprofile'));
//Router::connect('/administrator/permissions', array('plugin' => 'usermgmt', 'controller' => 'user_group_permissions', 'action' => 'index'));
Router::connect('/administrator/register', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'register'));
Router::connect('/administrator/update_permission', array('plugin' => 'usermgmt', 'controller' => 'user_group_permissions', 'action' => 'update'));
Router::connect('/administrator/userVerification/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'userVerification'));
Router::connect('/administrator/viewUser/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'viewUser'));


//SYSTEMS
Router::connect('/administrator/dashboard', array('controller' => 'origin', 'action' => 'dashboard'));
Router::connect('/administrator/dashboard/access', array('plugin' => 'usermgmt', 'controller' => 'user_group_permissions', 'action' => 'index'));
Router::connect('/administrator/dashboard/profile/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'editUser'));
Router::connect('/administrator/dashboard/password', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'changePassword'));
Router::connect('/administrator/dashboard/users', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index'));
Router::connect('/administrator/dashboard/templates', array('controller'=>'origin', 'action'=>'templateList'));
Router::connect('/administrator/dashboard/components', array('controller'=>'origin', 'action'=>'componentList'));

//Router::connect('/administrator/Origin/templates', array('controller'=>'origin', 'action'=>'jsonTemplate'));
//Router::connect('/administrator/Origin/template/:template_id', array('controller'=>'origin', 'action'=>'jsonAdTemplate'));


//REST APIs
//Router::connect('/administrator/users/status', array('controller' => 'origin', 'action' => 'dashboardUserStatus'));
Router::connect('/administrator/Origin/Post', array('controller'=>'origin', 'action'=>'post'));
Router::connect('/administrator/Origin/upload', array('controller'=>'origin', 'action'=>'upload'));


//JSON Feeds
Router::connect('/administrator/get/ads', array('controller'=>'origin', 'action'=>'jsonList'));
Router::connect('/administrator/get/ad/:originAd_id', array('controller'=>'origin', 'action'=>'jsonAdUnit'));
Router::connect('/administrator/get/components', array('controller'=>'origin', 'action'=>'jsonComponent'));
Router::connect('/administrator/get/components/:component', array('controller'=>'origin', 'action'=>'loadComponent'));
Router::connect('/administrator/get/demo/:originAd_id', array('controller'=>'origin', 'action'=>'jsonDemo'));
Router::connect('/administrator/get/library/:originAd_id', array('controller'=>'origin', 'action'=>'jsonLibrary'));
Router::connect('/administrator/get/templates', array('controller'=>'origin', 'action'=>'jsonTemplate'));
Router::connect('/administrator/get/template/:template_id', array('controller'=>'origin', 'action'=>'jsonAdTemplate'));
Router::connect('/administrator/get/users', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index'));
Router::connect('/administrator/get/monitor/list', array('controller' => 'monitor', 'action' => 'jsonList'));
Router::connect('/administrator/get/monitor/list/:start_date/:end_date/:category', array('controller' => 'monitor', 'action' => 'jsonList'));
Router::connect('/administrator/get/monitor/event/:category', array('controller' => 'monitor', 'action' => 'jsonEvent'));
Router::connect('/administrator/get/monitor/visits', array('controller' => 'monitor', 'action' => 'jsonVisits'));
Router::connect('/administrator/get/monitor/visits/:start_date/:end_date/:category', array('controller' => 'monitor', 'action' => 'jsonVisits'));
Router::connect('/administrator/get/sites', array('controller'=>'origin', 'action'=>'jsonSite'));
//Router::connect('/administrator/get/monitor/export/:data', array('controller'=>'monitor', 'action'=>'monitorExport'));

//DEMO
Router::connect('/administrator/get/templates/:template', array('controller'=>'origin', 'action'=>'demoLoadTemplate'));
Router::connect('/administrator/demos', array('controller'=>'origin', 'action'=>'demoList'));
Router::connect('/administrator/demo/:originAd_id', array('controller'=>'origin', 'action'=>'demoEdit'));
Router::connect('/administrator/dashboard/sites', array('controller'=>'origin', 'action'=>'siteList'));
Router::connect('/demo/Origin/:originAd_id', array('controller'=>'origin', 'action'=>'demoOrigin'));
Router::connect('/demo/:alias', array('controller'=>'origin', 'action'=>'demo'));

//AD CREATOR
Router::connect('/administrator', array('controller'=>'origin', 'action'=>'index'));
Router::connect('/administrator/list', array('controller'=>'origin', 'action'=>'ad_list'));
Router::connect('/administrator/Origin/ad/edit/:originAd_id', array('controller'=>'origin', 'action'=>'edit'));

//AD
Router::connect('/ad/:originAd_id/:originAd_platform', array('controller'=>'origin', 'action'=>'ad'));

//Analytics
Router::connect('/administrator/analytics', array('controller'=>'monitor', 'action'=>'monitor'));
Router::connect('/administrator/Monitor/Post', array('controller'=>'monitor', 'action'=>'post'));
//Router::connect('/administrator/Monitor/export/:data', array('controller'=>'monitor', 'action'=>'monitorExport'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
