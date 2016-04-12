using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Description résumée de User
/// classe renseignant tous les attributs des utilisateurs (les clients ainsi que les conseillers)
/// </summary>
public class User 
{

    private long id;

    public long Id
    {
        get { return id; }
        set { id = value; }
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
    private ModTypeUser typeUser;

    public ModTypeUser TypeUser
    {
        get { return typeUser; }
        set { typeUser = value; }
    }


	public User(){
	}
}