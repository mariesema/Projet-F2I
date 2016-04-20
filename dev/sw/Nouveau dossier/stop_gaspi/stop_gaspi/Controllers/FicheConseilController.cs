using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace MvcApplication1.Controllers
{
    public class FicheConseilController : Controller
    {
        //
        // GET: /FicheConseil/

        public ActionResult Index()
        {
            return View();
        }


        public ActionResult IndexList()
        {
            return View();
        }


        //
        // GET: /FicheConseil/Details/5

        public ActionResult Details(int id)
        {
            return View();
        }

        //
        // GET: /FicheConseil/Create

        public ActionResult Create()
        {
            return View();
        }

        //
        // POST: /FicheConseil/Create

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
        // GET: /FicheConseil/Edit/5

        public ActionResult Edit(int id)
        {
            return View();
        }

        //
        // POST: /FicheConseil/Edit/5

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
        // GET: /FicheConseil/Delete/5

        public ActionResult Delete(int id)
        {
            return View();
        }

        //
        // POST: /FicheConseil/Delete/5

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
