var routes = require('@json/routes.json');

exports.name = function() {

    var args = Array.prototype.slice.call(arguments);
    
    var name = args.shift();

    var baseUrl = window.location.hostname;
    
    if (routes[name] === undefined) {
    
        console.error('Unknown route ', name);
    
    } else {
    
        return '//' + baseUrl + '/' + routes[name].split('/').map(s => s[0] == '{' ? args.shift() : s).join('/');
    
    }
    
};