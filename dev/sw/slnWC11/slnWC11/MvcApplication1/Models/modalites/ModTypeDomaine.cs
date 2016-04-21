using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Description résumée de Class1
/// </summary>
/// 

    public class ModTypeDomaine : Modalite
    {



        public ModTypeDomaine() : base() { }


        private const long ECONOMIE_THERMIQUE = 0;
        private const long ECONOMIE_ESSENCE = 1;
        private const long ECONOMIE_ENCRE_PAPIER = 2;
        private const long RECYCLAGE_MATERIEL_ELECTRONIQUES = 3;
        private const long ECONOMIE_ELECTRIQUE = 4;


        public Boolean isEconomieThermique()
        {
            return ECONOMIE_THERMIQUE.Equals(base.Id);
        }

        public Boolean isEconomieEssence()
        {
            return ECONOMIE_ESSENCE.Equals(base.Id);
        }
        public Boolean isEconomieEncrePapier()
        {
            return ECONOMIE_ENCRE_PAPIER.Equals(base.Id);
        }
        public Boolean isRecyclageME()
        {
            return RECYCLAGE_MATERIEL_ELECTRONIQUES.Equals(base.Id);
        }
        public Boolean isEconomieElectrique()
        {
            return ECONOMIE_ELECTRIQUE.Equals(base.Id);
        }
    }