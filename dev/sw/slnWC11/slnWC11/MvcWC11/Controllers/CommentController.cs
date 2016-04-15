using MvcWC11.Models;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.Common;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace MvcWC11.Controllers
{
    public class CommentController : Controller
    {

        static List<Comment> _commentaires =
            new List<Comment>() 
            {
                new Comment { Id = 1 , Texte="top", Note=7},
                new Comment { Id = 2 , Texte="Bof", Note=5},
                new Comment { Id = 3 , Texte="Naze", Note=2},
                new Comment { Id = 4 , Texte="Pas mal", Note=6},
                new Comment { Id = 5 , Texte="Genial", Note=9.2f},
                 new Comment { Id = 6 , Texte="<script>alert('Faille');</script>", Note=9.2f}

            };

        //
        // GET: /Comment/

        public ActionResult Index()
        {
            //LINQ - Formalisme Requete
            var model =
                from c in _commentaires
                orderby c.Note descending
                select c;

            ViewBag.Pire = PireCommentaire().Texte;

            return View(model);
        }

        public ActionResult RechercheById(int id)
        {
            //LINQ - Formalisme Requete
            var model =
                (from c in _commentaires
                 where c.Id == id
                 select c).Single<Comment>();


            return View(model);
        }

        public ActionResult Test()
        {
            //LINQ - Formalisme Requete
            var model =
                from c in _commentaires
                orderby c.Note descending
                select c;


            return View(model);
        }


        public ActionResult RechercheByNote(int note = 0)
        {
            //LINQ - Formalisme Requete
            var model = _commentaires
                            .OrderByDescending(c => c.Note)
                            .Where(c => c.Note >= note)
                            .Select(c => c);

            return View(model);
        }


        // GET /Comment/Edit/2
        [HttpGet]
        public ActionResult Edit(int id)
        {
            var commentaire = _commentaires.Single(x => x.Id == id);
            return View(commentaire);
        }

        [HttpPost]
        public ActionResult Edit(int id, FormCollection collection)
        {
            var comment = _commentaires.Single(c => c.Id == id);
            if (TryUpdateModel(comment))
            {
                if ((comment.Note < 0) || (comment.Note > 10))
                {
                    ModelState.AddModelError("Note", "Note invalide !!!");
                    return View();
                }
                if (comment.Texte.Length > 15)
                {
                    ModelState.AddModelError("Texte", "Texte trop Long !!!");
                    return View();
                }
                comment.Texte = collection["Texte"];
                comment.Note = Single.Parse(collection["Note"]);
                return RedirectToAction("Index");
            }
            return View();


        }

        public ActionResult PireComment()
        {
            var pireComment = (from c in _commentaires
                               orderby c.Note ascending
                               select c).First<Comment>();

            return PartialView("_PireComment", pireComment); //new ContentResult() { Content = "Pire Comment " + pireComment.Texte };

        }


        public Comment PireCommentaire()
        {
            var pireComment = (from c in _commentaires
                               orderby c.Note ascending
                               select c).First<Comment>();

            return pireComment;

        }




        public ActionResult ListParSQL()
        {

            string chaineCnx = ConfigurationManager.ConnectionStrings["MaConnection"].ConnectionString;

            string providerName = ConfigurationManager.ConnectionStrings["MaConnection"].ProviderName;

            DbProviderFactory fac = DbProviderFactories.GetFactory(providerName);

            DbConnection cnx = fac.CreateConnection();
            cnx.ConnectionString = chaineCnx;


            DbCommand cmd = fac.CreateCommand();
            cmd.CommandType = System.Data.CommandType.Text;
            cmd.CommandText = "SELECT Id, texte, note FROM Critiques";
            cmd.Connection = cnx;
            List<Comment> mesComments = new List<Comment>();

            try
            {
                cnx.Open();

                DbDataReader rdr = cmd.ExecuteReader();
                while (rdr.Read())
                {
                    mesComments.Add(new Comment
                                    {
                                        Id = rdr.GetInt32(0),
                                        Texte = rdr["Texte"].ToString(),
                                        Note = rdr.GetInt16(2)
                                    });
                }
            }
            catch (Exception)
            {

                throw;
            }
            finally { cnx.Close(); }



            return View("Index", mesComments);
        }

        [HttpGet]
        public ActionResult AjoutCritique()
        {
            return View();
        }

        [HttpPost]
        public ActionResult AjoutCritique(FormCollection coll)
        {


            string chaineCnx = ConfigurationManager.ConnectionStrings["MaConnection"].ConnectionString;

            string providerName = ConfigurationManager.ConnectionStrings["MaConnection"].ProviderName;

            DbProviderFactory fac = DbProviderFactories.GetFactory(providerName);

            DbConnection cnx = fac.CreateConnection();
            cnx.ConnectionString = chaineCnx;

            //Constitution de la Requete
            DbCommand cmd = fac.CreateCommand();
            cmd.CommandType = System.Data.CommandType.Text;
            cmd.CommandText = "INSERT INTO Critiques(Texte, Note, Pseudo, RestoId)  VALUES (@pTexte, @pNote, @pPseudo, 1)";
            cmd.Connection = cnx;

            //Definitiuon desw Parametr'es
            DbParameter p1 = fac.CreateParameter();
            p1.ParameterName = "@pTexte";
            p1.Value = coll["Texte"];

            DbParameter p2 = fac.CreateParameter();
            p2.ParameterName = "@pNote";
            p2.Value = Int16.Parse(coll["Note"]);

            DbParameter p3 = fac.CreateParameter();
            p3.ParameterName = "@pPseudo";
            p3.Value = coll["Pseudo"];


            //Associoation des Parametres a La commande
            cmd.Parameters.Add(p1);
            cmd.Parameters.Add(p2);
            cmd.Parameters.Add(p3);
            try
            {
                cnx.Open();
                //Execution de la Requete
                int nbInsert = cmd.ExecuteNonQuery();
               
            }
            catch (Exception)
            {

                throw;
            }
            finally { cnx.Close(); }



            //return RedirectToAction("ListParSQL");
            return RedirectToRoute("routeListing");
        }
    }
}
