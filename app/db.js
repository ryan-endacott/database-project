
var mongoose = require('mongoose'),
  config = require('../config/config'),
  Schema = mongoose.Schema,
  uuid = require('node-uuid'),
  bcrypt = require('bcrypt'),
  SALT_WORK_FACTOR = 10;

mongoose.connect(config.db.uri);

var db = mongoose.connection;
db.on('error', console.error.bind(console, 'connection error:'));
db.once('open', function() {
  console.log('Successfully connected to database!');
});

var userSchema = new Schema({
});

module.exports = {
  User: mongoose.model('User', userSchema)
}

