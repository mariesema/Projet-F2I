using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace stopgaspi.sw.WebSite2.App_Code.entites
{
    class Prefecture
    {
        private long id;
        public long Id
        {
            get { return id; }
            set { id = value; }
        }
        private string adresse;

        public string Adresse
        {
            get { return adresse; }
            set { adresse = value; }
        }
        private int nombreConseillers;

        public int NombreConseillers
        {
            get { return nombreConseillers; }
            set { nombreConseillers = value; }
        }
        private Ville ville;

        public Ville Ville
        {
            get { return ville; }
            set { ville = value; }
        }

        public Prefecture()
        {

        }
    }
}
