var db = require('../db'),
    User = db.User,
    errors = require('../errors'),
    badRequest = errors.badRequestError;

// Action to register a new user.
exports.register = function(req, res) {

  var user = new User(req.body.user);
  user.save(function(err, user) {
    if (err) return badRequest(err, res);
    res.json(user.toObject()); // Send toObject to include user's token
  });

};



