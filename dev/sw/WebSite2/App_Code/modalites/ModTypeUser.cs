using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Description résumée de Class1
/// </summary>
public class ModTypeUser : Modalite
{

    public const long ADMIN = 999;
    public const long SIMPLE_USER = 0;
    public const long CONSEILLER = 1;



	public ModTypeUser(): base(){}

    public Boolean isAdmin()
    {
        return ADMIN.Equals(base.Id);
    }

    public Boolean isSimpleUser() {
        return SIMPLE_USER.Equals(base.Id);
    }

    public Boolean isConseiller()
    {
        return CONSEILLER.Equals(base.Id);
    }


}