import ServiceRequest from "../../framework/Service/ServiceRequest.js";
import Debug from "../../core/Debug/Debug.js";
import ContentTypeCollection from "../Type/ContentTypeCollection.js";
import StatusInformation from "../../framework/Information/StatusInformation.js";
import ContentItemService from "../Service/ContentItemService.js";


export default class ContentBuilder {

    onData = null;

    onContentType = null;

    onForm = null;

    onView = null;

    subject = null;

    contentType=null;

    getContent(contentId) {

        let local = this;

        let service = new ContentItemService();
        service.contentId=contentId;
        service.onLoaded = function (item) {

            local.subject = item.subject;
            local.contentType=item.content_type;

            if (local.onData !== null) {
                local.onData(item);
            }

            let type = (new ContentTypeCollection()).getContentType(item.content_type_id);

            if (type !== null) {

                if (local.onContentType !== null) {
                    local.onContentType(type);
                }

                if (local.onView !== null) {

                    if (type.view !== null) {
                        let contentView = new type.view();
                        contentView.fromJsonData(item.data[0]);

                        local.onView(contentView);
                    } else {
                        (new Debug()).writeError("No Type View");
                    }
                }

            } else {

                (new Debug()).writeError("No View. Content Type: "+item.content_type_id);

            }

        };

        service.sendRequest();

    }

}
