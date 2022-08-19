import MouseCursor from "../../../../../core/Mouse/MouseCursor.js";
import AdminButton from "../../../../../framework/AdminButton.js";
import ContentBuilder from "../../../../Builder/ContentBuilder.js";
import ContentTypeCollectionListBox from "../../../../Com/ListBox/ContentTypeCollectionListBox.js";
import SearchAutocomplete from "../Autocomplete/SearchAutocomplete.js";
import ColumnFlexLayout from "../../../../../framework/Com/Layout/ColumnFlexLayout.js";
import SearchIndexTable from "../Table/SearchIndexTable.js";
import BootstrapRow from "../../../../../framework/Bootstrap/Layout/BootstrapRow.js";
import BootstrapColumn from "../../../../../framework/Bootstrap/Layout/BootstrapColumn.js";
import BootstrapContainer from "../../../../../framework/Bootstrap/Layout/BootstrapContainer.js";
import ContentTypeDataListBox from "../../../../Com/ListBox/ContentTypeDataListBox.js";
import ClearMenuIcon from "../../../../../framework/Com/Menu/Icon/ClearMenuIcon.js";


// FilterContentContainer
// SearchContentContainer
// SearchIndexContainer
export default class SearchIndexContainer extends BootstrapContainer {   // ColumnFlexLayout {

    render() {

        let local = this;


        let layoutRow = new BootstrapRow(this);

        let autocomplete = new SearchAutocomplete(layoutRow);
        autocomplete.onWordChange = function () {
            table.query = autocomplete.value;
            table.reloadData();

            col2.emptyContainer();

        };
        autocomplete.render();


        /*let dropdown = new FormContentTypeCollectionDropdown(this);
        dropdown.render();*/

        /*    let dropdown = new ContentTypeCollectionDropdown(this);
        dropdown.render();
        dropdown.onContentTypeChange = function (contentType) {
            contentType.showForm();
        };*/

        let contentTypeListBox = new ContentTypeDataListBox(layoutRow);  // new ContentTypeCollectionListBox(this);
        contentTypeListBox.defaultEmptyItem = true;
        //contentTypeListBox.widthPixel = 150;
        contentTypeListBox.onChange = function () {
            (new MouseCursor()).setWait();
            table.contentTypeId = contentTypeListBox.value;
            table.emptyData();
            table.loadTable();

            col2.emptyContainer();

        }
        contentTypeListBox.render();

        let clear = new ClearMenuIcon(layoutRow);
        clear.onClick=function () {
            autocomplete.value="";
            contentTypeListBox.value="";
            table.emptyData();
            col2.emptyContainer();
        };




        /*
        let btn = new AdminButton(this);
        btn.label = "Reload";
        btn.onClick = function () {
            table.reloadData();
        };*/

        let row = new BootstrapRow(this);

        let col1 = new BootstrapColumn(row);
        //col1.widthPixel = 400;
        col1.widthPercent = 50;
        //col1.heightPercent = 100;
        //col1.scrollVertical = true;
        //col1.overflow=OverflowStyle.AUTO;

        let col2 = new BootstrapColumn(row);
        //col2.addCssClass("sticky-top");
        col2.widthPercent = 50;


        let table = new SearchIndexTable(col1);  // new ContentTable(this);
        /*table.showEditIcon = false;
        table.showDeleteIcon = false;
        table.widthPercent = 100;
        table.maxHeightPercent=100;*/
        //table.heightPercent = 100;
        table.render();
        table.onDataRowClick = function (dataRow) {

            //(new UrlRedirect()).redirect("?content="+row.getData("content_id"));

            col2.emptyContainer();

            //let contentId = row.getData("content_id");

            let builder = new ContentBuilder();
            builder.getContent(dataRow.content_id);
            builder.onView = function (view) {
                col2.addContainer(view);
            };


            /*let loader = new ContentWidgetLoader();
            loader.fromContentId(contentId);*/
            //loader.onLoaded
            //).fromContentId(contentId)


            //(new Debug()).write(row.getData("id"));
            //WidgetContainer.clearWidget();
            /*(new ContentWidgetLoader()).fromContentId(row.getData("id"));

            if (local.onItemClick !== null) {
                local.onItemClick(row);
            }*/

        };


        /*table.onDeleteClick = function (id) {

            let service = new ServiceRequest("content-delete");
            service.addParameter("content-id", id);
            service.sendRequest();

        };*/


        //let div2 = new DivContainer(this);


    }

    set query(value) {

    }

}