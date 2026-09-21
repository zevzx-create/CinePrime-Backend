using System;

namespace CinePrime.Models {
    public class Ingresso {
        public int Id { get; set; }
        public int SessaoId { get; set; }
        public int ClienteId { get; set; }
        public string Assento { get; set; }
        public decimal Valor { get; set; }
        public DateTime DataCompra { get; set; }
    }
}
