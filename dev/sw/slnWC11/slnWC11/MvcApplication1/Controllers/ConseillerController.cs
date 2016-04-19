using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace MvcApplication1.Controllers
{
    public class ConseillerController : Controller
    {
        //
        // GET: /Conseiller/

        public ActionResult Index()
        {
            return View();
        }

        //
        // GET: /Conseiller/Details/5

        public ActionResult Details(int id)
        {
            return View();
        }

        //
        // GET: /Conseiller/Create

        public ActionResult Create()
        {
            return View();
        }

        //
        // POST: /Conseiller/Create

        [HttpPost]
        public ActionResult Create(FormCollection collection)
        {
            try
            {
                // TODO: Add insert logic here

                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }

        //
        // GET: /Conseiller/Edit/5

        public ActionResult Edit(int id)
        {
            return View();
        }

        //
        // POST: /Conseiller/Edit/5

        [HttpPost]
        public ActionResult Edit(int id, FormCollection collection)
        {
            try
            {
                // TODO: Add update logic here

                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }

        //
        // GET: /Conseiller/Delete/5

        public ActionResult Delete(int id)
        {
            return View();
        }

        //
        // POST: /Conseiller/Delete/5

        [HttpPost]
        public ActionResult Delete(int id, FormCollection collection)
        {
            try
            {
                // TODO: Add delete logic here

                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }
    }
}
