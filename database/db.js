const mongoose = require("mongoose");

//dbConnection ->

const dbConnection = async () => {
	try {
		await mongoose.connect(process.env.DB_CNT, {
			useNewUrlParser: true,
			useUnifiedTopology: true,
			useFindAndModify: false,
			useCreateIndex: true,
		});

		console.log("conectado a la base de datos");
	} catch (e) {
		console.error(e);
	}
};

module.exports = { dbConnection };
