var db = require('../db'),
  Business = db.Business,
  errors = require('../errors'),
  badRequest = errors.badRequestError;

// Action to get all businesses of a certain type
exports.all = function(req, res) {
  Business.find({ type: req.query.type }, function(err, businesses) {
    if (err) return badRequest(err, res);

    res.json(businesses);
  });
};

// Action to get all businesses of a certain type near given location
exports.near = function(req, res) {
  var geojsonLoc = {
    type: 'Point',
    coordinates: [req.query.long, req.query.lat]
  };

  // Near example: https://github.com/LearnBoost/mongoose/blob/master/test/model.querying.test.js#L2168
  Business.find({
    type: req.query.type,
    loc: {
      $near: { $geometry: geojsonLoc },
      $maxDistance: req.query.maxDistance // In meters
    }
  }, function(err, businesses) {
    if (err) return badRequest(err, res);

    res.json(businesses);
  });
};



