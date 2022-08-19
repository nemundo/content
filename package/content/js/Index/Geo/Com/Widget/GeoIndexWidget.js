import WidgetContainer from "../../../../../framework/Com/Widget/WidgetContainer.js";
import GeoIndexTable from "../Table/GeoIndexTable.js";
import GeoContentTypeListBox from "../ListBox/GeoContentTypeListBox.js";
import DocumentContainer from "../../../../../html/Document/Document.js";
import Debug from "../../../../../core/Debug/Debug.js";
import ContentWidget from "../../../../Com/Widget/ContentWidget.js";

export default class GeoIndexWidget extends ContentWidget {


    /*constructor(parentContainer) {

        super(parentContainer);
        this.widgetTitle = "Geo Index";
        this.widgetIcon = "geo-alt";

    }*/


    render() {

        super.render();

        let local=this;

        this.addHomeView();
        let homeView= this.showHomeView();

        //let search = new BootstrapAutocomplete(homeView);

        let geoContentType = new GeoContentTypeListBox(homeView);
        geoContentType.defaultEmptyItem=true;
        geoContentType.onChange = function () {
            table.contentTypeId = geoContentType.value;
            table.reloadData();
        };
        geoContentType.render();

        let table = new GeoIndexTable(homeView);
        table.paginationLimit = 40;
        table.onDataRowClick=function (dataRow) {
            local.showItem(dataRow.content_id);
        };
        table.render();

        /*let document=new DocumentContainer();
        document.onEndScroll=function () {
            (new Debug()).write("end scroll");
            table.loadMoreData();
        };*/





        /*
        this.scrollWidget = true;

        let geoContentType = new GeoContentTypeListBox(this);
        geoContentType.onChange = function () {
            table.contentTypeId = geoContentType.value;
            table.reloadData();
        };
        geoContentType.render();

        let table = new GeoIndexTable(this);
        table.paginationLimit = 100;
        table.render();

        this.onWidgetEndScroll = function () {
            table.loadMoreData();
        };*/


    }


}