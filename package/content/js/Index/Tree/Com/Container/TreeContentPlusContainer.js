import ContentTypeCollectionListBox from "../../../../Com/ListBox/ContentTypeCollectionListBox.js";
import H1Container from "../../../../../html/Title/H1.js";
import Debug from "../../../../../core/Debug/Debug.js";
import TreeService from "../../Service/TreeService.js";
import DivContainer from "../../../../../html/Content/Div.js";

export default class TreeContentPlusContainer extends DivContainer {

    contentId;

    onFinished = null;


    render() {


        let listbox = new ContentTypeCollectionListBox(this);
        listbox.onContentTypeChange = function (contentType) {

            formContainer.emptyContainer();

            if (contentType.hasForm()) {

                let h1 = new H1Container(formContainer);
                h1.text = contentType.label;

                let form = contentType.getForm();

                form.onSubmit = function (dataRow) {

                    formContainer.emptyContainer();

                    (new Debug()).write(dataRow);

                    let treeService = new TreeService();
                    treeService.parentId = local.contentId;
                    treeService.contentId = dataRow.content_id;
                    treeService.onFinished = function () {

                        if (local.onFinished !== null) {
                            local.onFinished();
                        }

                    };
                    treeService.sendRequest();

                };

                form.render();

                formContainer.addContainer(form);

            }

        };
        listbox.render();

        let formContainer = new DivContainer(this);

    }

}