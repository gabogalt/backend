const { Router } = require("express");
const router = Router();

const { create } = require("../controller/user");

router.post("/create", create);

module.exports = router;
