import PlusMenuIcon from "../../../framework/Com/Menu/Icon/PlusMenuIcon.js";
import ContentTypeCollection from "../../Type/ContentTypeCollection.js";
import BootstrapDropdown from "../../../framework/Bootstrap/Dropdown/BootstrapDropdown.js";
import ContentTypeListService from "../../Service/ContentTypeListService.js";
import BootstrapCard from "../../../framework/Bootstrap/Card/BootstrapCard.js";

export default class AddContentMenuIcon extends PlusMenuIcon {


    onContentForm=null;

    onContentType=null;

    render() {

        let local = this;

        let contentTypeCollection = new ContentTypeCollection();

        let dropdown = new BootstrapDropdown(this);
        dropdown.label = "New Content";

        let service = new ContentTypeListService();
        service.onDataRow = function (dataRow) {

            //(new Debug()).write(dataRow.content_type);

            let contentType = contentTypeCollection.getContentType(dataRow.id);

            if (contentType !== null) {

                if (contentType.hasForm()) {
                    dropdown.addMenu(dataRow.content_type, function () {

                        /*formContainer.emptyContainer();
                        formContainer.cardTitle = contentType.label;

                        let form = contentType.getForm();
                        form.onSubmit = function () {
                            form.clearForm();
                        };

                        local.onContentForm(form);*/

                        local.onContentType(contentType);

                        //formContainer.addContainer(form);

                    });

                }
            }


        };
        service.sendRequest();

        dropdown.render();

        //let formContainer = new BootstrapCard(this);


    }


}