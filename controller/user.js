const { hash, unhash } = require("../utils/bcrypt");
const User = require("../models/User");
const { sendMail } = require("../service/mailing");
const { registerTemplate } = require("../utils/registerTemplate");
const uid = require("node-uuid");

const create = async (req, res) => {
	try {
		const { email, password, user } = req.body;
		let client = await User.findOne({ email });
		console.log(user);
		if (client) return res.status(400).json("El correo está en uso");
		client = new User(req.body);
		client.password = await hash(password);
		const verificationCode = uid();
		client.verificationCode = verificationCode;
		await client.save();
		const html = registerTemplate({ user, verificationCode });
		await sendMail({
			to: email,
			subject: "Gracias por registrarte en nuestra página😍🥰",
			html,
		});
		res.status(201).json("Se ha creado el nuevo usuario con exito");
	} catch (e) {
		console.error(e);
		res.sendStatus(500);
	}
};

const auth = async (req, res) => {
	try {
		const { email, password } = req.body;
		const user = await User.findOne({ email }, { password: 1, user: 1 });
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
