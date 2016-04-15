using MvcWC11.Filters;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace MvcWC11.Controllers
{
    //[Authorize(Roles = "Membres", Users="user1")]
    [Droits]
    public class CritiqueController : Controller
    {
        dbRestoEntities db = new dbRestoEntities();

        //
        // GET: /Critique/

        public ActionResult Index(int RestoId)
        {
            var resto = db.Restos.Where(r => r.Id == RestoId).Single();

            if (resto != null)
                return View(resto);


            return HttpNotFound();
        }


        [HttpGet]
        //[Authorize(Roles="Membres")]
        public ActionResult Create(int RestoId)
        {
            Critique c = new Critique();
            c.RestoId = RestoId;
            return View(c);
        }

        [HttpPost]
        //[Authorize(Roles="Membres")]
        public ActionResult Create(Critique critiqueToAdd)
        {
            //Permet une validation Coté Serveur
            //if (db.Critiques.Where(c => c.Pseudo.Equals(critiqueToAdd.Pseudo)).Count() != 0)
            //{
            //    ModelState.AddModelError("Pseudo", "Pseudo déjà utilisé !!!");
            //    return View(critiqueToAdd);
            //}

            if (ModelState.IsValid)
            {
                db.Critiques.AddObject(critiqueToAdd);
                db.SaveChanges();
                return RedirectToAction("Index", "Critique", new { RestoId = critiqueToAdd.RestoId });
            
            }

            return View(critiqueToAdd);


        }

        public JsonResult VerifPseudo(string Pseudo)
        {
            bool reponse =
                db.Critiques.Where(c => c.Pseudo.Equals(Pseudo)).Count() != 0;

            if (reponse == true)
                return Json("Pseudo déja utilisé", JsonRequestBehavior.AllowGet);
            else
                return Json(true,  JsonRequestBehavior.AllowGet);

        }


        [HttpPost]
        public ActionResult Delete(int id)
        {
            Critique critique = db.Critiques.Where(c => c.Id == id).Single();
            db.Critiques.DeleteObject(critique);
            db.SaveChanges();

            if (Request.IsAjaxRequest())
            {
                return Json(new { Message = "Suppression Ok", Numero = id });
             //   return Json("Suppression ok");
            }


            return RedirectToAction("Index", critique.RestoId);
        }





    }
}
