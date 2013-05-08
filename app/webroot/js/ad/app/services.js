'use strict';

angular.module('originAd.services', [])
	.factory('serviceAnalytics', function() {
		return {
			track: function(type, data) {
				if(typeof(_gaq) !== 'undefined') {
					//_gaq.push(['_trackEvent', document.title+' [OriginID: ]', type]);
				}
			}
		}
	})
	.factory('serviceFrequency', function() {
		return {
			init: function(cookieName) {
				/**
				* Sets cookie if unavailable
				* Returns frequency value in cookie
				*/
				if(!this.get(cookieName)) {
					this.set(cookieName, 0, false);
				}
				
				return this.get(cookieName);
			},
			check: function(cookieName, frequency) {
				if(frequency > this.init(cookieName)) {
					var newValue	= this.init(cookieName) + 1;
					this.set(cookieName, newValue, true);
					return true;
				} else {
					return false;	
				}
				
			/*
			$scope.frequency = function() {
				if($scope.originParams.auto > serviceFrequency.init($scope.originAd_id)) {
				 	$scope.xdData.autoOpen	= true;
				 	var newValue			= serviceFrequency.init($scope.originAd_id) + 1;
				 	serviceFrequency.set($scope.originAd_id, newValue, true);
				 	//Increment cookie counter
				} else {
					$scope.xdData.autoOpen	= false;
				}
			}
			*/	
			},
			get: function(cookieName) {
				return CM.get(cookieName);
			},
			set: function(cookieName, value, overwrite) {
				if(overwrite) {
					CM.set(cookieName, value);
				} else {
					var date 	= new Date(),
						expire 	= new Date(date.getTime() + 24 * 60 * 60 * 1000);
					CM.set(cookieName, value, expire);
				}
			},
			unset: function(cookieName) {
				CM.unset(cookieName);
			}
		}
	});