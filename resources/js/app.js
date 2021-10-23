require('./bootstrap');
var outdatedBrowserRework = require('outdated-browser-rework');

const ViewHandler = require('./ViewHandler');
ViewHandler.init({
    outdatedBrowserRework: outdatedBrowserRework,
});
