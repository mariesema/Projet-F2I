using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace MvcWC11
{
    public class CritiqueMetaData
    {

        public int Id { get; set; }

        [Required(ErrorMessage = "Texte Obligatoire"),
        StringLength(50, MinimumLength = 2, ErrorMessage = "Longueur Invalide"),
        Display(Name = "Commentaire"),
        DataType(DataType.MultilineText)
       ]
        public string Texte { get; set; }


        [Range(0, 5,
            ErrorMessageResourceName = "Critique_Note", 
            ErrorMessageResourceType = typeof(Validations)),
        DisplayFormat(NullDisplayText = "--"),
        Required( 
            ErrorMessageResourceName = "Requis_Note", 
            ErrorMessageResourceType = typeof(Validations))]
        public short Note { get; set; }

        [DisplayFormat(NullDisplayText = "--")]
        [System.Web.Mvc.Remote(action:"VerifPseudo",controller: "Critique")]
        [ExcludeChar("#?*%", ErrorMessage="Caractères Invalides")]
        public string Pseudo { get; set; }
    }

    class ExcludeCharAttribute : ValidationAttribute
    {
        private readonly string _chars;

        public ExcludeCharAttribute(string chars)
            :base("{0} contient des caractères invalides")
        {
            _chars = chars;
        }

        protected override ValidationResult 
            IsValid(object value, ValidationContext validationContext)
        {
            if (value != null)
            {
                var valueAsString = value.ToString();

                for (int i = 0; i < _chars.Length; i++)
                {
                    if (valueAsString.Contains(_chars[i]))
                    {
                        var errorMessage = FormatErrorMessage(validationContext.DisplayName);
                        return new ValidationResult(errorMessage);
                    }
                }                
            }
            return ValidationResult.Success;
        }


    }





}