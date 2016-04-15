using MvcWC11.Filters;
using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace MvcWC11.Controllers
{
    public class RestaurantController : Controller
    {
        private dbRestoEntities db = new dbRestoEntities();

        //
        // GET: /Restaurant/

        [Log]
        public ActionResult Index()
        {
            
            return View(db.Restos.ToList());
        }

        //
        // GET: /Restaurant/Details/5

        public ActionResult Details(int id = 0)
        {
            Resto resto = db.Restos.Single(r => r.Id == id);
            if (resto == null)
            {
                return HttpNotFound();
            }
            return View(resto);
        }

        //
        // GET: /Restaurant/Create

        public ActionResult Create()
        {
            ViewBag.LesVilles = MesVilles();
            return View();
        }

        //
        // POST: /Restaurant/Create

        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create(Resto resto)
        {
            if (ModelState.IsValid)
            {
                db.Restos.AddObject(resto);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(resto);
        }

        //
        // GET: /Restaurant/Edit/5

        public ActionResult Edit(int id = 0)
        {
            Resto resto = db.Restos.Single(r => r.Id == id);
            if (resto == null)
            {
                return HttpNotFound();
            }
            return View(resto);
        }

        //
        // POST: /Restaurant/Edit/5

        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit(Resto resto)
        {

            
            if (ModelState.IsValid)
            {
                db.Restos.Attach(resto);
                db.ObjectStateManager.ChangeObjectState(resto, EntityState.Modified);
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(resto);
        }

        //
        // GET: /Restaurant/Delete/5

        public ActionResult Delete(int id = 0)
        {
            Resto resto = db.Restos.Single(r => r.Id == id);
            if (resto == null)
            {
                return HttpNotFound();
            }
            return View(resto);
        }

        //
        // POST: /Restaurant/Delete/5

        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            Resto resto = db.Restos.Single(r => r.Id == id);
            db.Restos.DeleteObject(resto);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        public SelectList MesVilles()
        {

            string[] villes = new string[] 
            {
               "Paris", "Lyon", "Marseille", "Monaco", "Rennes"
            };

            var lesvilles = villes.Select(v => new { Value=v, Text = v});

            SelectList lstVilles = new SelectList(lesvilles, "Value", "Text");

            return lstVilles;

        }



        protected override void Dispose(bool disposing)
        {
            db.Dispose();
            base.Dispose(disposing);
        }
    }
}