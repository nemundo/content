import DivContainer from "../../../../html/Content/Div.js";
import TreeTable from "./TreeTable.js";
import ParagraphContainer from "../../../../html/Content/Paragraph.js";
import Debug from "../../../../core/Debug/Debug.js";
import UploadToggleButton from "../../../../content_app/File/Com/Container/UploadToggleButton.js";
import TreeService from "../Service/TreeService.js";
import BreadcrumbList from "./BreadcrumbList.js";
import ContentAddToggleButton from "../../../Com/Container/ContentAddToggleButton.js";
import ContainerType from "../../../../content_app/Explorer/Content/Container/ContainerType.js";
import UrlType from "../../../../content_app/Bookmark/UrlType.js";
import ContentBuilder from "../../../Builder/ContentBuilder.js";


export default class TreeContainer extends DivContainer {

    parentId;

    _breadcrumb;

    _table;

    _info;

    _view;


    render() {

        let local = this;
        let parentId = this.parentId;

        let upload = new UploadToggleButton(this);
        upload.onSubmit = function (item) {

            let service = new TreeService();
            service.parentId = parentId;
            service.contentId = item.content_id;
            service.onFinished = function () {
                local._table.reloadTable();
            };
            service.sendRequest();

        };
        upload.render();


        let content = new ContentAddToggleButton(this);
        content.onSubmit = function (item) {

            let service = new TreeService();
            service.parentId = parentId;
            service.contentId = item.content_id;
            service.onFinished = function () {
                local._table.reloadTable();
            };
            service.sendRequest();

        };


        content
            .addContentType(new ContainerType())
            .addContentType(new UrlType());


        /*content.addContentType(new TextType())
            .addContentType(new UrlContentType())
            .addContentType(new ImageType())
            .addContentType(new DocumentType())
            .addContentType(new AudioType())
            .addContentType(new VideoType())
            .addContentType(new YouTubeType())
            .addContentType(new WebcamType())
            .addContentType(new ContainerType());*/


        content.render();


        this._breadcrumb = new BreadcrumbList(this);
        this._breadcrumb.onContentChange = function (contentId) {
            parentId = contentId;
            local.reloadContainer(parentId);
        };

        this._info = new ParagraphContainer(this);

        this._table = new TreeTable(this);
        this._table.parentId = this.parentId;
        this._table.onDataRowClick = function (tableRow) {

            parentId = tableRow.getData("content");
            let contentId = tableRow.getData("content");

            (new Debug()).write(tableRow.getData("content_type_id"));

            //content_type_id


            let dataId = tableRow.getData("data_id");

            local._view.emptyContainer();

            if (tableRow.getData("content_type_id") === (new ContainerType()).id) {

                local.reloadContainer(parentId);

            } else {

                local._info.text = "loading " + contentId;

                //local._view.emptyContainer();
                //let contentId = tableRow.getData("content_id");
                //(new Debug()).write()

                let builder = new ContentBuilder();
                builder.getContent(contentId);
                builder.onView = function (view) {
                    local._view.addContainer(view);
                };


            }


        };
        this._table.render();

        this._view = new DivContainer(this);

        this.reloadContainer(this.parentId);

    }


    reloadContainer(parentId) {

        this._info.text = parentId;

        this._breadcrumb.reload(parentId);

        this._table.parentId = parentId;
        this._table.reloadTable();

    }

}