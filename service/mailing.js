/** @format */

"use strict";
const nodemailer = require("nodemailer");

const sendMail = async ({
	to = process.env.USER_MAIL,
	subject = "Nuevo contacto WEB",
	html,
}) => {
	try {
		const transporter = nodemailer.createTransport({
			service: "gmail",
			secure: false, // true for 465, false for other ports
			auth: {
				user: process.env.USER_MAIL, // generated ethereal user
				pass: process.env.USER_PASSWORD, // generated ethereal password
			},
			tls: {
				rejectUnauthorized: false,
			},
		});

		const { messageId } = await transporter.sendMail({
			from: '" Gabriel Lomeña👻" <foo@example.com>', // sender address
			to,
			subject,
			html,
		});
		return messageId;
	} catch (e) {
		console.error(e);
		throw e;
	}
};
module.exports = { sendMail };
