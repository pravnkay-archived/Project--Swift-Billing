// FUNCTION TO ROUND OF A NUMBER TO 'N' DECIMAL PLACES
// Use Format : round(number, places_to_round_off)
// Copied from Stackoverflow : https://stackoverflow.com/questions/1726630/formatting-a-number-with-exactly-two-decimals-in-javascript/21323330#21323330

function round(value, exp) {
	if (typeof exp === 'undefined' || +exp === 0)
	  return Math.round(value);
  
	value = +value;
	exp = +exp;
  
	if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0))
	  return NaN;
  
	// Shift
	value = value.toString().split('e');
	value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp)));
  
	// Shift back
	value = value.toString().split('e');
	return +(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp));
  }