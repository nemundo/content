import MenuIcon from "../../framework/Menu/MenuIcon.js";
import ContentContainer from "../Com/Container/ContentContainer.js";

export default class ContentMenuIcon extends MenuIcon {


    contentContainer = null;


    constructor(parentContainer = null) {

        super(parentContainer);

        this.label = "Content";
        this.icon = "search";

        let local = this;

        /*
        this.onClick = function () {

            let body = new BodyContainer();

            let container = new ContentContainer(body);
            container.render();


            /*
            let status = new StatusBar(body);
            status.render();


            let widget= new AdminWidget(new BodyContainer());  //  new FullScreenWidget();
widget.widthPercent=100;
            /*this.widthPercent = 100;
            this.leftPixel = 0;
            this.topPixel = 0;

            this.showBorder = false;*/

        /*widget.widgetTitle=local.label;
        widget.widgetIcon=local.icon;
        widget.closeButton=true;
        //widget.addContainer(new ContentContainer);

        let container  = new ContentContainer(widget);
        container.render();


        widget.render();*/


        //let widget = new ContentSearchWidget();
        /*widget.heightPixel = 600;
        widget.widthPercent = 50;*/

        //GlobalWidgetContainer.addWidget(widget);

        //}

    }


    render(appContainer) {

        super.render();

        let local = this;

        this.onClick = function () {

            //let body = new BodyContainer();

            if (local.contentContainer == null) {
                local.contentContainer = new ContentContainer();
                local.contentContainer.render();
            }

            local.contentContainer.visible=true;
            appContainer.addContainer(local.contentContainer);

        }


    }


}