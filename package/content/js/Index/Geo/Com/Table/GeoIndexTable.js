import ImageContainer from "../../../../../html/Image/Image.js";
import ServiceDataTable from "../../../../../framework/Data/Table/ServiceDataTable.js";
import BootstrapDataTable from "../../../../../framework/Bootstrap/Table/BootstrapDataTable.js";

export default class GeoIndexTable extends BootstrapDataTable {

    constructor(parentContainer) {

        super(parentContainer);

        this.paginationLimit=30;
        //this.tableHeight = 300;

        this.service="geo-list";
        this.showEditIcon=true;
        this.showDeleteIcon=true;
        this.reloadOnScroll=false;


    }


    // contentId
    set content(contentId) {

        this.addParameter("content", contentId);

    }


    set contentTypeId(contentTypeId) {

        this.addParameter("content-type", contentTypeId);

    }


    onHeader(header) {

        //header.addEmpty();
        header.addText("Subject");
        header.addText("Text");
        header.addText("Content Type");
        header.addText("Lat");
        header.addText("Lon");

    }


    onRow(tableRow, dataRow) {

        /*let img=new ImageContainer(tableRow);
        img.src = dataRow.image_url;
        img.widthPixel=300;*/

        tableRow.addText(dataRow.subject);
        tableRow.addText(dataRow.text);
        tableRow.addText(dataRow.content_type);
        tableRow.addText(dataRow.lat);
        tableRow.addText(dataRow.lon);

    }

}