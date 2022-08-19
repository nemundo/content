import PageContainer from "../../framework/Page/PageContainer.js";
import DivContainer from "../../html/Content/Div.js";
import PositionStyle from "../../html/Style/Position.js";
import ContentParameterBuilder from "../Builder/ContentParameterBuilder.js";

export default class ContentItemPage extends PageContainer {

    constructor(parentContainer) {

        super(parentContainer);
        this.pageTitle = "Content Item";

    }


    render() {

        let contentDiv = new DivContainer(this);
        contentDiv.position = PositionStyle.FIXED;
        contentDiv.heightPercent = 100;
        contentDiv.widthPercent = 100;
        //contentDiv.backgroundColor = ColorStyle.ORANGE;

        let contentParameter = new ContentParameterBuilder();
        contentParameter.fromContentParameter(contentDiv);

    }

}
