using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace MvcWC11.Filters
{
    public class DroitsAttribute: System.Web.Mvc.AuthorizeAttribute
    {
        
    }

    public class LogAttribute : ActionFilterAttribute
    {
        public override void OnActionExecuting(ActionExecutingContext filterContext)
        {
            filterContext.HttpContext.Response.Write("Action : " + filterContext.Controller.ToString());
        }
    }


}