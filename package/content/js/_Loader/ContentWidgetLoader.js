import UrlParameter from "../../core/Url/UrlParameter.js";
import GlobalWidgetContainer from "../../framework/Widget/GlobalWidgetContainer.js";
import ContentBuilder from "../Builder/ContentBuilder.js";
import DocumentContainer from "../../html/Document/Document.js";
import ContentWidget from "../Widget/ContentWidget.js";
import ActionCollection from "../Action/ActionCollection.js";
import AdminModal from "../../framework/AdminModal.js";

export default class _OldContentWidgetLoader {

    onLoaded=null;


    fromContentParameter() {

        let parameter = new UrlParameter("content");
        if (parameter.hasValue()) {
            this.fromContentId(parameter.getValue());
        }

    }


    fromContentId(contentId) {


        /*
        let local=this;

        let widget = new ContentWidget();
        widget.contentId = contentId;

        let builder = new ContentBuilder();
        builder.getContentType(contentId);
        builder.onView = function (view) {

            /*(new DocumentContainer()).title = builder.subject;
            (new DocumentContainer()).changeUrl("?content=" + contentId);*/


        /*    let collection = new ActionCollection();
            let actionList = collection.getActionList();

            for (let index = 0; index < actionList.length; ++index) {

                widget.addActionMenu(actionList[index].label, function () {
                    actionList[index].onAction(contentId);
                });

            }

            //widget.widthPixel = 300;
            widget.closeButton = true;

            local.onLoaded(widget);

        };

        builder.onContentType = function (contentType) {

            if (contentType.hasForm()) {

                widget.addActionMenu("Edit", function () {

                        let form = contentType.getForm(contentId);
                        form.onSubmit = function () {
                            modal.close();
                        };

                        let modal = new AdminModal();
                        modal.modalTitle = "Edit";
                        modal.show(form);

                    }
                );

            }

        };*/

    }

}