using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Description résumée de User
/// classe renseignant tous les attributs des utilisateurs (les clients ainsi que les conseillers)
/// </summary>

namespace stopgaspi.sw.WebSite2.App_Code.entites
{
    public class Conseiller : User
    {

        private List<Disponibilite> disponibilites;

        private List<Disponibilite> Disponibilites
        {
            get { return disponibilites; }
            set { disponibilites = value; }
        }

        private Prefecture prefecture;

        public Prefecture Prefecture
        {
            get { return prefecture; }
            set { prefecture = value; }
        }




        public Conseiller()
            : base()
        {

        }
    }
}