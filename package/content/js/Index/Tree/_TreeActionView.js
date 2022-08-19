import ActionView from "../../Action/ActionView.js";
import TreeTable from "./Com/TreeTable.js";
import _FormContentTypeCollectionDropdown from "../../Com/Dropdown/FormContentTypeCollectionDropdown.js";
import Debug from "../../../core/Debug/Debug.js";
import TreeService from "./Service/TreeService.js";
import NewMenuIcon from "../../../framework/Com/Menu/Icon/NewMenuIcon.js";
import AdminModal from "../../../framework/Com/Modal/AdminModal.js";
import ContainerForm from "../../../content_app/Explorer/Content/Container/ContainerForm.js";
import UnityCommunication from "../../../bim/Unity/Communication/UnityCommunication.js";
import PoiFileUploadContainer from "../../../bim/Poi/Com/Upload/PoiFileUploadContainer.js";

export default class _TreeActionView extends ActionView {

    render() {

        let local = this;

        /*let dropdown = new ContentTypeCollectionDropdown(local);
        dropdown.render();
        dropdown.onContentTypeChange = function (contentType) {
            contentType.showForm(null, local.contentId);
        };*/

        /*let dropdown=new ContentTypeCollectionListBox(this);
        dropdown.render();*/

        //let contentTypeListBox = new ContentTypeCollectionListBox(this);


        let upload = new PoiFileUploadContainer(this);
        upload.parentPoiId= this.contentId;
        upload.onFinished = function () {
            tree.reloadData();
        };
        upload.render();


        let btn = new _FormContentTypeCollectionDropdown(this);
        btn.onBeforeShow=function () {
            (new UnityCommunication()).removeFocus();
        };


        btn.onFormSubmit = function (data) {

            (new Debug()).write("on form submit");

            let treeService=new TreeService();
            treeService.contentId=data.content_id;
            treeService.parentId= local.contentId;
            treeService.onFinished=function () {
                (new Debug()).write("finished");
                tree.reloadData();
            };
            treeService.sendRequest();

        };
        btn.render();

        let tree = new TreeTable(this);
        tree.parentId = this.contentId;
        tree.render();

    }

}