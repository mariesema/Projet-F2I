using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;


    public class Article
    {	
	
        private long id;
        public long Id
        {
            get{ return id;}
            set{id = value; }
        }
		
		private string titre;
		public string Titre
		{
			get { return titre;}
			set {titre = value;}
		}
		
		public string url;
		public string Url
		{
			get { return url;}
			set {url = value;}
		}
		
		private DateTime date;
		public DateTime Date
		{
			get { return date;}
			set {date = value;}
		}
		
		private string auteur;
		public string Auteur
		{
			get { return auteur;}
			set {auteur = value;}
		}
		
		private long categorie;
		public long Categorie
		{
			get { return categorie;}
			set {categorie = value;}
		}
		
		private string commentaire;
		public string Commentaire
		{
			get { return commentaire;}
			set {commentaire = value;}
		}
		
		private string description;
		public string Description
		{
			get { return description;}
			set {description = value;}
		}
		
		private DateTime datePublication;
		public DateTime DatePublication
		{
			get { return datePublication;}
			set {datePublication = value;}
		}

        private DateTime dateDerniereModification;
		public DateTime DateDerniereModification
		{
			get { return dateDerniereModification;}
			set {dateDerniereModification = value;}
		}
		
        public Article()
        {

        }

       
    }
