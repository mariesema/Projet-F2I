using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace stopgaspi.sw.WebSite2.App_Code.entites
{
    public class Consommation
    {	
	
        private long id;
        public long Id
        {
            get{ return id;}
            set{id = value; }
        }
		
		private double quantite;
		public double Quantite
		{
			get { return quantite;}
			set {quantite = value;}
		}
		
		public DateTime annee;
		public DateTime Annee
		{
			get { return annee;}
			set {annee = value;}
		}
		
		private long duree;
		public long Duree
		{
			get { return duree;}
			set {duree = value;}
		}
		
		
        public Consommation()
        {

        }

       
    }
}
