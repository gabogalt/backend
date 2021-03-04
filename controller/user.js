const User = require("../models/User");

const create = async (req, res) => {
	try {
		const { email } = req.body;
		let user = await User.findOne({ email });
		console.log(user);
		if (user) return res.status(400).json("El correo está en uso");
		user = new User(req.body);
		await user.save();
		res.status(200).json("Se ha creado el nuevo usuario con exito");
	} catch (e) {
		console.error(e);
		res.sendStatus(500);
	}
};

module.exports = { create };
