using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace aocday23
{
    class Program
    {
        static string line;
        static StreamReader file = new StreamReader("input.txt");
        static List<string[]> input = new List<string[]>();
        static Dictionary<string, long> register = new Dictionary<string, long>();
        static int n;//so I can use TryParse
        static int o;//so I can use TryParse again

        static void Main(string[] args)
        {
            /*I did Day 18 in C# so I'm going to do this similar
            follow up question in C# as well.
            This was a difficult problem. I wrote the assembly explicitly and
            watched how the registers reacted until finally seeing the conditions
            under which h could possibly be increased. Basically h is the number of primes between
            109300 and 126300 while increasing b by 17 each iteration.*/
            while ((line = file.ReadLine()) != null)
            {
                input.Add(line.Split(' '));
            }
            bool run = true;
            register.Add("a", 1);
            register.Add("b", 109300);
            register.Add("c", 126300);
            register.Add("d", 2);
            register.Add("e", 0);
            register.Add("f", 1);
            register.Add("g", 0);
            register.Add("h", 0);
            while (run)
            {
                register["f"] = 1;
                register["d"] = 2;
                register["e"] = 2;

                for (register["d"] = 2; register["d"] < (register["b"]/2); register["d"]++)
                {
                    if (register["b"] % register["d"] == 0)
                    {
                        register["f"] = 0;
                        break;
                    }
                }
                if (register["f"] == 0)
                {
                    register["h"]++;
                }
                register["g"] = register["b"];
                register["g"] -= register["c"];
                register["b"] += 17;

                if (register["g"] == 0)
                {
                    run = false;
                }
            }
            Console.WriteLine(register["h"]);
            Console.Read();
        }
    }
}