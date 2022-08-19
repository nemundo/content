import WidgetContainer from "../../../../../framework/Com/Widget/WidgetContainer.js";
import SearchIndexTable from "../Table/SearchIndexTable.js";
import ContentBuilder from "../../../../Builder/ContentBuilder.js";
import ContentWidget from "../../../../Com/Widget/ContentWidget.js";
import BootstrapRow from "../../../../../framework/Bootstrap/Layout/BootstrapRow.js";
import BootstrapColumn from "../../../../../framework/Bootstrap/Layout/BootstrapColumn.js";
import ContentTypeGroupListBox from "../../../../Com/ListBox/ContentTypeGroupListBox.js";
import ContentTypeListGroup from "../../../../Com/ListGroup/ContentTypeListGroup.js";
import ClearMenuIcon from "../../../../../framework/Com/Menu/Icon/ClearMenuIcon.js";

export default class SearchResultWidget extends ContentWidget {   // WidgetContainer {

    query;

    render() {

        super.render();

        let local=this;

        this.addHomeView();
        let homeView= this.showHomeView();

        let layoutRow=new BootstrapRow(homeView);

        let col1=new BootstrapColumn(layoutRow);
        let col2=new BootstrapColumn(layoutRow);

        let table = new SearchIndexTable(col1);
        table.query = this.query; // search.value;
        table.render();
        table.onDataRowClick = function (dataRow) {

            local.showItem(dataRow.content_id);

            //col2.emptyContainer();

            //let contentId = row.getData("content_id");

            /*
            let builder = new ContentBuilder();
            builder.getContent(dataRow.content_id);
            builder.onView = function (contentView) {

                searchDiv.emptyContainer();
                searchDiv.addContainer(contentView);

            };*/

        };


        let clear = new ClearMenuIcon(col2);
        clear.onClick=function () {
            filter.clearActiveItem();
            table.contentTypeId="";
            table.reloadData();
        };
        clear.render();


        let filter=new ContentTypeListGroup(col2);
        filter.onContentTypeIdClick = function (contentTypeId) {
          table.contentTypeId=contentTypeId;
          table.reloadData();
        };
        filter.render();



    }

}