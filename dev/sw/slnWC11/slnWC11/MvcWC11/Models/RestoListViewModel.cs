using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace MvcWC11.Models
{
    public class RestoListViewModel
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public string Localization { get; set; }
        public int NumberOfRemarks { get; set; }
        /// <summary>
        /// Moyenne des Notes des Critiques
        /// </summary>
        public double AverageOfRemarks { get; set; }

    }
}