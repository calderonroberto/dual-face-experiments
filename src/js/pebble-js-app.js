var initialized = false;
var config_url = "http://robertocalderon.ca/pebbleconfiguration.php?v=0.1";

Pebble.addEventListener("ready", function() {
  console.log("ready called!");
  initialized = true;
});

Pebble.addEventListener("showConfiguration", function() {
  console.log("showing configuration");
  var url = config_url;

  for(var i = 0, x = window.localStorage.length; i < x; i++) {
    var key = window.localStorage.key(i);
    var val = window.localStorage.getItem(key);

    if(val != null) {
      url += "&" + encodeURIComponent(key) + "=" + encodeURIComponent(val);
    }
  }
  console.log(url);
  Pebble.openURL(url);  
});

Pebble.addEventListener("webviewclosed", function(e) {
  console.log("configuration closed");

  var options = JSON.parse(decodeURIComponent(e.response));  
  console.log("Options = " + JSON.stringify(options));

  for(key in options) {
    window.localStorage.setItem(key, options[key]);
  }

  Pebble.sendAppMessage(options);
});
