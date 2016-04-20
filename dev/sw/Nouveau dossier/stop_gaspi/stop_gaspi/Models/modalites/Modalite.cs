using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Description résumée de Modalite
/// </summary>
/// 
namespace stopgaspi.sw.WebSite2.App_Code.entites
{
    public class Modalite
    {
        private long id;

        public long Id
        {
            get { return id; }
            set { id = value; }
        }
        private string libelle;

        public string Libelle
        {
            get { return libelle; }
            set { libelle = value; }
        }
        private string label;

        public string Label
        {
            get { return label; }
            set { label = value; }
        }
        private long ordre;

        public long Ordre
        {
            get { return ordre; }
            set { ordre = value; }
        }


        public Modalite()
        {
        }


    }
}