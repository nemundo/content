import UnorderedList from "../../../../html/Listing/UnorderedList.js";
import ServiceRequest from "../../../../framework/Service/ServiceRequest.js";
import HyperlinkContainer from "../../../../html/Hyperlink/Hyperlink.js";
import LiContainer from "../../../../html/Listing/LiContainer.js";

export default class BreadcrumbList extends UnorderedList {

    onContentChange=null;

    reload(contentId) {

        let local=this;

        this.emptyContainer();

        let breadcrumb = new ServiceRequest("tree-breadcrumb");
        breadcrumb.addParameter("content",contentId);

        breadcrumb.onDataRow = function (dataRow) {

            let li = new LiContainer(local);

            let hyperlink=new HyperlinkContainer(li);
            hyperlink.text = dataRow.subject;
            hyperlink.href="#";
            hyperlink.onClick=function () {

                if (local.onContentChange!==null) {
                local.onContentChange(dataRow.content_id);
                }

            };

        }
        breadcrumb.sendRequest();

    }

}