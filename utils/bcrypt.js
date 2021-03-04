const bcrypt = require("bcrypt");
const salt = bcrypt.genSaltSync();

const hash = (payload) => bcrypt.hash(payload, salt);
const unhash = (payload, hash) => bcrypt.compareSync(payload, hash);

module.exports = { hash, unhash };
