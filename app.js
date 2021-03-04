var createError = require("http-errors");
var express = require("express");
var cookieParser = require("cookie-parser");
var logger = require("morgan");

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
	res.senStatus(500);
});

module.exports = app;
