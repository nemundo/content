import WidgetContainer from "../../../framework/Com/Widget/WidgetContainer.js";
import ContentBuilder from "../../Builder/ContentBuilder.js";
import ContentTable from "../Table/ContentTable.js";
import BackMenuIcon from "../../../framework/Com/Menu/Icon/ArrowLeftMenuIcon.js";
import BootstrapCard from "../../../framework/Bootstrap/Card/BootstrapCard.js";
import DocumentContainer from "../../../html/Document/Document.js";
import ActionContainer from "../Container/ActionContainer.js";
import MouseCursor from "../../../core/Mouse/MouseCursor.js";
import HrContainer from "../../../html/Layout/HrContainer.js";
import Debug from "../../../core/Debug/Debug.js";

export default class ContentWidget extends WidgetContainer {

    NEW_VIEW = 10;

    ITEM_VIEW = 20;

    LIST_VIEW = 30;


    render() {

        let local = this;

        this.addHomeView();
        let homeView = this.showHomeView();

        this.addView(this.NEW_VIEW);
        this.addView(this.ITEM_VIEW);

    }


    addListView() {
        this.addView(this.LIST_VIEW);
    }


    showList(contentType) {

        let listView = this.showView(this.LIST_VIEW, true);

        let local=this;

        let backIcon = new BackMenuIcon(listView);
        backIcon.label = "Back";
        backIcon.showLabel = true;
        backIcon.onClick = function () {
            local.showHomeView();
        };
        backIcon.render();

        if (contentType.hasSearch()) {

            let search = contentType.getSearch();
            search.onContentClick=function (contentId) {
                local.showItem(contentId);
            };
            search.render();

            listView.addContainer(search);

        } else {

            let table = new ContentTable(listView);
            table.showContentType = false;
            table.contentTypeId = contentType.id;
            table.onDataRowClick=function (dataRow) {
                local.showItem(dataRow.content_id);
            };
            table.render();

        }


    }


    showNew(contentType) {

        let local = this;

        let newView = this.showView(this.NEW_VIEW, true);

        let backIcon = new BackMenuIcon(newView);
        backIcon.label = "Back";
        backIcon.showLabel = true;
        backIcon.onClick = function () {
            local.showHomeView();
        };
        backIcon.render();


        let formCard = new BootstrapCard(newView);
        formCard.cardTitle = contentType.label;

        let form = contentType.getForm();
        form.onSubmit = function () {
            local.showHomeView();
        };

        formCard.addContainer(form);

    }


    showItem(contentId) {

        let itemView = this.showView(this.ITEM_VIEW, true);

        let local = this;

        let backIcon = new BackMenuIcon(itemView);
        backIcon.label = "Back";
        backIcon.showLabel = true;
        backIcon.onClick = function () {
            local.showHomeView();
        };
        backIcon.render();

        let card = new BootstrapCard(itemView);

        (new MouseCursor()).setWait();

        let builder = new ContentBuilder();
        builder.getContent(contentId);
        builder.onView = function (view) {

            (new DocumentContainer()).title = builder.subject;

            card.addContainer(view);
            card.cardTitle = builder.subject;

            new HrContainer(card);

            let actionView = new ActionContainer(card);
            actionView.contentId = contentId;
            actionView.render();

            (new MouseCursor()).setDefault();

        }

    }


}