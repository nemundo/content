import ContentBuilder from "../Builder/ContentBuilder.js";
import ContentWidget from "../Widget/ContentWidget.js";
import ActionCollection from "../Action/ActionCollection.js";
import Debug from "../../core/Debug/Debug.js";
import ShareAction from "../../content_app/Share/Action/ShareAction.js";

export default class _ContentViewBuilder {

    onLoaded = null;

    loadActionMenu = false;

    fromContentId(contentId, parent) {

        let local = this;

        let widget = new ContentWidget(parent);
        widget.contentId = contentId;

        let builder = new ContentBuilder();
        builder.getContent(contentId);
        builder.onView = function (view) {

            /*(new DocumentContainer()).title = builder.subject;
            (new DocumentContainer()).changeUrl("?content=" + contentId);*/

            //widget.addActionMenu();



            /*
            if (local.loadActionMenu) {

                let collection = new ActionCollection();
                let actionList = collection.getActionList();

                for (let index = 0; index < actionList.length; ++index) {

                    (new Debug()).write(actionList[index].label);

                    widget.addActionMenu(actionList[index].label, function () {
                        actionList[index].onAction(contentId);
                    });

                }

            }*/

            widget.closeButton = true;

        };

        widget.showAction=true;
        widget.addContentActionMenu(new ShareAction());

        /*
        if (local.loadActionMenu) {

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

            };
        }*/

    }

}