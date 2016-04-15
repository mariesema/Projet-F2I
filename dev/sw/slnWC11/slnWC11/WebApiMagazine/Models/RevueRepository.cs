using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace WebApiMagazine.Models
{
    public interface IRevueRepository
    {
        IEnumerable<Revue> GetAll();

        Revue Get(int id);

        Revue Add(Revue revueToAdd);

        void Remove(int idToRemove);

        bool Update(Revue revueToUpdate);

    }


    public class RevueRepository:IRevueRepository
    {

        private dbRestosEntities ctx = new dbRestosEntities();
        public RevueRepository()
        {

        }

        public IEnumerable<Revue> GetAll()
        {
            return ctx.Revues;
        }

        public Revue Get(int idToSearch)
        {
            return ctx.Revues.Single<Revue>(r => r.Id == idToSearch);
        }

        public Revue Add(Revue revueToAdd)
        {
            ctx.Revues.AddObject(revueToAdd);
            ctx.SaveChanges();
            return revueToAdd;
        }

        public void Remove(int idToRemove)
        {
            ctx.Revues.DeleteObject(ctx.Revues.Single<Revue>(r => r.Id == idToRemove));
            ctx.SaveChanges();
            
        }

        public bool Update(Revue revueToUpdate)
        {

            if (revueToUpdate != null)
            {
                ctx.Revues.Attach(revueToUpdate);
                ctx.ObjectStateManager.ChangeObjectState(revueToUpdate, System.Data.EntityState.Modified);
                ctx.SaveChanges();
                return true;
            }
            return false;
        }
    }
}