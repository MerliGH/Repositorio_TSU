using Microsoft.EntityFrameworkCore;
using MineCorp.Models;

namespace MineCorp.Data
{
    public class ApplicationDbContext : DbContext
    {
        public ApplicationDbContext(DbContextOptions<ApplicationDbContext> options)
            : base(options)
        {
        }

        public DbSet<EmbeddedSystem> EmbeddedSystems { get; set; }
    }
}
