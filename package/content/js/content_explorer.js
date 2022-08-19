import DocumentContainer from "../html/Document/Document.js";
import AdminMainContent from "../framework/Admin/Layout/AdminMainContent.js";
import AdminTitle from "../framework/Admin/Title/AdminTitle.js";
import ContentTable from "./Com/Table/ContentTable.js";
import AdminDialog from "../framework/Admin/Dialog/AdminDialog.js";
import ContentItemService from "./Service/ContentItemService.js";
import ContentTypeListBox from "./Com/ListBox/ContentTypeListBox.js";
import ContentTypeDataListBox from "./Com/ListBox/ContentTypeDataListBox.js";
import AppType from "../framework/App/Type/AppType.js";
import ContentTypeCollection from "./Type/ContentTypeCollection.js";
import SrfRadioLivestreamType from "../srf/Content/Radio/SrfRadioLivestreamType.js";
import ContentBuilder from "./Builder/ContentBuilder.js";
import RoundshotType from "../roundshot/Content/RoundshotType.js";


(new ContentTypeCollection())
    .addContentType(new RoundshotType())
    .addContentType(new SrfRadioLivestreamType());


let document = new DocumentContainer();
document.onLoaded = function () {

    let mainContent = new AdminMainContent();


    let title = new AdminTitle(mainContent);
    title.text = "Content Explorer";

    let contentType= new ContentTypeDataListBox(mainContent);  // new ContentTypeListBox(mainContent);
    contentType.onChange=function () {

        table.contentTypeId=contentType.value;
        table.reloadData();

    }
    contentType.render();


    let table = new ContentTable(mainContent);
    table.onContentClick = function (contentId) {
        //alert(contentId);

        let dialog = new AdminDialog(mainContent);
        //dialog.dialogTitle = contentId;


        /*
        let service = new ContentItemService();
        service.contentId = contentId;
        service.onLoaded = function (item) {
            dialog.dialogTitle = item.subject;
        };
        service.sendRequest();*/



        let builder=new ContentBuilder();
        builder.onView = function (view) {

            //(new Debug()).write("onView");

          dialog.addContainer(view);
          dialog.dialogTitle=builder.subject;



        };

        builder.getContent(contentId);


        dialog.showDialog();


    }

    table.render();


};