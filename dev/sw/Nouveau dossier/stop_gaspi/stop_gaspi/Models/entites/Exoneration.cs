using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace stopgaspi.sw.WebSite2.App_Code.entites
{
    public class Exoneration
    {	
	
        private long id;
        public long Id
        {
            get{ return id;}
            set{id = value; }
        }
		
		private double taux;
		public double Taux
		{
			get { return taux;}
			set {taux = value;}
		}
		
		private long type;
		public long Type
		{
			get { return type;}
			set {type = value;}
		}
		
		
        public Exoneration()
        {

        }

       
    }
}
