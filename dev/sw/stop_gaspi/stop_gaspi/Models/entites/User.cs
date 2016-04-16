using System;
using System.Collections.Generic;
using System.Linq;
using System.Data;
using System.Data.Entity;
using System.Web;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;


/// <summary>
/// Description résumée de User
/// classe renseignant tous les attributs des utilisateurs (les clients ainsi que les conseillers)
/// </summary>

namespace stopgaspi.sw.WebSite2.App_Code.entites
{



    [Table("utilisateur")]
    public class User
    {
        [Key]//permet de définir que c'est la clé primaire de la classe
        [DatabaseGeneratedAttribute(DatabaseGeneratedOption.Identity)] //permet de définir la séquence de la clé primaire
        private long id;

        public long Id
        {
            get { return id; }
            set { id = value; }
        }

        [Required]
        [Display(Name = "Login")]
        private string login;

        public string Login
        {
            get { return login; }
            set { login = value; }
        }

        [Required]
        [DataType(DataType.Password)]
        [Display(Name = "Mot de passe")]
        private string password;

        public string Password
        {
            get { return password; }
            set { password = value; }
        }


        private string nom;

        public string Nom
        {
            get { return nom; }
            set { nom = value; }
        }
        private string prenom;

        public string Prenom
        {
            get { return prenom; }
            set { prenom = value; }
        }
        private string adresse;

        public string Adresse
        {
            get { return adresse; }
            set { adresse = value; }
        }
        private Ville ville;

        public Ville Ville
        {
            get { return ville; }
            set { ville = value; }
        }
        private string mail;

        public string Mail
        {
            get { return mail; }
            set { mail = value; }
        }
        private string telephone;

        public string Telephone
        {
            get { return telephone; }
            set { telephone = value; }
        }
        private Boolean applicationMobile;

        public Boolean ApplicationMobile
        {
            get { return applicationMobile; }
            set { applicationMobile = value; }
        }
        private DateTime dateCreation;

        public DateTime DateCreation
        {
            get { return dateCreation; }
            set { dateCreation = value; }
        }
        private ModTypeExoneration typeUser;

        public ModTypeExoneration TypeUser
        {
            get { return typeUser; }
            set { typeUser = value; }
        }


        public User()
        {
        }
    }
}
