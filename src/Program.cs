using System;
using CinePrime.Models;
using CinePrime.Services;

namespace CinePrime {
    class Program {
        static void Main(string[] args) {
            Console.WriteLine("=== BEM VINDO AO SISTEMA CINEPRIME ===");
            
            VendaService vendaService = new VendaService();

            
            Ingresso meuIngresso = new Ingresso {
                Id = 1,
                SessaoId = 101,
                ClienteId = 1,
                Assento = "A12",
                Valor = 35.00m
            };

            if (vendaService.ProcessarVenda(meuIngresso)) {
                Console.WriteLine("Sucesso: Ingresso emitido com sucesso!");
            } else {
                Console.WriteLine("Erro: Assento já ocupado.");
            }

            Console.WriteLine("\n--- Resumo de Vendas ---");
            foreach (var v in vendaService.ListarVendas()) {
                Console.WriteLine($"ID: {v.Id} | Assento: {v.Assento} | Valor: R${v.Valor}");
            }

            Console.WriteLine("\nSistema encerrado. Pressione qualquer tecla...");
            Console.ReadKey();
        }
    }
}
