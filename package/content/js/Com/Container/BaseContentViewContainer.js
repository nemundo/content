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


// PageContainer
export default class BaseContentViewContainer extends ViewContainer {

    NEW_VIEW = 10;

    ITEM_VIEW = 20;

    _search;


    render() {

        let local = this;

        this.addHomeView();
        this.addView(this.NEW_VIEW);
        this.addView(this.ITEM_VIEW);

        this.showHome();

    }


    showHome() {



    }


    showNew(contentType) {

        let local = this;

        let newView = this.showView(this.NEW_VIEW, true);

        let formCard = new BootstrapCard(newView);
        formCard.cardTitle = contentType.label;

        let form = contentType.getForm();
        form.onSubmit = function () {
            local._search.reloadData();
            local.showHomeView();
        };

        formCard.addContainer(form);

    }


    showItem(contentId) {

        let itemView = this.showView(this.ITEM_VIEW, true);

        let local = this;

        let backIcon = new BackMenuIcon(itemView);
        backIcon.label = "Back";
        backIcon.showLabel=true;
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