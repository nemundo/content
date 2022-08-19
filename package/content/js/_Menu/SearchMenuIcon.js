import MenuIcon from "../../framework/Menu/MenuIcon.js";
import GlobalWidgetContainer from "../../framework/Widget/GlobalWidgetContainer.js";
import ContentSearchWidget from "../Widget/ContentSearchWidget.js";
import SearchWidget from "../Search/SearchWidget.js";


// SearchContentMenuIcon
export default class SearchMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {

        super(parentContainer);

        this.title = "Search";
        this.icon = "search";

        this.onClick = function () {

            let widget = new SearchWidget();
            /*widget.heightPixel = 600;
            widget.widthPercent = 50;*/

            GlobalWidgetContainer.addWidget(widget);

        }

    }

}