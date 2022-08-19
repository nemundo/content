import TreeActionView from "./TreeActionView.js";
import ContentAction from "../../../Action/ContentAction.js";

export default class TreeAction extends ContentAction {

    constructor() {

        super();
        this.label = "Tree";
        this.view = TreeActionView;

    }

}