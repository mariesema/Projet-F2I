using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;


    public class FicheConseil
    {
        private int id;
        public int Id
        {
            get { return id; }
            set { id = value; }
        }
        private string contenu;

        public string Contenu
        {
            get { return contenu; }
            set { contenu = value; }
        }
        private string description;

        public string Description
        {
            get { return description; }
            set { description = value; }
        }
        private ModTypeDomaine domaine;

        public ModTypeDomaine Domaine
        {
            get { return domaine; }
            set { domaine = value; }
        }
        
        public FicheConseil()
        {

        }
    }
