// Set up routes for the app

// Controllers
var index = require('../app/controllers/index');

module.exports = function(app) {
  app.get('/', index.index);
}
