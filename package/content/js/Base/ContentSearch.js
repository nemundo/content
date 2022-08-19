import DivContainer from "../../html/Content/Div.js";

export default class ContentSearch extends DivContainer {

    onContentClick = null;

    reloadData() {

        this.emptyContainer();
        this.render();

    }

}