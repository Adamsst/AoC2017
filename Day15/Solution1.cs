using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Drawing;
using System.IO;

namespace Pathfinding
{
    class Program
    {
        static int genA = 16807;
        static int genB = 48271;
        static long a = 289;
        static long b = 629;
        static int div = 2147483647;
        static int i = 0;
        static long prodA = 0;
        static long prodB = 0;
        static string bitA;
        static string bitB;
        static string resultA;
        static string resultB;
        static int matches = 0;
        static void Main(string[] args)
        {
            while(i < 40000000)
            {
                prodA = ((a * genA) % div);
                prodB = ((b * genB) % div);
                a = prodA;
                b = prodB;
                bitA = Convert.ToString(a, 2);
                bitB = Convert.ToString(b, 2);
                while (bitA.Length < 16)
                {
                    bitA = "0" + bitA;
                }
                while (bitB.Length < 16)
                {
                    bitB = "0" + bitB;
                }
                resultA = bitA.Substring(bitA.Length - 16);
                resultB = bitB.Substring(bitB.Length - 16);
                if(resultA == resultB)
                {
                    matches++;
                }
                i++;
            }
            Console.WriteLine(matches);
            Console.Read();
        }
    }
}