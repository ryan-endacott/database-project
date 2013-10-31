var db = require('../db'),
  Business = db.Business,
  errors = require('../errors'),
  badRequest = errors.badRequestError;

// Action to get all businesses of a certain type
exports.all = function(req, res) {

  var type = req.query.type || /.*/; // All types if none specified
  Business.find({ type: type }, function(err, businesses) {
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

  var type = req.query.type || /.*/; // All types if none specified
  // Near example: https://github.com/LearnBoost/mongoose/blob/master/test/model.querying.test.js#L2168
  Business.find({
    type: type,
    loc: {
      $near: { $geometry: geojsonLoc },
      $maxDistance: req.query.maxDistance // In meters
    }
  }, function(err, businesses) {
    if (err) return badRequest(err, res);

    res.json(businesses);
  });
};

// Action to create a new business
exports.create = function(req, res) {

  var q = req.body.business || {};
  Business.create({
    name: q.name,
    type: q.type,
    loc: {
      type: 'Point',
      coordinates: [q.long, q.lat]
    },
    phoneNumber: q.phoneNumber,
    description: q.description
  }, function(err, business) {
    if (err) return badRequest(err, res);

    res.json(business);
  });
};


