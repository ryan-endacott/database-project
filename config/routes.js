// Set up routes for the app

// Controllers
var index = require('../app/controllers/index'),
    user = require('../app/controllers/user');

module.exports = function(app) {
  app.get('/', index.index);
  app.post('/user/register', user.register);
};
