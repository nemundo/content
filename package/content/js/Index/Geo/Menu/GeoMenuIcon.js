import MenuIcon from "../../../../framework/Menu/MenuIcon.js";
import GlobalWidgetContainer from "../../../../framework/Widget/GlobalWidgetContainer.js";
import GeoWidget from "../Widget/GeoWidget.js";

export default class GeoMenuIcon extends MenuIcon {

    constructor(parentContainer = null) {

        super(parentContainer);
        this.icon = "globe";

        this.onClick = function () {

            let widget = new GeoWidget();
            widget.heightPercent = 50;
            //widget.resizeable=true;

            GlobalWidgetContainer.addWidget(widget);

        };

    }

}