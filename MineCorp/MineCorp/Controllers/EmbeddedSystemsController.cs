using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using MineCorp.Data;
using MineCorp.Models;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;


namespace MineCorp.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class EmbeddedSystemsController : ControllerBase
    {
        private readonly ApplicationDbContext _context;

        public EmbeddedSystemsController(ApplicationDbContext context)
        {
            _context = context;
        }

        // GET: api/EmbeddedSystems
        [HttpGet]
        public async Task<ActionResult<IEnumerable<EmbeddedSystem>>> GetEmbeddedSystems()
        {
            return await _context.EmbeddedSystems.ToListAsync();
        }

        // GET: api/EmbeddedSystems/5
        [HttpGet("{id}")]
        public async Task<ActionResult<EmbeddedSystem>> GetEmbeddedSystem(int id)
        {
            var embeddedSystem = await _context.EmbeddedSystems.FindAsync(id);

            if (embeddedSystem == null)
            {
                return NotFound();
            }

            return embeddedSystem;
        }

        // POST: api/EmbeddedSystems
        [HttpPost]
        public async Task<ActionResult<EmbeddedSystem>> PostEmbeddedSystem(EmbeddedSystem embeddedSystem)
        {
            _context.EmbeddedSystems.Add(embeddedSystem);
            await _context.SaveChangesAsync();

            return CreatedAtAction("GetEmbeddedSystem", new { id = embeddedSystem.SystemCode }, embeddedSystem);
        }

        // PUT: api/EmbeddedSystems/5
        [HttpPut("{id}")]
        public async Task<IActionResult> PutEmbeddedSystem(int id, EmbeddedSystem embeddedSystem)
        {
            if (id != embeddedSystem.SystemCode)
            {
                return BadRequest();
            }

            _context.Entry(embeddedSystem).State = EntityState.Modified;

            try
            {
                await _context.SaveChangesAsync();
            }
            catch (DbUpdateConcurrencyException)
            {
                if (!EmbeddedSystemExists(id))
                {
                    return NotFound();
                }
                else
                {
                    throw;
                }
            }

            return NoContent();
        }

        // DELETE: api/EmbeddedSystems/5
        [HttpDelete("{id}")]
        public async Task<IActionResult> DeleteEmbeddedSystem(int id)
        {
            var embeddedSystem = await _context.EmbeddedSystems.FindAsync(id);
            if (embeddedSystem == null)
            {
                return NotFound();
            }

            _context.EmbeddedSystems.Remove(embeddedSystem);
            await _context.SaveChangesAsync();

            return NoContent();
        }

        private bool EmbeddedSystemExists(int id)
        {
            return _context.EmbeddedSystems.Any(e => e.SystemCode == id);
        }
    }
}
