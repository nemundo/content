import ViewWidgetContainer from "../../../../../framework/Com/Widget/ViewWidget.js";

import SearchAutocomplete from "../Autocomplete/SearchAutocomplete.js";
import ContentTypeCollectionListBox from "../../../../Com/ListBox/ContentTypeCollectionListBox.js";
import MouseCursor from "../../../../../core/Mouse/MouseCursor.js";
import ContentTable from "../../../../Com/Table/ContentTable.js";
import ContentBuilder from "../../../../Builder/ContentBuilder.js";
import SearchIndexTable from "../Table/SearchIndexTable.js";

// ContentSearchWidget
export default class SearchContentWidget extends ViewWidgetContainer {


    ITEM_VIEW=10;

    constructor(parentContainer) {

        super(parentContainer);
        this.widgetTitle = "Search";
        this.widgetIcon = "search";

    }


    render() {

        let local = this;

        this.addHomeView();
        this.addHomeTitle("Content Search");
        let homeView = this.showHomeView();

        this.addView(this.ITEM_VIEW);


        let autocomplete = new SearchAutocomplete(homeView);
        autocomplete.onWordChange = function () {
            table.query = autocomplete.value;
            table.reloadData();
        };
        autocomplete.render();


        /*let dropdown = new FormContentTypeCollectionDropdown(this);
        dropdown.render();*/

        /*    let dropdown = new ContentTypeCollectionDropdown(this);
        dropdown.render();
        dropdown.onContentTypeChange = function (contentType) {
            contentType.showForm();
        };*/

        let contentType = new ContentTypeCollectionListBox(homeView);
        contentType.defaultEmptyItem = true;
        contentType.widthPixel = 150;
        contentType.onChange = function () {
            (new MouseCursor()).setWait();
            table.contentTypeId = contentType.value;
            table.emptyData();
            table.loadTable();
        };


        /*
        let btn = new AdminButton(this);
        btn.label = "Reload";
        btn.onClick = function () {
            table.reloadData();
        };*/


        let table = new SearchIndexTable(homeView);
        table.showEditIcon = false;
        table.showDeleteIcon = false;
        table.widthPercent = 100;
        table.maxHeightPercent = 100;
        //table.heightPercent = 100;
        table.render();
        table.onDataRowClick = function (dataRow) {

            let itemView=local.showView(local.ITEM_VIEW,true);
            local.setPreviousViewStatus(local.HOME_VIEW);

            let builder = new ContentBuilder();
            builder.onView = function (view) {
                itemView.addContainer(view);
                local.widgetTitle=builder.subject;
            };
            builder.getContent(dataRow.content_id);

        };

    }

}