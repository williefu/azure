//var originIframe 	= 'http://' + document.referrer.split('/')[2] + '/emcOriginIframe/emcOriginIframe.html';
var originScript	= document.getElementsByTagName('script')[document.getElementsByTagName('script').length - 1];
var originParams = {
	'init':		originScript.getAttribute('data-init'),
	'auto':		originScript.getAttribute('data-auto'),
	'close':	originScript.getAttribute('data-close'),
	'hover':	originScript.getAttribute('data-hover'),
	'bg':		originScript.getAttribute('data-bg'),
	'type':		originScript.getAttribute('data-type'),
	'id':		originScript.getAttribute('data-id'),
	'src':		'http://local.evolveorigin/ad/'+originScript.getAttribute('data-id')+'/Desktop',
	'originDomain':originScript.getAttribute('data-domain'),
	'xdSource':	document.location.href
};
var originXd	= (originScript.getAttribute('data-debug') === 'true')? 'http://'+originParams.originDomain+'/js/ad/origin-xd.js':'http://'+originParams.originDomain+'/min-js?f=/js/ad/origin-xd.js';

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
					
					//document.body.appendChild(originCSS);
					break;
				case 'nova':
					//Prep triggered overlay iframe
					var adOverlay 				= document.createElement('iframe');
						adOverlay.name			= encodeURIComponent(JSON.stringify(originParams));
						adOverlay.id			= 'originAd-'+originParams.id+'-overlay';
						adOverlay.frameBorder	= 0;
						adOverlay.width			= 0;
						adOverlay.height		= 0;
						adOverlay.scrolling 	= 'no';
						adOverlay.style.position= 'fixed';
						adOverlay.style.top 	= 0;
						adOverlay.style.left	= 0;
						adOverlay.style.zIndex	= 10000000;
						adOverlay.name			= encodeURIComponent(JSON.stringify(originParams));
						adOverlay.setAttribute('data-src', originParams.src+'/triggered');
					
					originScript.parentNode.insertBefore(ad, originScript);
					originScript.parentNode.insertBefore(adOverlay, originScript);
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
				originScriptXd.setAttribute('data-domain', originParams.originDomain);
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

//Is this condition needed anymore?
if(originParams.init === 'true') origin.init();