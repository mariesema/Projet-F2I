using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace stopgaspi.sw.WebSite2.App_Code.entites
{
    class Disponibilite
    {
        private long id;

        public long Id
        {
            get{ return id;}
            set{id = value; }
        }
        private DateTime date;

        public DateTime Date
        {
            get { return date;}
            set { date = value;}
        }
        private DateTime heureDebut;

        public DateTime HeureDebut
        {
            get { return heureDebut; }
            set { heureDebut = value; }
        }
        private DateTime heureFin;

        public DateTime HeureFin
        {
            get { return heureFin; }
            set { heureFin = value; }
        }

        public Disponibilite()
        {

        }



       
    }
}
