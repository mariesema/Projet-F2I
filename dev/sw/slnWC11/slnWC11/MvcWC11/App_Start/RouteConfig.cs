using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Web.Routing;

namespace MvcWC11
{
    public class RouteConfig
    {
        public static void RegisterRoutes(RouteCollection routes)
        {
            routes.IgnoreRoute("{resource}.axd/{*pathInfo}");


            routes.MapRoute("Search",
                "Search/{searchTerm}",
                    new
                    {
                        controller = "Home",
                        action = "Stats",
                        searchTerm = UrlParameter.Optional
                    }
                    );



            routes.MapRoute("Log", "Inscription",
                new { controller = "Account", action = "Register" });

            routes.MapRoute("Recherche", "CommentSup/{note}",
                    new
                    {
                        controller = "Comment",
                        action = "RechercheByNote",
                        note = UrlParameter.Optional
                    }, new { note = @"\d{0,2}"  }
                    );

            routes.MapRoute("routeListing", "Listing",
                    new
                    {
                        controller = "Comment",
                        action = "ListParSQL"                 
                    }
                    );

            routes.MapRoute(
                name: "Default",
                url: "{controller}/{action}/{id}",
                defaults: new { controller = "Restaurant", action = "Index", id = UrlParameter.Optional }
            );


        }
    }
}