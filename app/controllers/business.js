var db = require('../db'),
  Business = db.Business,
  errors = require('../errors'),
  badRequest = errors.badRequestError;

// Action to get all businesses of a certain type
exports.allBusinesses = function(req, res) {
  Business.find({ type: req.query.type }, function(err, businesses) {
    if (err) return badRequest(err);

    res.json(businesses);
  });
};



