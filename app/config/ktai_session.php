<?php
/**
 * Ktai library, supports Japanese mobile phone sites coding.
 * It provides many functions such as a carrier check to use Referer or E-mail, 
 * conversion of an Emoji, and more.
 *
 * PHP versions 4 and 5
 *
 * Ktai Library for CakePHP1.2
 * Copyright 2009-2010, ECWorks.
 
 * Licensed under The GNU General Public Licence
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright		Copyright 2009-2010, ECWorks.
 * @link			http://www.ecworks.jp/ ECWorks.
 * @version			0.3.2
 * @lastmodified	$Date: 2010-05-17 14:00:00 +0900 (Mon, 17 May 2010) $
 * @license			http://www.gnu.org/licenses/gpl.html The GNU General Public Licence
 */

//Replacement function ini_set('session.use_trans_sid')
//
if(!defined('__KTAI_SESSION__')){
	define('__KTAI_SESSION__', 1);
	function session_use_trans_sid($flag){
		if(ini_set('session.use_trans_sid', $flag) === false){
			if($flag){
				$session_name = session_name();
				if(isset($_REQUEST[$session_name]) && preg_match('/^\w+$/', $_REQUEST[$session_name])){
					session_id($_REQUEST[$session_name]);
					output_add_rewrite_var($session_name, $_REQUEST[$session_name]);
				}
			}
		}
	}
}

//Get Lib3gk instance.
//
if(!class_exists('lib3gk')){
	require_once(VENDORS.'ecw'.DS.'lib3gk.php');
}
$ktai = Lib3gk::get_instance();

if(!isset($ktai->_params['session_save'])){
	$ktai->_params['session_save'] = 'php';
}
Configure::write('Session.save', $ktai->_params['session_save']);

if(!isset($ktai->_params['imode_session_name'])){
	$ktai->_params['imode_session_name'] = 'csid';
}
if($ktai->is_imode()){
	Configure::write('Session.cookie', $ktai->_params['imode_session_name']);
}

//Session settings.
//
if(version_compare(Configure::version(), '1.3') < 0){
	include(VENDORS.'ecw'.DS.'session'.DS.'ktai_session_12.php');
}else{
	include(VENDORS.'ecw'.DS.'session'.DS.'ktai_session_13.php');
}

//iMODE session settings.
//
if($ktai->is_imode()){
	
	ini_set('session.use_only_cookies', 0);
	$this->_userAgent = '';
	if(Configure::read('Security.level') == 'high'){
		Configure::write('Security.level', 'medium');
	}
	
	ini_set('url_rewriter.tags', 'a=href,area=href,frame=src,input=src,form=fakeentry,fieldset=');
	session_use_trans_sid(1);
}
