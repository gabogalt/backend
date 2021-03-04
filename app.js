var createError = require("http-errors");
var express = require("express");
var cookieParser = require("cookie-parser");
var logger = require("morgan");

//requerimos dotenv
const doten = require("dotenv");
doten.config();

//requerimos y usamos la base de datos
const { dbConnection } = require("./database/db");
dbConnection();

// Requerimos las rutas que vamos a usar
const user = require("./routes/user");

var app = express();

app.use(logger("dev"));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());

// Usamos las rutas
app.use("/user", user);

// catch 404 and forward to error handler
app.use((_, res) => {
	res.status(404).json({ message: "Página no Encontrada" });
});

// error handler
app.use((err, req, res, next) => {
	console.error(err);
	res.sendStatus(500);
});

module.exports = app;
