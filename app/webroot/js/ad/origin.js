//var originIframe 	= 'http://' + document.referrer.split('/')[2] + '/emcOriginIframe/emcOriginIframe.html';
var originScript	= document.getElementsByTagName('script')[document.getElementsByTagName('script').length - 1];
var originXd		= (originScript.getAttribute('data-debug') === 'true')? 'http://local.evolveorigin/js/ad/origin-xd.js':'http://local.evolveorigin/min-js?f=/js/ad/origin-xd.js';
var originParams = {
	'init':		originScript.getAttribute('data-init'),
	'auto':		originScript.getAttribute('data-auto'),
	'close':	originScript.getAttribute('data-close'),
	'hover':	originScript.getAttribute('data-hover'),
	'bg':		originScript.getAttribute('data-bg'),
	'type':		originScript.getAttribute('data-type'),
	'id':		originScript.getAttribute('data-id'),
	'src':		'http://local.evolveorigin/ad/'+originScript.getAttribute('data-id')+'/Desktop',
	'xdSource':	document.location.href
};

var origin = (function() {
	
	function template() {
		var ad 				= document.createElement('iframe');
			ad.name			= encodeURIComponent(JSON.stringify(originParams));
			ad.id			= 'originAd-'+originParams.id;
			ad.frameBorder	= 0;
			ad.width		= 0;
			ad.height		= 0;
			ad.scrolling 	= 'no';
			ad.src			= originParams.src;
			ad.name			= encodeURIComponent(JSON.stringify(originParams));
			
			switch(originParams.type) {
				case 'horizon':
					//originScript.parentNode.insertBefore(ad, originScript);
					document.body.insertBefore(ad, document.body.firstChild)
					
					/*
					document.body.insertBefore(ad, document.body.firstChild);
			document.body.appendChild(originCSS);
					*/
					break;
				default:
					originScript.parentNode.insertBefore(ad, originScript);
					break;
			}
	}
	
	/**
	* Adds Origin's XD listener script - Used to toggle the unit states
	*/
	function xd() {
		if(!window.top.originXdFlag) {
			var originScriptXd		= document.createElement('script');
				originScriptXd.id	= 'origin-xd';
				originScriptXd.src	= originXd;
				window.top.document.getElementsByTagName('head')[0].appendChild(originScriptXd);
		
			window.top.originXdFlag 	= true;		
		}
	}

	return {
		init: function() {
			xd();
			template();
		}
	}
})();


if(originParams.init === 'true') origin.init();