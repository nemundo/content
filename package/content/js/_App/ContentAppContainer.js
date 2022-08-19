import DivContainer from "../../html/Content/Div.js";
import MouseCursor from "../../core/Mouse/MouseCursor.js";
import ContentBuilder from "../Builder/ContentBuilder.js";
import BodyContainer from "../../html/Document/Body.js";
import AppContainer from "../../framework/App/Com/Container/AppContainer.js";
import ContentTable from "../Com/Table/ContentTable.js";
import BrowserInformation from "../../core/System/BrowserInformation.js";
import DocumentContainer from "../../html/Document/Document.js";
import ContentFileServiceFileUpload from "../../content_app/File/Com/Container/ContentFileServiceFileUpload.js";
import ParagraphContainer from "../../html/Content/Paragraph.js";
import ContentCountService from "../Service/ContentCountService.js";
import ContentTypeCollectionListBox from "../Com/ListBox/ContentTypeCollectionListBox.js";

export default class ContentAppContainer extends AppContainer {

    render() {

        let local = this;


        /*
        let p=new ParagraphContainer(this);
        p.text="123123123";*/


        /*let statusBar = new StatusBar(this);
        statusBar.statusTitle="Content";
        statusBar.marginBottomPixel=20;*/

        /*
        let uploadIcon = new ContentFileServiceFileUpload(statusBar);  // Service new PoiFileUploadContainer(this);
        uploadIcon.render();*/

        /*let close=new CloseMenuIcon(statusBar);
        close.onClick=function () {
            local.visible=false;
        };*/


        let upload = new ContentFileServiceFileUpload(this);
        upload.render();



        let viewContainer = new DivContainer(this);


        let p=new ParagraphContainer(this);

        let countService = new ContentCountService();
        countService.onDataRow=function (dataRow) {
            p.text=dataRow.count_text+" items found";
        };
        countService.sendRequest();


        let contentType = new ContentTypeCollectionListBox(this);
        contentType.onChange=function () {
            table.contentTypeId = contentType.value;
            table.reloadData();

            /*countService.onRow=function (dataRow) {
                p.text=dataRow.count_text+" items found";
            };*/
            countService.contentTypeId=contentType.value;
            countService.sendRequest();

        }



        let table = new ContentTable(this);   // new ContentDataTable(this);
        table.widthPercent = 100;
        table.heightPercent = 100;
        /*table.showEditIcon = true;
        table.showDeleteIcon = true;*/
        table.paginationLimit = 50;
        table.onDataRowClick = function (tableRow) {

            (new MouseCursor()).setWait();

            //statusBar.statusTitle="";
            //widget._header.emptyContainer();

            let contentId = tableRow.getData("content_id");

            viewContainer.emptyContainer();

            table.visible = false;
            viewContainer.visible = true;

            //local._statusBar.backButton=new BackMenuIcon(viewContainer);
            /*local._statusBar._backIcon.onClick = function () {

                table.visible = true;
                viewContainer.visible = false;
                local.statusTitle="Content";

                //widget.widgetTitle="Content";
            };*/


            local.onBackClick = function () {

                local.statusTitle = "Content";
                (new DocumentContainer()).changeUrl("");

                local.onTitleChange("Content");

                table.visible = true;
                viewContainer.visible = false;
                //widget.widgetTitle="Content";
            };


            let builder = new ContentBuilder();
            builder.getContent(contentId);
            builder.onView = function (view) {

                //widget.widgetTitle=builder.subject;

                /*let h1=new H1Container(viewContainer);
                h1.text= builder.subject;*/

                local.statusTitle = builder.subject;
                viewContainer.addContainer(view);

                local.onTitleChange(builder.subject);

                /*if (local.onTitleChange!==null) {
                    local.onTitleChange(builder.subject);
                }*/


                (new MouseCursor()).setDefault();

                (new DocumentContainer()).changeUrl("?content="+contentId);

                /*let modal = new AdminModal();
                modal.modalTitle = view.subject;
                modal.showFullscreenIcon = true;
                modal.show(view);*/

            }

        };
        table.render();


        let body = new BodyContainer();
        body.onEndScroll = function () {
            table.loadMoreData();
        };


        this.onEndScroll = function () {
            table.loadMoreData();
        };


        this.onBackClick=function () {
          local.onClose();
        };


    }


}