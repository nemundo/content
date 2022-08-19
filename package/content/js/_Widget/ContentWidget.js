import AdminWidget from "../../framework/Widget/AdminWidget.js";
import ContentBuilder from "../Builder/ContentBuilder.js";
import LoaderContainer from "../../framework/Com/Loader/Loader.js";
import HrContainer from "../../html/Layout/HrContainer.js";
import ActionCollection from "../Action/ActionCollection.js";
import H1Container from "../../html/Title/H1.js";
import FontSize from "../../html/Style/Font/FontSize.js";

export default class ContentWidget extends AdminWidget {

    showChild = true;

    showAction = false;

    _contentId=null;

    set contentId(contentId) {

        let local = this;
        this._contentId=contentId;

        let loader = new LoaderContainer(this);

        let builder = new ContentBuilder();
        let contentType = builder.getContent(contentId);

        /*
        (new Debug()).write("type:");
        (new Debug()).write(contentType);

        this.addActionMenu("Edit", function () {

                //let type = new ContainerType();
                let form = contentType.getForm(contentId);

                let modal = new AdminModal();
                modal.show(form);

            }
        );*/


        builder.onView = function (view) {

            loader.removeContainer();

            local.widgetTitle = builder.subject;
            local.addContainer(view);

            if (local.showAction) {

                new HrContainer(local);

                let collection = new ActionCollection();
                let actionList = collection.getActionList();

                for (let index = 0; index < actionList.length; ++index) {

                    if (actionList[index].view !== null) {

                        let action = actionList[index];

                        let h3 = new H1Container(local);
                        h3.text = action.label;
                        h3.fontSize = FontSize.SMALL;

                        let view = new actionList[index].view(local);
                        view.contentId = contentId;
                        view.render();

                        /*let hr = new HrContainer(local);
                        hr.display=DisplayStyle.BLOCK;*/
                        //hr.heightPixel=10;*/

                    }

                }

            }

            //new HrContainer(local);


            /*let actionView = new TaggingActionView(local);
            actionView.contentId = contentId;
            actionView.render();

            new HrContainer(local);*/


            /*
            if (local.showChild) {

                let dropdown = new ContentTypeCollectionDropdown(local);
                dropdown.render();
                dropdown.onContentTypeChange = function (contentType) {
                    contentType.showForm(null, contentId);
                };

                let tree = new TreeContentTable(local);
                tree.contentId = contentId;
                tree.render();

            }*/

        }

    }


    addContentActionMenu(action) {

        let local = this;  // this._contentId=contentId;

        this.addActionMenu(action.label, function () {
            action.onAction(local._contentId);
        });

        return this;

    }


}