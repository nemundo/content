import ActionView from "../../../Action/ActionView.js";
import TreeFileUploadContainer from "../Upload/TreeFileUploadContainer.js";
import ContentTypeCollectionListBox from "../../../Com/ListBox/ContentTypeCollectionListBox.js";
import H1Container from "../../../../html/Title/H1.js";
import Debug from "../../../../core/Debug/Debug.js";
import TreeService from "../Service/TreeService.js";
import DivContainer from "../../../../html/Content/Div.js";
import TreeTable from "../Com/Table/TreeTable.js";

export default class TreeActionView extends ActionView {


    render() {

        let local=this;

        let upload = new TreeFileUploadContainer(this);
        upload.parentId = this.contentId;
        upload.render();


        // TreeContentPlus


        /*
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
                    treeService.parentId=local.contentId;
                    treeService.contentId = dataRow.content_id;
                    treeService.onFinished = function () {
                        childTable.reloadData();
                    };
                    treeService.sendRequest();

                    /*if (local.onFormSubmit !== null) {
                        local.onFormSubmit(item);
                    }*/

                    //modal.close();
                    //(new ContentWidgetLoader()).fromContentId(item.content_id);

      /*          };

                form.render();

                formContainer.addContainer(form);

            }

        };
        listbox.render();

        let formContainer = new DivContainer(this);*/


        let parentTable=new TreeTable(this);
        parentTable.service = "tree-parent-search";
        parentTable.caption="Parent";
        parentTable.childId=this.contentId;
        parentTable.render();

        let childTable = new TreeTable(this);
        childTable.service = "tree-child-search";
        childTable.caption="Child";
        childTable.parentId = this.contentId;
        childTable.render();



    }


}