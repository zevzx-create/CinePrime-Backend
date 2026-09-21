using System;
using System.Collections.Generic;
using CinePrime.Models;

namespace CinePrime.Services {
    public class VendaService {
        private List<Ingresso> ingressosVendidos = new List<Ingresso>();

        public bool ProcessarVenda(Ingresso novoIngresso) {
            
            Console.WriteLine($"Processando venda para o assento {novoIngresso.Assento}...");
            
            novoIngresso.DataCompra = DateTime.Now;
            ingressosVendidos.Add(novoIngresso);
            
            return true; 
        }

        public List<Ingresso> ListarVendas() {
            return ingressosVendidos;
        }
    }
}
