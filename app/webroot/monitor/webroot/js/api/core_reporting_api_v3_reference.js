// Simple place to store all the results before printing to the user.
var output = [];

// Initialize the UI Dates.
document.getElementById('start-date').value = lastNDays(14);
document.getElementById('end-date').value = lastNDays(0);

function makeApiCall() {
  gapi.client.analytics.data.ga.get({
    'ids': document.getElementById('table-id').value,
	'start-date': document.getElementById('start-date').value,
    'end-date': document.getElementById('end-date').value,
    /*'metrics': 'ga:visits',
    'dimensions': 'ga:source,ga:keyword',*/
	'metrics': 'ga:totalEvents,ga:uniqueEvents',
    'dimensions': 'ga:eventCategory,ga:eventAction',
    //'sort': '-ga:visits,ga:source',
	'sort': 'ga:eventCategory,-ga:totalEvents',
    //'filters': 'ga:medium==organic',
    //'max-results': 25
	'filters': 'ga:eventCategory=@SheKnows Hope Springs (245037),ga:eventCategory=@[12-3248] Assassins Creed [Horizon - DO NOT MODIFY],ga:eventCategory=@SK - Healthy Recipes - GE - 244311-143 [300x250]',
	'max-results': 500
  }).execute(handleCoreReportingResults);
}


/**
 * Handles the response from the CVore Reporting API. If sucessful, the
 * results object from the API is passed to various printing functions.
 * If there was an error, a message with the error is printed to the user.
 * @param {Object} results The object returned from the API.
 */
function handleCoreReportingResults(results) { console.log(results);
  if (!results.code) {
    outputToPage('Query Success');
    printQuery(results);
    printRows(results);
    outputToPage(output.join(''));
  } else {
    outputToPage('There was an error: ' + results.message);
  }
}

/**
 * Prints the query in the results. This query object represents the original
 * query issued to the API. Each key in the object is the query parameter
 * name and the value is the query parameter value.
 * @param {Object} results The object returned from the API.
 */
function printQuery(results) {
  output.push('<h3>Query Parameters</h3><p>');

  for (var key in results.query) {
    output.push(key, ' = ', results.query[key], '<br>');
  }

  output.push('</p>');
}

/**
 * Prints the total metric value for all pages the query matched.
 * @param {Object} results The object returned from the API.
 */
function printTotalsForAllResults(results) {
  output.push(
      '<h3>Total Metrics For All Results</h3>',
      '<p>This query returned ', results.rows.length, ' rows. ',
      'But the query matched ', results.totalResults, ' total results. ',
      'Here are the metric totals for the matched total results.</p>');

  var totals = results.totalsForAllResults;
  for (metricName in totals) {
    output.push(
        '<p>',
        'Metric Name  = ', metricName, '<br>',
        'Metric Total = ', totals[metricName], '<br>',
        '</p>');
  }

}


/**
 * Prints all the column headers and rows of data as an HTML table.
 * @param {Object} results The object returned from the API.
 */
function printRows(results) {
  output.push('<h3>All Rows Of Data</h3>');
console.log(results);
  if (results.rows && results.rows.length) {
    var table = ['<table>'];

    // Put headers in table.
    table.push('<tr>');
    for (var i = 0, header; header = results.columnHeaders[i]; ++i) {
      table.push('<th>', header.name, '</th>');
    }
	table.push('</tr>');

    // Put cells in table.
    for (var i = 0, row; row = results.rows[i]; ++i) {
		table.push('<tr><td>', row.join('</td><td>'), '</td></tr>');
	}
    table.push('</table>');

    output.push(table.join(''));
  } else {
    output.push('<p>No rows found.</p>');
  }
}


/**
 * Utility method to update the output section of the HTML page. Used
 * to output messages to the user. This overwrites any existing content
 * in the output area.
 * @param {String} output The HTML string to output.
 */
function outputToPage(output) {
  document.getElementById('output').innerHTML = output;
}


/**
 * Utility method to return the lastNdays from today in the format yyyy-MM-dd.
 * @param {Number} n The number of days in the past from tpday that we should
 *     return a date. Value of 0 returns today.
 */
function lastNDays(n) {
  var today = new Date();
  var before = new Date();
  before.setDate(today.getDate() - n);

  var year = before.getFullYear();

  var month = before.getMonth() + 1;
  if (month < 10) {
    month = '0' + month;
  }

  var day = before.getDate();
  if (day < 10) {
    day = '0' + day;
  }

  return [year, month, day].join('-');
}
