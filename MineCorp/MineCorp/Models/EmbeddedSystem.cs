using Microsoft.EntityFrameworkCore;
using System;
using System.ComponentModel.DataAnnotations;

namespace MineCorp.Models
{
    public class EmbeddedSystem
    {
        [Key]
        public int SystemCode { get; set; }
        public string Description { get; set; }
        public string SectorID { get; set; }
        public decimal Dust { get; set; }
        public decimal CO { get; set; }
        public decimal CO2 { get; set; }
        public decimal Ethanol { get; set; }
        public decimal H2 { get; set; }
        public decimal NH3 { get; set; }
        public decimal CH4 { get; set; }
        public decimal NO2 { get; set; }
        public DateTime Date { get; set; }
        public bool Status { get; set; }
    }
}

