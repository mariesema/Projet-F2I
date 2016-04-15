using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace MvcWC11.Models
{
    public class Comment
    {
        private string _texte;

        public int Id { get; set; }
        [System.ComponentModel.DataAnnotations.Display(Name="Votre commentaire")]
        //[System.ComponentModel.DataAnnotations.MaxLength(ErrorMessage="ertyuio"
        public string Texte
        {
            get{return  _texte;}
            set { this._texte = value.ToUpper(); }
        }
        public float Note { get; set; }
    }
}