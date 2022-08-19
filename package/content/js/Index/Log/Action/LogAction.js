import ContentAction from "../../../Action/ContentAction.js";
import LogActionView from "./LogActionView.js";

export default class LogAction extends ContentAction {

    constructor() {

        super();
        this.label = "Log";
        this.view = LogActionView;

    }

}