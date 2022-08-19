import ViewWidgetContainer from "../../../framework/Com/Widget/ViewWidget.js";
import ContentTable from "../Table/ContentTable.js";
import ContentBuilder from "../../Builder/ContentBuilder.js";
import ContentTypeCollectionListBox from "../ListBox/ContentTypeCollectionListBox.js";
import ReloadMenuIcon from "../../../framework/Com/MenuIcon/ReloadMenuIcon.js";
import NewMenuIcon from "../../../framework/Com/Menu/Icon/NewMenuIcon.js";
import {TextContentForm} from "../../../content_app/Text/TextForm.js";
import ContentDeleteService from "../../Service/ContentDeleteService.js";
import _FormContentTypeCollectionDropdown from "../Dropdown/FormContentTypeCollectionDropdown.js";
import WidgetContainer from "../../../framework/Com/Widget/Widget.js";
import TreeActionView from "../../Index/Tree/Action/TreeActionView.js";
import FavoriteActionView from "../../../content_app/Favorite/Action/FavoriteActionView.js";
import ContentTypeCollection from "../../Type/ContentTypeCollection.js";
import H1Container from "../../../html/Title/H1.js";
import DivContainer from "../../../html/Content/Div.js";
import GeoActionView from "../../Index/Geo/Action/GeoActionView.js";
import ContentTypeDataListBox from "../ListBox/ContentTypeDataListBox.js";

export default class _ContentWidget extends ViewWidgetContainer {


    LIST_VIEW = 1;

    ITEM_VIEW = 2;

    NEW_VIEW = 3;

    EDIT_VIEW = 4;


    constructor(parentContainer) {

        super(parentContainer);

        this.widgetTitle = "Content";
        this.widgetIcon = "file-earmark";

    }


    render() {

        let local = this;

        this.scrollWidget = true;

        this.onWidgetEndScroll = function () {
            table.loadMoreData();
        };

        this.addView(this.LIST_VIEW);
        this.addView(this.ITEM_VIEW);
        this.addView(this.NEW_VIEW);
        this.addView(this.EDIT_VIEW);

        this.addTitle(this.LIST_VIEW, "Content");

        let listView = this.viewList[this.LIST_VIEW];


        let newBtn = new NewMenuIcon(listView);
        newBtn.onClick = function () {
            local.showView(local.NEW_VIEW);

            let newView = local.showView(local.NEW_VIEW);  // local.viewList[local.NEW_VIEW];
            newView.emptyContainer();

            let listbox = new ContentTypeCollectionListBox(newView);

            let formContainer = new DivContainer(newView);


            listbox.onContentTypeChange = function (contentType) {

                formContainer.emptyContainer();

                if (contentType.hasForm()) {

                    let h1 = new H1Container(formContainer);
                    h1.text = contentType.label;

                    let form = contentType.getForm();
                    form.onSubmit = function () {
                        formContainer.emptyContainer();
                        local.showView(local.LIST_VIEW);
                    };
                    form.render();

                    formContainer.addContainer(form);

                }

            };
            listbox.render();



            /*let dropdown = new FormContentTypeCollectionDropdown(newView);
            dropdown.render();*/

            /*
            let form = new TextContentForm(view);  // new PolygonLineType();  // new UrlForm(view);
            form.onSubmit = function () {
                local.showView(local.LIST_VIEW);
            };
            form.render();*/


        };
        newBtn.render();


        let contentType = new ContentTypeCollectionListBox(listView);
        contentType.onChange = function () {
            table.contentTypeId = contentType.value;
            table.reloadData();

            /*countService.onRow=function (dataRow) {
                p.text=dataRow.count_text+" items found";
            };*/
            /*countService.contentTypeId=contentType.value;
            countService.sendRequest();*/

        };



        let contentType2 = new ContentTypeDataListBox(listView);
        contentType2.onChange = function () {
            table.contentTypeId = contentType2.value;
            table.reloadData();
        };



        let btn = new ReloadMenuIcon(listView);
        btn.onClick = function () {
            table.reloadData();
        };


        let table = new ContentTable(listView);
        table.widthPercent = 100;
        table.maxHeightPercent = 100;
        //table.heightPercent = 100;
        /*table.showEditIcon = true;
        table.showDeleteIcon = true;*/
        table.paginationLimit = 50;
        table.onViewClick = function (dataRow) {

            //(new Debug()).write(dataRow);

            local.showView(local.ITEM_VIEW);
            local.setPreviousViewStatus(local.LIST_VIEW);

            let itemView = local.viewList[local.ITEM_VIEW];
            itemView.emptyContainer();

            let builder = new ContentBuilder();
            builder.onView = function (view) {

                //widget.widgetTitle=builder.subject;

                /*let h1=new H1Container(viewContainer);
                h1.text= builder.subject;*/

                local.widgetTitle = dataRow.subject;
                itemView.addContainer(view);


                let actionWidget = new WidgetContainer(itemView);
                actionWidget.widgetTitle = "Tree";
                actionWidget.showBackButton = false;

                let treeAction = new TreeActionView(actionWidget);
                treeAction.contentId = dataRow.content_id;

                treeAction.render();


                let actionWidget2 = new WidgetContainer(itemView);
                actionWidget2.widgetTitle = "Favorite";

                let treeAction2 = new FavoriteActionView(actionWidget2);
                treeAction2.contentId = dataRow.content_id;
                treeAction2.render();


                let actionWidget3 = new WidgetContainer(itemView);
                actionWidget3.widgetTitle = "Geo";

                let treeAction3 = new GeoActionView(actionWidget3);
                treeAction3.contentId = dataRow.content_id;
                treeAction3.render();




            };
            builder.getContent(dataRow.content_id);


        };

        table.onEditClick = function (dataRow) {

            let view = local.showView(local.EDIT_VIEW);
            view.emptyContainer();

            let contentType = (new ContentTypeCollection()).getContentType(dataRow.content_type_id);

            //let form = contentType.getForm(dataRow.data_id);
            let form = contentType.getForm(dataRow.content_id);
            form.onAfterSubmit = function () {

                local.showView(local.LIST_VIEW);

            };
            //form.onEdit(dataRow.content_id);
            form.render();

            view.addContainer(form);

        };


        table.onDeleteClick = function (dataRow) {

            let deleteService = new ContentDeleteService();
            deleteService.contentId = dataRow.content_id;
            deleteService.sendRequest();

        };


        table.render();


        this.onOpen = function () {
            local.showView(local.LIST_VIEW);
        };


    }


    showView(viewId) {
        super.showView(viewId);

        if (viewId === this.LIST_VIEW) {
            this._previousViewStatus = this.CLOSE_WIDGET;
        }

        return this.getView(viewId);

    }

    getView(viewId) {

        // exists
        let view = this.viewList[viewId];


        return view;


    }


}