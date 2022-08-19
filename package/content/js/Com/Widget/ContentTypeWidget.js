import ContentWidget from "./ContentWidget.js";
import ContentTypeListGroup from "../ListGroup/ContentTypeListGroup.js";

export default class ContentTypeWidget extends ContentWidget {

    render() {

        super.render();

        let local = this;
        this.addListView();

        let homeView = this.showHomeView();

        let listGroup = new ContentTypeListGroup(homeView);
        listGroup.onContentTypeClick = function (contentType) {
            local.showList(contentType);
        };
        listGroup.render();

    }

}