import IconPageContainer from "../../../../framework/Page/IconPageContainer.js";
import SearchIndexContainer from "../Com/Container/SearchIndexContainer.js";


// SearchIndexPage
export default class SearchIndexPage extends IconPageContainer {

    constructor(parentContainer) {

        super(parentContainer);
        this.pageTitle = "Search";
        this.pageIcon = "search";

    }


    render() {

        let container = new SearchIndexContainer(this);
        container.render();

    }

}