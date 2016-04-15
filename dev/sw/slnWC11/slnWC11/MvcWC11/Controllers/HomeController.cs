using MvcWC11.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace MvcWC11.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            ViewBag.Message = "Modify this template to jump-start your ASP.NET MVC application.";
            ViewBag.Title = "Page d'Accueil";

            return View();
        }

        public ActionResult About()
        {
            ViewBag.Message = "Your app description page.";

            return View();
        }

        public ActionResult Contact()
        {
            ViewBag.Message = "Your contact page.";

            return View();
        }

        public ActionResult Test()
        {
            string controleur = RouteData.Values["controller"].ToString();
            var action = RouteData.Values["action"].ToString();
            var param = RouteData.Values["id"] == null ? "" : RouteData.Values["id"].ToString();



            ViewBag.MonMessage = String.Format("Controleur : {0} Action : {1} Id : {2}", controleur, action, param);

            return View();

        }


        public ActionResult Accueil()
        {
            dbRestoEntities db = new dbRestoEntities();

            //var restaurants = db.Restos.OrderBy(r => r.Nom).ToList();

            //var restaurants = from r in db.Restos
            //                  orderby r.Critiques.Count descending
            //                  select r;


            //int val = null;
            int? val = null;
            Nullable<int> val2 = null;


            var restaurants =
                            from r in db.Restos
                            orderby r.Critiques
                                        .Average(c => c.Note) descending
                            select r;

            return View(restaurants);
        }

        /// <summary>
        /// 
        /// </summary>
        /// <param name="searchTerm"></param>
        /// <returns></returns>
        public ActionResult Stats(string searchTerm = null)
        {
            dbRestoEntities db = new dbRestoEntities();

            var restaurants =
                from r in db.Restos
                    .Where(r => ((searchTerm == null)? true:r.Nom.StartsWith(searchTerm)))                            
                            orderby r.Critiques
                                        .Average(c => c.Note) descending
                            select new RestoListViewModel()
                            {
                                Id = r.Id,
                                Name = r.Nom,
                                Localization = r.Nom + ", " + r.Ville,
                                NumberOfRemarks = r.Critiques.Count,
                                AverageOfRemarks =
    (r.Critiques.Count > 0) ? r.Critiques.Average(c => c.Note).Value : 0
                            };

            //Si Ajax 
            if (Request.IsAjaxRequest())
            {
                System.Threading.Thread.Sleep(500);
                return PartialView("_Restos", restaurants);
            }



            return View(restaurants);
        }


    }
}
