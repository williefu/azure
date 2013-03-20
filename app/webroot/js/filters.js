'use strict';

angular.module('originApp.filters', [])
	.filter('createAlias', function() {
		return function(input) {
			if(input) return input.replace(/ /g,'-').toLowerCase();
		}
	});


/*
'use strict';

angular.module('originApp.filters', [])
	.filter('dateFormat', function () {
		return function (date, type) {
			if($j.datepicker.parseDate('mm/dd/yy', date)) return $j.datepicker.formatDate(type, $j.datepicker.parseDate('mm/dd/yy', date));
        };
    });
*/