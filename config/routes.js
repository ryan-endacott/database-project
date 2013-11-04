// Set up routes for the app

// Controllers
var index = require('../app/controllers/index'),
    user = require('../app/controllers/user'),
    business = require('../app/controllers/business'),
    errors = require('../app/errors'),
    auth = require('./auth'),
    requireUser = auth.requireUserToken;

module.exports = function(app) {
  app.get('/', index.index);
  app.get('/business/all', requireUser, business.all);
  app.get('/business/near', requireUser, business.near);
  app.post('/user/register', user.register);
  app.get('/user/login', user.login);
  app.post('/business/create', business.create);
};
