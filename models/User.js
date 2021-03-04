const { Schema, model } = require("mongoose");

const schemaUser = Schema({
	user: {
		type: String,
		required: true,
	},
	verificationCode: {
		type: String,
		required: true,
	},
	email: {
		type: String,
		required: true,
	},
	password: {
		type: String,
		required: true,
	},
	tsCreate: {
		type: Date,
		default: Date.now,
	},
});

module.exports = model("user", schemaUser);
