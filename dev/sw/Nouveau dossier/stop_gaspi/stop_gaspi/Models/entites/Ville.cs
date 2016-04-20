using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Description résumée de Ville
/// </summary>
/// 
namespace stopgaspi.sw.WebSite2.App_Code.entites
{
    public class Ville
    {
        private long id;

        public long Id
        {
            get { return id; }
            set { id = value; }
        }
        private string nom;

        public string Nom
        {
            get { return nom; }
            set { nom = value; }
        }
        private string codePostal;

        public string CodePostal
        {
            get { return codePostal; }
            set { codePostal = value; }
        }
        private string departement;

        public string Departement
        {
            get { return departement; }
            set { departement = value; }
        }




        public Ville()
        {

        }
    }
}