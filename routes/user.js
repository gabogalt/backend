const { Router } = require("express");
const router = Router();

const { create, auth } = require("../controller/user");

router.post("/create", create);
router.post("/auth", auth);

module.exports = router;
