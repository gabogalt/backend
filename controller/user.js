const { hash, unhash } = require("../utils/bcrypt");
const User = require("../models/User");

const create = async (req, res) => {
	try {
		const { email, password } = req.body;
		let user = await User.findOne({ email });
		console.log(user);
		if (user) return res.status(400).json("El correo está en uso");
		user = new User(req.body);
		user.password = await hash(password);
		await user.save();
		res.status(201).json("Se ha creado el nuevo usuario con exito");
	} catch (e) {
		console.error(e);
		res.sendStatus(500);
	}
};

const auth = async (req, res) => {
	try {
		const { email, password } = req.body;
		const user = await User.findOne({ email }, { password: 1 });
		if (user == null)
			return res.json({
				messages: "El correo ingresado no se encuentra registrado",
			});
		const isPasswordValid = unhash(password, user.password);
		if (isPasswordValid) {
			res.json({ messages: "Bienvenido usuario" });
		} else {
			res.json({ messages: "Contraseña incorrecta" });
		}
	} catch (e) {
		console.error(e);
		res.sendStatus(500);
	}
};

module.exports = { create, auth };
