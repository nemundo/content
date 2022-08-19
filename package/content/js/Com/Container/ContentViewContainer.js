import ViewContainer from "../../../framework/Com/View/ViewContainer.js";
import BootstrapButton from "../../../framework/Bootstrap/Button/BootstrapButton.js";
import ContentTypeDataListBox from "../ListBox/ContentTypeDataListBox.js";
import DivContainer from "../../../html/Content/Div.js";
import ContentTypeCollection from "../../Type/ContentTypeCollection.js";
import Debug from "../../../core/Debug/Debug.js";
import BootstrapCard from "../../../framework/Bootstrap/Card/BootstrapCard.js";
import ContentBuilder from "../../Builder/ContentBuilder.js";
import DocumentContainer from "../../../html/Document/Document.js";
import MouseCursor from "../../../core/Mouse/MouseCursor.js";
import ActionContainer from "./ActionContainer.js";
import ContentTable from "../Table/ContentTable.js";
import BackMenuIcon from "../../../framework/Com/Menu/Icon/ArrowLeftMenuIcon.js";
import ApplicationListBox from "../../../framework/Application/Com/ListBox/ApplicationListBox.js";
import BootstrapRow from "../../../framework/Bootstrap/Layout/BootstrapRow.js";
import AddContentMenuIcon from "../MenuIcon/AddContentMenuIcon.js";


// PageContainer
export default class ContentViewContainer extends ViewContainer {

    NEW_VIEW = 10;

    ITEM_VIEW = 20;

    _search=null;


    render() {

        let local = this;

        this.addHomeView();
        this.addView(this.NEW_VIEW);
        this.addView(this.ITEM_VIEW);

        this.showHome();

    }


    showHome() {

        let local = this;

        let homeView = this.showHomeView();

        let layoutRow = new BootstrapRow(homeView);

        let application = new ApplicationListBox(layoutRow);
        application.defaultEmptyItem = true;
        application.onChange = function () {
            contentTypeListBox.applicationId = application.value;
            contentTypeListBox.reloadData();
        };
        application.render();

        let contentTypeListBox = new ContentTypeDataListBox(layoutRow);
        contentTypeListBox.defaultEmptyItem = true;
        contentTypeListBox.onChange = function () {

            homeContainer.emptyContainer();

            let contentType = (new ContentTypeCollection()).getContentType(contentTypeListBox.value);

            if (contentType !== null) {

                if (contentType.hasForm()) {

                    let btn = new BootstrapButton(homeContainer);
                    btn.label = "New";
                    btn.onClick = function () {
                        local.showNew(contentType);
                    };

                }


                if (contentType.hasSearch()) {

                    local._search = contentType.getSearch();
                    local._search.onContentClick = function (contentId) {
                        local.showItem(contentId);
                    };
                    local._search.render();

                    homeContainer.addContainer(local._search);

                } else {

                    local._search = new ContentTable(homeContainer);
                    local._search.contentTypeId = contentType.id;
                    local._search.paginationLimit = 50;
                    local._search.onDataRowClick = function (dataRow) {

                        (new MouseCursor()).setWait();
                        local.showItem(dataRow.content_id);

                    };
                    local._search.render();

                    homeContainer.onEndScroll = function () {
                        (new Debug()).write("end scroll");
                        table.loadMoreData();
                    };

                }

            }

        };
        contentTypeListBox.render();


        let dropdown = new AddContentMenuIcon(homeView);
        dropdown.onContentType = function (contentType) {
            local.showNew(contentType);
        };
        dropdown.render();


        let homeContainer = new DivContainer(homeView);

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

            if (local._search!==null) {
            local._search.reloadData();
            }

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

        /*
        let back = new HyperlinkContainer(itemView);
        back.text = "Back";
        back.onClick = function () {
            local.showHomeView();
        };*/

        let card = new BootstrapCard(itemView);

        let builder = new ContentBuilder();
        builder.getContent(contentId);
        builder.onView = function (view) {

            (new DocumentContainer()).title = builder.subject;

            card.addContainer(view);
            card.cardTitle = builder.subject;

            let actionView = new ActionContainer(card);
            actionView.contentId = contentId;
            actionView.render();

            (new MouseCursor()).setDefault();

        }

    }

}