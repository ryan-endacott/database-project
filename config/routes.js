// Set up routes for the app

// Controllers
var index = require('../app/controllers/index'),
    user = require('../app/controllers/user'),
    business = require('../app/controllers/business'),
    errors = require('../app/errors'),
    auth = require('./auth'),
    requireUser = auth.requireUserToken,
    requireAppToken = auth.requireAppToken;

module.exports = function(app) {
  app.get('/', index.index);
  app.get('/business/all', requireAppToken, requireUser, business.all);
  app.get('/business/near', requireAppToken, requireUser, business.near);
  app.get('/business/register', business.register);
  app.get('/business', requireAppToken, requireUser, business.find);
  app.post('/user/register', requireAppToken, user.register);
  app.get('/user/login', requireAppToken, user.login);
  app.post('/business/create', business.create);
};
