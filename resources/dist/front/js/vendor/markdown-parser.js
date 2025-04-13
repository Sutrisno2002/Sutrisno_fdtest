window.marked = require("marked");
import { gfmHeadingId, getHeadingList } from "marked-gfm-heading-id";

marked.use(gfmHeadingId({ prefix: "" }));
