using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace WebApiMagazine.Controllers
{
    public class ValuesController : ApiController
    {

        private WebApiMagazine.Models.IRevueRepository _repository;// = new RevueRepository();
        //public RevuesController()
        //{

        //}

        public ValuesController(WebApiMagazine.Models.IRevueRepository repository)
        {
            if (repository != null)
            {
                _repository = repository;
            }
        }


        //http://localhost:1978/api/values?$skip=3&$top=1
        
        [AcceptVerbs("GET")]
        [Queryable(AllowedQueryOptions=System.Web.Http.OData.Query.AllowedQueryOptions.All)]
        public IQueryable<Revue> RevuesByPage()
        {
            return _repository.GetAll().AsQueryable();
        }

        // GET api/values/5
        public string Get(int id)
        {
            return "value";
        }

        // POST api/values
        public void Post([FromBody]string value)
        {
        }

        // PUT api/values/5
        public void Put(int id, [FromBody]string value)
        {
        }

        // DELETE api/values/5
        public void Delete(int id)
        {
        }
    }
}