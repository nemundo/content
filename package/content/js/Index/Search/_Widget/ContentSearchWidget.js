import AdminWidget from "../../framework/Widget/AdminWidget.js";
import SearchIndexContainer from "../Com/Container/SearchIndexContainer.js";
import GlobalWidgetContainer from "../../framework/Widget/GlobalWidgetContainer.js";


// ContentWidget
export default class _ContentSearchWidget extends AdminWidget {

    constructor(parentContainer) {

        super(parentContainer);
        this.widgetTitle = "Content";

    }


    render() {

        let container = new SearchIndexContainer(this);
        container.heightPercent = 100;
        container.onItemClick = function (contentId) {

            //GlobalWidgetContainer.addWidget()

              //  g.clearWidget();
            //(new ContentWidgetLoader()).fromContentId(contentId);

        };
        container.render();

    }

}