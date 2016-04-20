using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace stopgaspi.sw.WebSite2.App_Code.entites
{
    public class RendezVous
    {
        private Conseiller conseiller;

        public Conseiller Conseiller
        {
            get { return conseiller; }
            set { conseiller = value; }
        }
        private User user;

        public User User
        {
            get { return user; }
            set { user = value; }
        }
        private ModTypeDomaine domaine;

        public ModTypeDomaine Domaine
        {
            get { return domaine; }
            set { domaine = value; }
        }
        private Ville ville;

        public Ville Ville
        {
            get { return ville; }
            set { ville = value; }
        }
        private DateTime date;

        public DateTime Date
        {
            get { return date; }
            set { date = value; }
        }
        private DateTime heure;

        public DateTime Heure
        {
            get { return heure; }
            set { heure = value; }
        }
        private string adresse;

        public string Adresse
        {
            get { return adresse; }
            set { adresse = value; }
        }
        
        public RendezVous()
        {

        }
    }
}
