using Microsoft.Practices.Unity;
using System.Web.Http;
using Unity.WebApi;
using WebApiMagazine.Models;

namespace WebApiMagazine
{
    public static class UnityConfig
    {
        public static void RegisterComponents()
        {
			var container = new UnityContainer();
            
            // register all your components with the container here
            // it is NOT necessary to register your controllers
             //container.RegisterType<WebApiMagazine.Controllers.RevuesController>();
            
            container.RegisterType<WebApiMagazine.Controllers.RevuesController>();
            
            // e.g. container.RegisterType<ITestService, TestService>();
            container.RegisterType<WebApiMagazine.Models.IRevueRepository, WebApiMagazine.Models.RevueRepository>();
            
            GlobalConfiguration.Configuration.DependencyResolver = new UnityDependencyResolver(container);
           
        }
    }
}