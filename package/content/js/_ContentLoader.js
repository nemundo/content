import BaseContainerList from "../html/Base/BaseList.js";
import Debug from "../core/Debug/Debug.js";
import JsonRequest from "../core/Web/JsonRequest.js";
import H1Container from "../html/Title/H1.js";
import WebConfig from "../html/Config/WebConfig.js";
import _WebRequestOld from "../core/Web/WebRequest.js";
import DivContainer from "../html/Content/Div.js";
import UrlBuilder from "../core/Url/UrlBuilder.js";

WebConfig.webUrl = "/web/";

let list = new BaseContainerList("content_hyerlink");
list.onClick = function () {

    let div = new DivContainer("content_view");
    div.text = this.id;

    let json = new JsonRequest();
    json.onLoaded = function (data) {

        let contentTitle = new H1Container("content_title");
        contentTitle.text = data.data[0].subject;

    };


    json.load(WebConfig.webUrl + "public/content-public/content-json?content=" + this.id);

    let url = new UrlBuilder(WebConfig.webUrl + "public/content-public/content-ajax_view");
    url.addParameter("content", this.id);

    let webRequest = new _WebRequestOld(url.getUrl());
    webRequest.onLoaded = function () {

        let div = new DivContainer("content_view");
        div.text = webRequest.getContent();

    };

};



