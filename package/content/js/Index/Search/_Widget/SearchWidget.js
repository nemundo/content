import AdminWidget from "../../framework/Widget/AdminWidget.js";
import SearchContainer from "./SearchContainer.js";
import ContentWidgetLoader from "../Loader/ContentWidgetLoader.js";
import Debug from "../../core/Debug/Debug.js";

export default class _SearchWidget extends AdminWidget {

    constructor(parentContainer) {

        super(parentContainer);

        this.widgetTitle = "Search";

        let container = new SearchContainer(this);
        container.heightPercent = 100;
        container.onItemClick = function (row) {

            let contentId = row.getData("content_id");

            //(new Debug()).write(row);
            (new Debug()).write(contentId);

            //GlobalWidgetContainer.clearWidget();
            (new ContentWidgetLoader()).fromContentId(contentId);

        };
        container.render();

    }

}