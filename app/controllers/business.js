var db = require('../db'),
  Business = db.Business,
  errors = require('../errors'),
  badRequest = errors.badRequestError,
  gm = require('googlemaps');

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

// Action to create a new business via API
exports.create = function(req, res) {

  var q = req.body.business || req.body || {};

  // Get coordinates of address from googlemaps
  gm.geocode(q.address, function(err, data) {

    var lon, lat;
    try {
      var loc = data.results[0].geometry.location;
      lon = loc.lng || 0;
      lat = loc.lat || 0;
    }
    catch(err) { // can fail if we got an error or invalid data
    }

    Business.create({
      name: q.name,
      type: q.type,
      loc: {
        type: 'Point',
        coordinates: [lon, lat]
      },
      phoneNumber: q.phoneNumber,
      description: q.description,
      reviews: q.reviews,
      deals: q.deals,
      website: q.website,
      hours: q.hours,
      address: q.address
    }, function(err, business) {
      if (err) return badRequest(err, res);

      res.json(business);
    });

  });

};

// Action to get the register page for a business
exports.register = function(req, res) {
  res.render('info', {title: 'Register a New Business'});
}

exports.find = function(req, res) {
  Business.findById(req.query.businessId, function(err, business) {
    if (err) return badRequest(err, res);
    res.json(business);
  });
}


