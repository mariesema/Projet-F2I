using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace MvcWC11.MesHelpers
{
    public static class PucesHelper
    {

        public static MvcHtmlString ListUL(this HtmlHelper html, string[] listItems)
        {
            TagBuilder tag = new TagBuilder("ul");

            foreach (var item in listItems)
            {
                TagBuilder tagli = new TagBuilder("li");
                tagli.SetInnerText(item);
                tag.InnerHtml += tagli.ToString();
            }
            return MvcHtmlString.Create(tag.ToString());
        }

        public static MvcHtmlString ImageAndTitle(this HtmlHelper html, string chemin, int dim, string titre)
        {
            TagBuilder tag = new TagBuilder("img");

            tag.Attributes.Add("src", chemin);
            tag.Attributes.Add("alt", titre);
            tag.Attributes.Add("title", titre);
            tag.Attributes.Add("width", dim + "px");
            tag.Attributes.Add("height", dim + "px");

            return MvcHtmlString.Create(tag.ToString());
        }



    }
}