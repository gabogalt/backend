const { Router } = require("express");
const router = Router();

router.create("/", create);

module.exports = { create };
