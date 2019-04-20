/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var ALPHABET = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789-_";
function encode64(num) {
	base = 64; out = "";
	for (t = Math.floor(Math.log10(num) / Math.log10(base)); t >= 0; t--) {
		a = Math.floor(num / Math.pow(base, t));
		out += ALPHABET.substr(a, 1);
		num = num - (a * Math.pow(base, t));
	}
	return out;
}

function decode64(val_str) {
	nDec = 0;
	for (i = 0; i < val_str.length; i++) {
		char = val_str.substr(i, 1);
		nDec = nDec * 64 + ALPHABET.indexOf(char);
	}
	return nDec;
}