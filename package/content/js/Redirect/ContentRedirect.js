import UrlRedirect from "../../core/Url/UrlRedirect.js";

export default class ContentRedirect {

    redirect(contentId) {

        (new UrlRedirect()).redirect("?content=" + contentId);

    }

}