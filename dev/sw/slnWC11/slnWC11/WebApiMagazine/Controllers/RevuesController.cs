using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;


using WebApiMagazine.Models;

namespace WebApiMagazine.Controllers
{
    public class RevuesController : ApiController
    {
        // WebApiMagazine.Models.IRevueRepository
        private IRevueRepository _repository;// = new RevueRepository();
        //public RevuesController()
        //{

        //}

        public RevuesController(IRevueRepository repository)
        {
            if (repository != null)
            {
                _repository = repository;
            }
        }

        
        public IEnumerable<Revue> Get()
        {
            return _repository.GetAll();
        }
         

        //[HttpGet]
        //[AcceptVerbs("GET")]
        //          +
        //public Revue Recup(int id)
        //Ou
        //Par leur Nom
        //public Revue Get(int id)
        public Revue Get(int id)
        {
            Revue revue = _repository.Get(id);
            //ou
            /*
             *  var response = Request.CreateResponse<Revue>(HttpStatusCode.OK, revue);
             */

            if (revue == null)
            {
                throw new HttpResponseException(new HttpResponseMessage(HttpStatusCode.NotFound));
            }

            return revue;
        }

        public HttpResponseMessage PostRevue(Revue revue)
        {
            revue = _repository.Add(revue);
            var response = Request.CreateResponse<Revue>(HttpStatusCode.Created, revue);
            string uri = Url.Route(null, new { id = revue.Id });
            response.Headers.Location = new Uri(Request.RequestUri, uri);
            return response;
        }

        public HttpResponseMessage DeleteRevue(int id)
        {
            _repository.Remove(id);
            return new HttpResponseMessage(HttpStatusCode.NoContent);
        }


        [HttpPut]
        //ou 
        //[AcceptVerbs("PUT")]
        //[AcceptVerbs("PUT", "HEAD")]
        public void PutRevue(int id, Revue revueToUpdate)
        {
            if (!_repository.Update(revueToUpdate))
            {
                throw new HttpResponseException(new HttpResponseMessage(HttpStatusCode.NotFound));
            }

        }


        


    }
}
